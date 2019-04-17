<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\AcademNumber */

$this->title = $model->product;
$this->params['breadcrumbs'][] = ['label' => 'Academ Numbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="academ-number-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'product' => $model->product, 'base' => $model->base], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'product' => $model->product, 'base' => $model->base], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'product',
            'base',
            'number',
            'sum',
        ],
    ]) ?>

</div>
