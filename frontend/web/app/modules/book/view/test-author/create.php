<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\book\models\TestAuthor */

$this->title = 'Create Test Author';
$this->params['breadcrumbs'][] = ['label' => 'Test Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-author-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
