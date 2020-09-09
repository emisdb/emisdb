<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $data object */
/* @var $exception Exception */

$this->title = "Спб данные";
$this->registerCSS(<<<CSS
.result-data td{
  padding: 3px;
}
.result-data   td:first-of-type {
    background: #CFD6D3; /* Цвет фона */
	text-align: right;
   }
div.site-index h2 a{
		margin: 0px 10px;
	}
CSS
); 
?>
<div class="site-index">
	<h2 class="headline text-info"><i class="fa fa-warning text-yellow"></i>
		<?= Html::a('Данные санкт-петербургского правительства','http://data.gov.spb.ru/developers/');?></h2>

     <div>
		 <pre>
				<?php var_dump($data) ?>			 
		 </pre>
     </div>
</div>
