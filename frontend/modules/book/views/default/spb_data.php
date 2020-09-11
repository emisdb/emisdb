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
		 <table  border="1" class="result-data">
			 <thead>
				 <tr>
					<?php
					   foreach ($headers as $key => $value) {
						   echo "<td>".$value."</td>";
					   }
					   ?>
				 </tr>
			 </thead>
			 <tbody>
				 <?php foreach($data as $val): ?>
				 <tr>
					<?php
					   foreach ($headers as $key => $value) {
						   echo "<td>".$val['row'][strtolower($key)]."</td>";
					   }
					   ?>
					 
				 </tr>
				<?php endforeach; ?>
			 </tbody>
		 </table>
         <div style="border: solid 1px;">
			 <? echo LinkPager::widget([
				 'pagination' => $pagination,
				 'registerLinkTags' => true
			 ]); ?>
             <p>№ текущей страницы: <?= $pagination->getPage() + 1 ?></p>
             <p>Количество страниц: <?= $pagination->getPageCount() ?></p>
             <p>Количество постов: <?= $pagination->totalCount ?></p>
         </div>
		 <pre>
				<?php // var_dump($headers) ?>			
				<?php // var_dump($data) ?>			
		 </pre>
		 
     </div>
</div>
