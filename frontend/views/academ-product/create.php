<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\AcademProduct */

$this->title = 'Create Academ Product';
$this->params['breadcrumbs'][] = ['label' => 'Academ Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academ-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
