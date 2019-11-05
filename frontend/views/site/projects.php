<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;


$this->title = 'Projects';
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>
    <ul class="langs">
<?php 
        foreach ($projects as $lang) {
            echo '<li>'.$lang->id.'. <b>'.$lang->name.'</b> : '.
                    Html::a($lang->text, ['languages/view','id'=>$lang->id]).
					'</li>';
         }
?>
        </ul>
    <?= LinkPager::widget(['pagination' =>$pg]); ?>
</div>