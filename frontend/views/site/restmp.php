<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'Academ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    </p>
   <div class="row">
        <div class="col-lg-12">
    <?= 
        "Q:"
//        .$query->createCommand()->sql.
//        '<br/>'.$query->createCommand()->getRawSql();
    ?>
             </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <?= "<br>"
        .$query->sql; 
//       .$dp->sql; 
?>
           <?php
/*
           $command= Yii::$app->db->createCommand($dp->sql)
                   ->bindValue(':bas_lead', 3)
                   ->bindValue(':bas_follow', 4)
                   ->bindValue(':bas_cut', 3)
;
        $rawData = $command->queryAll();
           print_r($rawData); 

           echo "<hr>";
           print_r($dp->getModels()); 
*/
           $cols=[
            ['class' => 'yii\grid\SerialColumn'],

            'paid',
            'paname',
        ];
           
           foreach($columns as $col) $cols[]=$col;
           ?>
                     </div>
        <div class="col-lg-12">
            
    <?= GridView::widget([
        'dataProvider' => $dp,
        'columns' => $cols,
    ]); ?>
         </div>
    </div>

</div>
