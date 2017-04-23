<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Languages */

$this->title = 'Update Languages: ' . ' ' . $model->id_languages;
$this->params['breadcrumbs'][] = ['label' => 'Languages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_languages, 'url' => ['view', 'id' => $model->id_languages]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="languages-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
