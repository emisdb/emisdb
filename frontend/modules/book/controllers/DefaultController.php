<?php

namespace app\modules\book\controllers;

use yii\web\Controller;
use common\components\ApiDataProvider;
/**
 * Default controller for the `book` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
	public function beforeAction($action)
	{
       $this->layout = "admin-lte\main.php";
 	 return parent::beforeAction($action);
	}
    public function actionIndex()
    {
        return $this->render('index');
    }
	    public function actionApi()
    {
		$dp = new ApiDataProvider(ApiDataProvider::PROVIDER_SPB_GOV);
		$data= $dp->getData();
		return $this->render('api', compact('data'));
    }

}
