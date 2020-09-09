<?php
namespace app\modules\book\controllers;

use yii\web\Controller;

class AppController extends Controller
{
		public function beforeAction($action)
	{
       $this->layout = "admin-lte/main.php";
 	 return parent::beforeAction($action);
	}

}