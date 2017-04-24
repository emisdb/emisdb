<?php
use yii\helpers\Html;
use yii\widgets\Menu;
/* @var $this yii\web\View */
$this->title = 'EMIS.DB en';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>The Forth Revolution.</h1>
        <p class="lead"> <?= Html::a("Contents", ["site/index"]); ?></p>
        <div class="lists-no-disc">
        <?php
      echo Menu::widget([
    'items' => [
        ['label' => 'The Forth Revolution', 'url' => ['site/index','chap'=>1]],
        ['label' => 'Earnings and Investments', 'url' => ['site/index']],
        ['label' => 'Studio as investment', 'url' => ['site/index'], 'visible' => !Yii::$app->user->isGuest],
        ['label' => 'Digital business instruments', 'url' => ['site/index']],
        ['label' => 'Technology: Open Source/Low code', 'url' => ['site/index']],
        ['label' => 'Project development style: Agile/Waterfall', 'url' => ['site/index']],
        ['label' => 'What we offer', 'url' => ['site/index']],
       ],
]);
?>
        </div>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">
                <p>We stand on the brink of a technological revolution that will fundamentally alter the way we live, work,
                    and relate to one another. The First Industrial Revolution used water and steam power to mechanize production.
                    The Second used electric power to create mass production. The Third used electronics and information technology
                    to automate production. Now a Fourth Industrial Revolution is building on the Third, the digital revolution
                    that has been occurring since the middle of the last century. It is characterized by a fusion of technologies
                    that is blurring the lines between the physical, digital, and biological spheres.</p>
                <p>Digital technologies have had widespread and positive economic effects on the global economy 
                    as well as for individual countries</p>

           </div>
           <div class="col-lg-6">
                <h2>Earnings and Investments</h2>

                <p>We stand on the brink of a technological revolution that will fundamentally alter the way we live, work,
                    and relate to one another. The First Industrial Revolution used water and steam power...</p>

             </div>
               </div>
        </div>

    </div>

