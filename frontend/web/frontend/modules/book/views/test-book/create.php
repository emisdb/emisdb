<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\book\models\TestBook */

$this->title = 'Create Test Book';
$this->params['breadcrumbs'][] = ['label' => 'Test Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
