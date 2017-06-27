 b<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Languages */

$this->title = $model->id_languages;
$this->params['breadcrumbs'][] = ['label' => 'Languages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="languages-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <h6><?=">".$name; ?></h6>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_languages], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_languages], [
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
            'id_languages',
            'shortname',
            'germanname',
            'englishname',
            ['value'=>$model->img_local,
              'label'=>'flag',
                'format'=>'raw'],
        ],
    ]) ?>

</div>
