<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\AcademNumber */

$this->title = 'Update Academ Number: ' . $model->product;
$this->params['breadcrumbs'][] = ['label' => 'Academ Numbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product, 'url' => ['view', 'product' => $model->product, 'base' => $model->base]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="academ-number-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
