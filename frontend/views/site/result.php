<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'Academ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    </p>

    <div class="row">
        <div class="col-lg-5">
            <ol>
           <?php
           foreach ($model as $line){
               echo "<li>".print_r($line)."</li>";
           }
           ?>
                </ol>
         </div>
    </div>

</div>
