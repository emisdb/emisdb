<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $data object */
/* @var $exception Exception */

$this->title = "Спб данные";
$this->registerCSS(<<<CSS
.result-data td{
  padding: 3px;
}
div.scrolled{
    overflow-x: scroll; 		
}
.result-data   td:first-of-type {
    background: #CFD6D3; /* Цвет фона */
	text-align: right;
   }
div.site-index h2 a{
		margin: 0px 10px;
	}
.hidediv {
  display: none;
}
.showdiv{
	font-size: 1.4em;
	cursor:pointer;
}
.showdiv:hover + .hidediv {
  display: block;
  color: gray;
}
td {
	vertical-align:top;
}
CSS
); 
?>
<div class="site-index">
	<h2 class="headline text-info"><i class="fa fa-warning text-yellow"></i>
		<?= Html::a('Данные санкт-петербургского правительства','http://data.gov.spb.ru/developers/');?></h2>

     <div>
	    <div class="scrolled">
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
				 <?php if(!($data === null)): ?>
				 <?php  foreach($data as $val): ?>
				 <tr>
					<?php
					   foreach ($headers as $key => $value) {
					       $current_dt=trim($val['row'][strtolower($key)]);
						   $show_txt = "";
						   if(mb_strlen($current_dt) >100){
							   $show_txt =mb_substr($current_dt,0,100);
							   $inti= mb_strrpos($show_txt," ");
							   if($inti<100){
								   $show_txt= mb_substr($show_txt,0, $inti);
							   }							   
							   $hide_txt= mb_substr($current_dt, $inti);
						   }
						   
						   echo "<td>".(mb_strlen($show_txt) == 0 
								   ? $current_dt 
								   : "".$show_txt."<span class='showdiv'>..</span><div class='hidediv'>".$hide_txt."</div>")
								   ."</td>";
					   }
					   ?>
				 </tr>
				<?php endforeach; ?>
				<?php endif; ?>
			 </tbody>
		 </table>
         </div>
         <div style="border: solid 1px;">
			 <? echo LinkPager::widget([
				 'pagination' => $pagination,
				 'registerLinkTags' => true
			 ]); ?>
             <p>№ текущей страницы: <?= $pagination->getPage() + 1  ?>(<?=($pagination->getPageCount()."/".$pagination->totalCount) ?>)</p>
         </div>
		 <pre>
				<?php // var_dump($headers) ?>			
				<?php // var_dump($data); ?>
		 </pre>
		 
     </div>
</div>
