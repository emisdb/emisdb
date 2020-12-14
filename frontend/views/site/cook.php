<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use frontend\widgets\Mywidg;

$f=  ActiveForm::begin();
?>
<div class="row">

    <div class='col-md-4'> 
        <?php echo $f->field($form, 'data');?>
    </div>
    <div class='col-md-2'>
        <?php echo Html::submitInput('ENTER',['style'=>'margin-top:30px;']); ?>
    </div>
    <div class='col-md-6' style='padding-top:30px;'>
       <?="<b >".$resid."</b>"; ?>
    </div>
</div>
<?php
ActiveForm::end();
echo Mywidg::widget(['text'=>'Some stuff']);
echo "<hr>";
print_r($res);
echo "<hr>";
print_r($resi);
?>

