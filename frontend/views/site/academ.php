<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use frontend\models\AcademNumber;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Academ Bases';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academ-bases-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Academ Bases', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'base_id',
             [
                'label' => 'Товары',
                'format' =>'html',
               'value' => function($model){ return AcademNumber::find()->where(['base'=>$model->id])->count(); }
            ],
 
            ['class' => 'yii\grid\ActionColumn',
             'urlCreator' => function ($action, $model, $key, $index) {
            if ($action === 'update') {
                $url =Url::toRoute(['academ-bases/update', 'id' => $model->id]);
                return $url;
            }
           if ($action === 'delete') {
                $url =Url::toRoute(['academ-bases/delete', 'id' => $model->id]);
                return $url;
            }
           if ($action === 'view') {
                $url =Url::toRoute(['academ-bases/view', 'id' => $model->id]);
                return $url;
            }

          }

                ],
        ],
    ]); ?>

</div>
<div class="site-contact">
    <h1><?= 'Загрузка файла базы данных' ?></h1>

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