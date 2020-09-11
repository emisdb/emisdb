<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\components;

use yii\httpclient\Client;
use Yii;
/**
 * Description of ApiDataProvider
 *
 * @author emisd
 */
class ApiDataProvider {
	protected $provider;
	protected $url;
	protected $hasAuthorization;
	protected $token;
	
	public const PROVIDER_SPB_GOV = 0;
	public const PROVIDER_GOOGLE_BOOKS =1; 
	
	public function __construct($provider) {
		$this->provider = $provider;
		switch ($this->provider){
			case self::PROVIDER_SPB_GOV:
				$this->url = Yii::$app->params['spb-web'];
				$this->hasAuthorization = true;
				$this->token = Yii::$app->params['spb-token'];
				break;
			case self::PROVIDER_GOOGLE:
				$this->url = Yii::$app->params['google-books'];
				$this->hasAuthorization = false;
				break;
				
		}
	}
	public function getUrl($id=0,$postfix="",$last_slash=true){
		$url=$this->url;
		if($id>0) $url .=$id."/";
		if($postfix!="") $url .=$postfix. $last_slash ? "/" : "";
		return $url;

	}
		public function getData($id=0,$postfix="",$last_slash=true){
		$url=$this->url;
		$client = new Client();
		if($id>0) $url .=$id."/";
		if($postfix!="") $url .=$postfix. ($last_slash ? "/" : "");
		$request = $client->createRequest()
			->setMethod('GET')
			->setUrl($url);
		if($this->hasAuthorization){
			$request->addHeaders(['Authorization'=>'Token '.$this->token]);
		}
		$response = $request->send();
		if ($response->isOk) {
			return $response->getData();
		}
		return null;
	}
}
