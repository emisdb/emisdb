<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $data object */
/* @var $exception Exception */

$this->title = "Спб данные";

?>
<div class="site-index">
	<h2 class="headline text-info"><i class="fa fa-warning text-yellow"></i>
		<?= Html::a('Парсинг данных санкт-петербургского правительства','http://data.gov.spb.ru/developers/');?></h2>
		<?= Html::input('text','id',$id, $options=['class'=>'form-control','maxlength'=>10, 'style'=>'width:350px']) ?>
		<?= Html::a('Отчет', ['report'], ['class' => 'btn btn-success']) ?>
       <pre>
				<?php  var_dump($headers); ?>
      <hr/>
	    <div id="result"> </div>
</div>
