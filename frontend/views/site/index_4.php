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
              <p>Digital technologies are reshaping industries and societies</p>
                 <ol>
                   <li>BIG DATA / ADVANCED ANALYTICS Gains customer insights for personalised recommendations</li>
                   <li>View of the real-world augmented with context relevant information</li>
                   <li>3D PRINTING Manufacture tailored products in smaller quantities, closer to the point-of-sale/use</li>
                   <li>INTERNET OF THINGS & SENSORS give rise to Intelligent products with sensors and IP addresses 
                       to control the environment</li>
                   <li>ADVANCED ROBOTICS produces Smart robots with the ability to react autonomously to unknown situations</li>
                   <li>COGNITIVE COMPUTING brings Systems equipped with artificial intelligence to sense, predict, and infer independently</li>
                   <li>BE SOCIAL, LOCAL, MOBILE allows to engage with customers in a relevant and continuous way </li>
                   <li>CLOUD COMPUTING Scalable processing power combined with shared cloud storage to build SaaS solutions</li>
                   <li>SYSTEM INTEGRATION Linking together individual computing systems and software applications</li>
                 </ol>
  
                </p>
 
           </div>
           <div class="col-lg-6">

               
 
             </div>
               </div>
        </div>

    </div>

