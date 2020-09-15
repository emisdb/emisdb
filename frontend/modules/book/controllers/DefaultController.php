<?php

namespace app\modules\book\controllers;

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
		if($pNum === null){
			$data = $dp->getData($id, 'versions/latest/data/?per_page=20&page=1');
			$pagination = new Pagination(['totalCount' => 80, 'pageSize' => 20]);		
		}
		else
		{
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
		}
		return $this->render('spb_data', [
			'data'=>$data,
			'headers'=>$headers,
			'pagination' => $pagination,
		]);
	}

	public function actionBook() {
		$dp = new ApiDataProvider(ApiDataProvider::PROVIDER_GOOGLE_BOOKS);
		$data = $dp->getData();
		return $this->render('google', compact('data'));
	}

}
