<?php
use yii\helpers\Html;
use yii\widgets\Menu;
/* @var $this yii\web\View */
$this->title = 'EMIS.DB en';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Earnings and Investments.</h1>
        <p class="lead"> <?= Html::a("Contents", ["site/index"]); ?></p>
        <div class="lists-no-disc">
        <?php
      echo Menu::widget([
    'items' => [
        ['label' => 'The Forth Revolution', 'url' => ['site/index','chap'=>1]],
        ['label' => 'Earnings and Investments', 'url' => ['site/index','chap'=>2]],
        ['label' => 'Studio as investment', 'url' => ['site/index','chap'=>3], 'visible' => !Yii::$app->user->isGuest],
        ['label' => 'Digital business instruments', 'url' => ['site/index','chap'=>4]],
        ['label' => 'Technology: Open Source/Low code', 'url' => ['site/index','chap'=>5]],
        ['label' => 'Project development style: Agile/Waterfall', 'url' => ['site/index','chap'=>6]],
        ['label' => 'What we offer', 'url' => ['site/index','chap'=>7]],
       ],
]);
?>
        </div>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">
                <p> Earnings
                </p>

           </div>
           <div class="col-lg-6">

               <p>Investments
                   </p>

               
               
 
             </div>
               </div>
        </div>

    </div>

