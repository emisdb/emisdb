<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Languages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="languages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'shortname')->textInput(['maxlength' => 3]) ?>

    <?= $form->field($model, 'germanname')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'englishname')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'flagpic')->textInput(['maxlength' => 45]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
