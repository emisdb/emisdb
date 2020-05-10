<?php

namespace frontend\controllers;

use Yii;
use frontend\models\AcademNumber;
use frontend\models\AcademNumberSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AcademNumberController implements the CRUD actions for AcademNumber model.
 */
class AcademNumberController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AcademNumber models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AcademNumberSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AcademNumber model.
     * @param integer $product
     * @param integer $base
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($product, $base)
    {
        return $this->render('view', [
            'model' => $this->findModel($product, $base),
        ]);
    }

    /**
     * Creates a new AcademNumber model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AcademNumber();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product' => $model->product, 'base' => $model->base]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AcademNumber model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $product
     * @param integer $base
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($product, $base)
    {
        $model = $this->findModel($product, $base);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product' => $model->product, 'base' => $model->base]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AcademNumber model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $product
     * @param integer $base
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($product, $base)
    {
        $this->findModel($product, $base)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AcademNumber model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $product
     * @param integer $base
     * @return AcademNumber the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($product, $base)
    {
        if (($model = AcademNumber::findOne(['product' => $product, 'base' => $base])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
