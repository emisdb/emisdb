<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use frontend\models\AcademNumber;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Базы Академии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academ-bases-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Отчет', ['report'], ['class' => 'btn btn-success']) ?>
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
             'template'=>'{update}  {delete}',
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

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'file-form',
                                               'enableAjaxValidation' => false,
                                                'options' => ['enctype' => 'multipart/form-data']]); ?>


	<div class="row">
       <div class="col-lg-3">
 		<?php echo $form->field($ff, 'image')->fileInput(); ?>

	</div>
      <div class="col-lg-3">
                    <?= Html::submitButton('Загрузить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                	</div>
      <div class="col-lg-6">
               <?php
                echo Html::a('Test', ['count'], [
                 'id' => 'ajax_link_01',
                 ]
                ); ?>
 
               <?php
               echo Html::tag('span', '...', ['id' => 'ajax_result_01']);
 
                $this->registerJs("$('#ajax_link_01').click(handleAjaxLink);", \yii\web\View::POS_READY);
                $this->registerJs(
                        "function handleAjaxLink(e) {
                            e.preventDefault();
                            var  glink = $(e.target);
                            var callUrl = glink.attr('href');
  //                        var callUrl = 'http://emisdb".Url::toRoute('count')."';
                            $.ajax({
                            type: 'post',
                            dataType: 'json',
                            data:[0],
                            url: callUrl,
                            success:function(resp){ 
                            $('#ajax_result_01').html(resp.body);
                            },
                            error: function(jqXHR, textStatus, errorThrown)
                            {
                                 var reso='статус:'+jqXHR.readyState+'  '+ jqXHR.status+' '
                                 +jqXHR.responseText+ '  не так: '
                                 +textStatus+' '+errorThrown+ ' '+jqXHR;
                                $('#ajax_result_01').html(reso);
                            },
                             });"
                        ." return false;}",
                        \yii\web\View::POS_READY);
               ?>
           </div>
                      <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
</div>