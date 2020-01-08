<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<?=$this->render('studio_header');	?>
<body  data-spy="scroll" data-target="#comNavbar">
    <?php $this->beginBody() ?>
	
	<?=$this->render('studio_navbar');	?>

    <div class="wrap w3-theme-l4">
       <div class="container">
         <?= Alert::widget() ?>
        <?= $content ?>
        </div>
    </div>

 
    <?php
	echo $this->render('studio_footer');
	$this->endBody() 
			?>
</body>
</html>
<?php 
         //  $this->registerJsFile(Yii::$app->homeUrl.'js/myjs.js',  ['position' => yii\web\View::POS_END]);
        //    $this->registerCssFile(Yii::$app->homeUrl.'css/mysite.css');
        //:    set on AppAsset
?>
<?php $this->endPage() ?>
