<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\AcademProductName */

$this->title = 'Create Academ Product Name';
$this->params['breadcrumbs'][] = ['label' => 'Academ Product Names', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academ-product-name-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
