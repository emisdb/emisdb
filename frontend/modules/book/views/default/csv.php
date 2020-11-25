<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use frontend\models\AcademNumber;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Парсинг CSV';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academ-bases-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Отчет', ['report'], ['class' => 'btn btn-success']) ?>
    </p>



</div>
<div class="site-contact">
    <h1><?= 'Загрузка файла базы данных' ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'file-form',
                                               'enableAjaxValidation' => false,
                                                'options' => ['enctype' => 'multipart/form-data']]); ?>


	<div class="row">
       <div class="col-lg-3">
 		<?php echo $form->field($ff, 'csv')->fileInput(); ?>

	</div>
      <div class="col-lg-3">
                    <?= Html::submitButton('Загрузить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                	</div>

                      <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
</div>
<div>
        <?php
		foreach($result as $i => $res) {
		    echo "<h3>$i</h3>";
			foreach($res as $key => $val) {
				echo "$key = $val<br>";
			}
		}
		?>
    <pre>
        <?php
		var_dump($keys);
		?>
    </pre>
</div>