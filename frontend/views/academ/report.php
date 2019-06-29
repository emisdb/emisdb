<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'Товары академии';
$this->params['breadcrumbs'][] =['label'=>'Базы', 'url'=>['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

   <p>
        <?= Html::a('CSV,', ['export','page'=>(null !== Yii::$app->request->get('page')? Yii::$app->request->get('page') : 1),'ver'=>0], ['class' => 'btn btn-success']) ?>
        <?= Html::a('CSV;', ['export','page'=>(null !== Yii::$app->request->get('page')? Yii::$app->request->get('page') : 1),'ver'=>1], ['class' => 'btn btn-success']) ?>
 
    </p>
   <div class="row">
        <div class="col-lg-12">
    <?php $form = ActiveForm::begin(['method'=>'post']); ?>
        <div class="form-group">
    <div class="row">
        <div class="col-lg-8">
              <?= $form->field($model, 'name')->textInput() ?>
        </div> 
        <div class="col-lg-4">
 
        <?= Html::submitButton('Выбрать', ['class' => 'btn btn-success', 'style'=>'margin-top:25px;']) ?>
       <?= Html::a('Очистить',['test'], ['class' => 'btn btn-primary', 'style'=>'margin-top:25px;']) ?>
    </div>
    </div>
    </div>

    <?php ActiveForm::end(); ?>
             </div>
    </div>
    <?php          
                $session = Yii::$app->session;
                if ($session->has('report-name')) echo "H";
                echo 'SS:'.$session->get('report-name');
 
     ?>
    <div class="row">
        <div class="col-lg-12">

           <?php

           $cols=[
            ['class' => 'yii\grid\SerialColumn'],

            'paid:ntext:ID',
            'paname:ntext:Товар',
        ];
           
           foreach($columns as $col){
			   $cols[]=$col;
		   
		   }
           ?>
                     </div>
        <div class="col-lg-12">
            
    <?= GridView::widget([
        'dataProvider' => $dp,
        'columns' => $cols,
		
    ]); ?>
         </div>
    </div>

</div>
