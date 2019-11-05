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
<head>
 <!DOCTYPE html>
<html>
<title>Go digital</title>
<meta charset="<?= Yii::$app->charset ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/animate.css">
 <style>
  body {
      position: relative;
  }
  </style>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>
<body  data-spy="scroll" data-target="#comNavbar">
    <?php $this->beginBody() ?>
<!-- Navbar (sit on top) -->
<nav class="w3-top w3-card w3-blue" id="comNavbar">
  <div class="w3-bar" id="myNavbar"> 
      <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
      <i class="fa fa-bars"></i>
    </a>
      <ul class="nav navbar-nav">
          <li class="active"><a href="#home" class="w3-bar-item w3-button">GO DIGITAL</a></li>
          <li><a href="#about" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-line-chart"></i>GROWTH</a></li>
          <li><a href="#portfolio" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-money"></i>EARNINGS</a></li>
          <li><a href="#contact" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-envelope"></i> CONTACT</a></li>
        </ul>
 
 </div>

  <!-- Navbar on small screens -->
  <nav id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="#about" class="w3-bar-item w3-button" onclick="toggleFunction()">GROWTH</a>
    <a href="#portfolio" class="w3-bar-item w3-button" onclick="toggleFunction()">EARNINGS</a>
    <a href="#contact" class="w3-bar-item w3-button" onclick="toggleFunction()">CONTACT</a>
    <a href="#" class="w3-bar-item w3-button">SEARCH</a>
  </nav>
</nav>
    <div class="wrap">
       <div class="container">
         <?= Alert::widget() ?>
        <?= $content ?>
        </div>
    </div>

 
    <?php $this->endBody() ?>
</body>
</html>
<?php 
         //  $this->registerJsFile(Yii::$app->homeUrl.'js/myjs.js',  ['position' => yii\web\View::POS_END]);
        //    $this->registerCssFile(Yii::$app->homeUrl.'css/mysite.css');
        //:    set on AppAsset
?>
<?php $this->endPage() ?>
