<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\book\models\TestAuthor */

$this->title = 'Update Test Author: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Test Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="test-author-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
