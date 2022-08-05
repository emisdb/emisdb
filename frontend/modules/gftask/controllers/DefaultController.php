<?php

namespace app\modules\gftask\controllers;

use app\modules\gftask\models\TaskForm;
use yii\web\Controller;
use yii\web\Response;
use Yii;
/**
 * Default controller for the `Gftask` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
		$form=new TaskForm();
		if ($form->load(Yii::$app->request->post()) && $form->validate() ) {
			return $this->render('form', ['form'=>$form,'number'=>$form->number]);
		}
		return $this->render('form', ['form'=>$form]);
    }
	public function actionAjaxNumber()
	{
		$form=new TaskForm();
		if (Yii::$app->request->isAjax) {
			Yii::$app->response->format = Response::FORMAT_JSON;

			if ($form->load(Yii::$app->request->post())) {
				return [
					'data' => [
						'success' => true,
						'model' => $form->number,
						'message' => 'Model has been saved.',
					],
					'code' => 0,
				];
			} else {
				return [
					'data' => [
						'success' => false,
						'model' => null,
						'message' => 'An error occured.',
					],
					'code' => 1, // Some semantic codes that you know them for yourself
				];
			}
		}
	}
}
