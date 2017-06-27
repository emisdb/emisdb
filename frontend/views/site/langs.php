<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>
    <ol class="langs">
<?php 
        foreach ($langs as $lang) {
            echo '<li><b>'.$lang->shortname.'</b> : '.
                    Html::a($lang->englishname, ['languages/view','id'=>$lang->id_languages]).
                    ' : '.$lang->germanname.
                    ' : '.$lang->img_local.'</li>';
         }
?>
        </ol>
    <?= LinkPager::widget(['pagination' =>$pg]); ?>
</div>
