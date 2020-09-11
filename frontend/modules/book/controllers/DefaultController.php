<?php

namespace app\modules\book\controllers;

use common\components\ApiDataProvider;
use yii\data\Pagination;

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
		$heads = $dp->getData($id, 'versions/latest');
		$headers = array_column($heads["structure"],'name','title');
		$pagination = new Pagination(['totalCount' => 100, 'pageSize' => 20]);
		$data = $dp->getData($id, 'versions/latest/data/?per_page=20&page='.$pagination->getPage());
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
