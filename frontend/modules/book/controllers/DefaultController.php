<?php

namespace app\modules\book\controllers;

use app\modules\book\models\Providers;
use app\modules\book\models\Provider;
use app\modules\book\models\Category;
use common\components\ApiDataProvider;
use common\components\CSVParser;
use frontend\models\FileForm;
use yii\data\Pagination;
use yii\base\ErrorException;
use Yii;
use yii\web\UploadedFile;

/**
 * Default controller for the `book` module
 */
class DefaultController extends AppController {

	/**
	 * Renders the index view for the module
	 * @return string
	 */
	public function actionIndex() {
		return $this->render('index');
	}

	public function actionSpb() {
		$dp = new ApiDataProvider(ApiDataProvider::PROVIDER_SPB_GOV);
		$data = $dp->getData();
		return $this->render('spb', compact('data'));
	}

	public function actionSpbdata($id) {
		$dp = new ApiDataProvider(ApiDataProvider::PROVIDER_SPB_GOV);
		$heads = $dp->getData($id, 'versions/latest/');
		$headers = array_column($heads["structure"],'name','title');
		$pagination = new Pagination(['totalCount' => 100, 'pageSize' => 20]);
		$pNum = Yii::$app->request->get('page');
		if($pNum === null)	$pNum=1;
		$data = $dp->getData($id, 'versions/latest/data/?per_page=20&page='.$pNum);			
		if($data === null) {
			$pagination = new Pagination(['totalCount' => ((int)$pNum)*20, 'pageSize' => 20]);						
		}
		else {
			if(count($data)<20)
				$pagination = new Pagination(['totalCount' => ((int)$pNum)*20, 'pageSize' => 20]);
			else
				$pagination = new Pagination(['totalCount' => ((int)$pNum+3)*20, 'pageSize' => 20]);						
		}

		return $this->render('spb_data', [
			'data'=>$data,
			'headers'=>$headers,
			'pagination' => $pagination,
		]);
	}
	public function actionAjaxParse($id) {
			$dp = new ApiDataProvider(ApiDataProvider::PROVIDER_SPB_GOV);
			$page = 1;
			$recs = 0;
			$errs =	array();
			do {
				$data = $dp->getData($id, 'versions/latest/data/?per_page=100&page='.$page);
				$recs_in_loop = 0;
				$page++;
				try {
						foreach ($data as $val){
							$provider = new Providers();
							$provider->brand_name 		= mb_substr(trim($val['row']['name']),0,50);
							$provider->brand_name_en 	= mb_substr(trim($val['row']['name_en']),0,50);
							$provider->address 			= $val['row']['address_manual'];
							$provider->short_description 		= $val['row']['oid'];
							$provider->email 			= mb_substr(trim($val['row']['email']),0,50);
							$provider->phone 			= mb_substr(trim($val['row']['phone']),0,50);
							$provider->web_url 			= mb_substr(trim($val['row']['www']),0,250);
							if($pos=$this->getPosition($val['row']['coord'])){
								$provider->latitude	 = $pos[0];
								$provider->longitude = $pos[1];
							}
							switch ($id){
								case 123:
									$this->parseMuseums($provider,$val);
									break;
								case 124:
									$this->parseTheater($provider,$val);
									break;
								case 125:
									$this->parseHall($provider,$val);
									break;
								case 127:
									$this->parseRests($provider,$val);
									break;
								case 128:
									$this->parseSights($provider,$val);
									break;
							}
							if($provider->save()) $recs++;
							$recs_in_loop++;
						}
					} catch (ErrorException $e) {
						$errs[] = $e->getMessage();
					}
				if($recs_in_loop<100) break;
				if($page>50) break;
				} while (true);
//		$json = json_encode($data);
		$json = json_encode([$id, $page, $recs, $page, $errs]);
		return  $json;

	}
	protected function parseRests($provider,$val){
		$provider->category_id 		= Category::CATEGORY_RESTAURANTS;
		$provider->object_type 		= "ресторан";
		$provider->description 		= $val['row']['kitchen'];
	}
	protected function parseMuseums($provider,$val){
		$provider->category_id 		= Category::CATEGORY_MUSEUMS;
		$provider->object_type 		= mb_substr(trim($val['row']['type']),0,32);
		$provider->area		 		= mb_substr(trim($val['row']['district']),0,32);
		$provider->description 		= $val['row']['description'];
		$provider->description_en	= $val['row']['description_en'];
	}
	protected function parseTheater($provider,$val){
		$provider->category_id 		= Category::CATEGORY_THEATRES;
		$provider->object_type 		= mb_substr(trim($val['row']['type']),0,32);
	}
	protected function parseHall($provider,$val){
		$provider->category_id 		= Category::CATEGORY_MUSEUMS;
		$provider->object_type 		= mb_substr(trim($val['row']['type']),0,32);
		$provider->description 		= $val['row']['description'];
		$provider->description_en	= $val['row']['description_en'];
	}
	protected function parseSights($provider,$val){
		$provider->category_id 		= Category::CATEGORY_SIGHTS;
		$provider->object_type 		= mb_substr(trim($val['row']['obj_type']),0,32);
		$provider->description 		= $val['row']['description'];
		$provider->description_en	= $val['row']['description_en'];
	}
	protected function getPosition($txt){
		$latlon = explode(",", $txt);
		if (count($latlon)==2){
			$latlon[0] = trim($latlon[0]);
			$latlon[1] = trim($latlon[1]);
			return $latlon;
		}
		return false;
	}
	protected function parseProvider($data){
		$keys=[];
		foreach($data as $i => $res) {
			$provider = new Provider();
			foreach($res as $key => $val) {
				if (!empty($val)) {
					$provider->setAttribute($key,$val);
					$keys[] =[$i,$key];
				}
			}
			$provider->save();
		}
		return $keys;

	}

	public function actionParsedata($id=null) {
		$dp = new ApiDataProvider(ApiDataProvider::PROVIDER_SPB_GOV);
		if(!is_null($id)) {
			$heads = $dp->getData($id, 'versions/latest/');
			$headers = array_column($heads["structure"], 'name', 'title');
		}
		else $headers=array();
		return $this->render('spb_parse', [
			'id'=>$id,
			'headers'=>$headers,
		]);
	}
	public function actionCsvparse()
	{

		$modelff=new FileForm();
		$res=[];
		$keys=[];
		if($modelff->load(Yii::$app->request->post()) && $modelff->validate())
		{
//                        $modelff->attributes=$_POST['FileForm'];
			$modelff->csv = UploadedFile::getInstance($modelff, 'csv');
			$file=$modelff->upload_csv();
			if ($file) {
				$parser=new CSVParser($file,',');
				$res=$parser->parse();
				$keys=$this->parseProvider($res);

			}
		}
		return     $this->render('csv',
			['ff'=>$modelff,'result'=>$res,'keys'=>$keys]
		);
	}

	public function actionBook() {
		$dp = new ApiDataProvider(ApiDataProvider::PROVIDER_GOOGLE_BOOKS);
		$data = $dp->getData();
		return $this->render('google', compact('data'));
	}

}
