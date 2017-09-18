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
                <p>We stand on the brink of a technological revolution that will fundamentally alter the way we live, work,
                    and relate to one another. The First Industrial Revolution used water and steam power to mechanize production.
                    The Second used electric power to create mass production. The Third used electronics and information technology
                    to automate production. Now a Fourth Industrial Revolution is building on the Third, the digital revolution
                    that has been occurring since the middle of the last century. It is characterized by a fusion of technologies
                    that is blurring the lines between the physical, digital, and biological spheres.</p>
                <p>Digital technologies have had widespread and positive economic effects on the global economy 
                    as well as for individual countries</p>
                <p>To realise the benefits of new technologies while navigating economic transitions, management should pursue policies
                    that incentivise investment and promote development of digital economies.  They will encourage network investment
                    that improves connectivity. </p>
                <p> Technology only moves forward, each advance building on the last until an inevitable breakthrough changes everything.
                    It changes the way companies are run, how customers are acquired and how enterprises do business.
                    And the pace of change is fast—those that are slow to react are likely to find themselves at a disadvantage
                    to fleeterfooted competitors.
                </p>

           </div>
           <div class="col-lg-6">

               <p>Digitalisation drives company growth                </p>
               <div class="row">
                <div class="col-lg-6">
                <ol>
                   <li>Increased access to markets and customers</li>
                   <li>More productive business processes and business models</li>
                   <li>Better access to talent through digital channels</li>
                   <li>New innovations spurred by open access to external (government, open source, web based) data</li>
               </ol>
               </div>
               <div class="col-lg-6">

                 <ol>
                   <li>Increased competition driven by consumers’ ability to easily compare</li>
                   <li>Access to new types of products and services (e.g., the sharing economy)</li>
                   <li>Better employment opportunities through greater access to job listings</li>
                   <li>Improved access to the provider data  powered by internet information</li>
                </ol>
               </div>
              </div>   

               
               
 
             </div>
               </div>
        </div>

    </div>

