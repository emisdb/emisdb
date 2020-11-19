<?php

namespace app\modules\book\controllers;

use app\modules\book\models\Providers;
use app\modules\book\models\Category;
use common\components\ApiDataProvider;
use yii\data\Pagination;
use Yii;

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
	public function actionAjaxParse($id,$page) {
		$dp = new ApiDataProvider(ApiDataProvider::PROVIDER_SPB_GOV);
		$data = $dp->getData($id, 'versions/latest/data/?per_page=10&page='.$page);
		$recs = 0;
		foreach ($data as $val){
			$provider = new Providers();
			$provider->brand_name 		= $val['row']['name'];
			$provider->brand_name_en 	= $val['row']['name_en'];
			$provider->category_id 		= Category::CATEGORY_RESTAURANTS;
			$provider->address 			= $val['row']['address_manual'];
			$provider->short_description 		= $val['row']['oid'];
			$provider->description 		= $val['row']['kitchen'];
			$provider->email 			= $val['row']['email'];
			$provider->phone 			= $val['row']['phone'];
			$provider->web_url 			= $val['row']['www'];
			$provider->object_type 		= "ресторан";
			if($pos=getPosition($val['row']['coord'])){
				$provider->latitude	 = $pos[0];
				$provider->longitude = $pos[1];
			}
			$recs++;
		}
//		$json = json_encode($data);
		$json = json_encode([$id, $page, $recs]);
		return  $json;

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

	public function actionBook() {
		$dp = new ApiDataProvider(ApiDataProvider::PROVIDER_GOOGLE_BOOKS);
		$data = $dp->getData();
		return $this->render('google', compact('data'));
	}

}
