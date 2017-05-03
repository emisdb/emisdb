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
                <p>As a result of the microcomputer revolution, business have deployed computers widely across their employee basis,
                    enabling widespread automation of business processes using software. 
                    The need for software automation and new applications for business processes places demands on software developers
                    to create those custom applications in volume, while tailoring to organizations’ unique needs.
                    Low-code development platforms developed as a means to allow for quick creation and use of working applications 
                    that can address the specific process and data needs of the organization. </p>
                <p>
                  Low-code development’s market growth can be attributed to its flexibility and ease. 
                  Low-Code development platforms are shifting focus towards general purpose of applications, 
                  with the ability to add in custom code when needed or desired
  
                </p>
 
           </div>
           <div class="col-lg-6">

               
 
             </div>
               </div>
        </div>

    </div>

