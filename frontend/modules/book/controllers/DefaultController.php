<?php

namespace app\modules\book\controllers;

use common\components\ApiDataProvider;
/**
 * Default controller for the `book` module
 */
class DefaultController extends AppController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
	    public function actionSpb()
    {
		$dp = new ApiDataProvider(ApiDataProvider::PROVIDER_SPB_GOV);
		$data= $dp->getData();
		return $this->render('spb', compact('data'));
    }
	    public function actionSpbdata($id)
    {
		$dp = new ApiDataProvider(ApiDataProvider::PROVIDER_SPB_GOV);
		$data= $dp->getData($id,'versions/latest');
		return $this->render('spb_data', compact('data'));
    }
	    public function actionBook()
    {
		$dp = new ApiDataProvider(ApiDataProvider::PROVIDER_GOOGLE_BOOKS);
		$data= $dp->getData();
		return $this->render('google', compact('data'));
    }

}
