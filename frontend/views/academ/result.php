<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'Academ test';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    </p>

<div class="academ-product-form">

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
    <?php            print_r($params); ?>

</div>
    <div class="row">
        <div class="col-lg-5">
            <h1>
<!--            <ol>-->
           <?php  
                echo "R:".$val[0]."<br>";
                echo "N:".$val[1];
//           foreach ($model as $line){
//               echo "<li>".print_r($line)."</li>";
//           }
           ?>
<!--                 </ol>-->
            </h1>
         </div>
    </div>

</div>
