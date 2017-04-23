<?php
use yii\widgets\Menu;
/* @var $this yii\web\View */
$this->title = 'EMIS.DB en';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Business goes digital!</h1>

        <p class="lead">EMIS.DB business application development.</p>
        <div class="lists-no-disc">
        <?php
      echo Menu::widget([
    'items' => [
        ['label' => 'The Forth Revolution', 'url' => ['site/index']],
        ['label' => 'Earnings and Investments', 'url' => ['site/login']],
        ['label' => 'Studio as investment', 'url' => ['site/login'], 'visible' => !Yii::$app->user->isGuest],
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
            <div class="col-lg-4">
                <h2>The Forth Revolution</h2>

                <p>We stand on the brink of a technological revolution that will fundamentally alter the way we live, work,
                    and relate to one another. The First Industrial Revolution used water and steam power...</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Revolution &raquo;</a></p>
            </div>
           <div class="col-lg-4">
                <h2>Earnings and Investments</h2>

                <p>We stand on the brink of a technological revolution that will fundamentally alter the way we live, work,
                    and relate to one another. The First Industrial Revolution used water and steam power...</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Revolution &raquo;</a></p>
            </div>
           <div class="col-lg-4">
                <h2>Digital business instruments</h2>

                <p>We stand on the brink of a technological revolution that will fundamentally alter the way we live, work,
                    and relate to one another. The First Industrial Revolution used water and steam power...</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Revolution &raquo;</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <h2>Technology: Open Source/Low code</h2>

                <p>We stand on the brink of a technological revolution that will fundamentally alter the way we live, work,
                    and relate to one another. The First Industrial Revolution used water and steam power...</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Revolution &raquo;</a></p>
            </div>
           <div class="col-lg-4">
                <h2>Project development style: Agile/Waterfall</h2>

                <p>We stand on the brink of a technological revolution that will fundamentally alter the way we live, work,
                    and relate to one another. The First Industrial Revolution used water and steam power...</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Revolution &raquo;</a></p>
            </div>
           <div class="col-lg-4">
                <h2>What we offer</h2>

                <p>We stand on the brink of a technological revolution that will fundamentally alter the way we live, work,
                    and relate to one another. The First Industrial Revolution used water and steam power...</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Revolution &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
