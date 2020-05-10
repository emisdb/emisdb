<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'Academ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'file-form',
                                               'enableAjaxValidation' => false,
                                                'options' => ['enctype' => 'multipart/form-data']]); ?>


	<div class="row">
		<?php echo $form->field($ff, 'image')->fileInput(); ?>
		<p class="hint">
			Загрузка файла xml.
		</p>
	</div>
	   <div class="form-group">
                    <?= Html::submitButton('Загрузить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
