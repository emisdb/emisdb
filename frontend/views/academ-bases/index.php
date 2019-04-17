<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AcademBasesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Academ Bases';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academ-bases-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Academ Bases', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'base_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
