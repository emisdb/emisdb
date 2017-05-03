<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use frontend\widgets\Mywidg;

$f=  ActiveForm::begin();
echo '<div class="row">';
echo "<div class='col-md-4'>";
echo $f->field($form, 'data');
echo "</div>";
echo "<div class='col-md-2'>";
echo Html::submitInput('ENTER',['style'=>'margin-top:30px;']);
echo "</div>";
echo "<div class='col-md-6' style='padding-top:30px;'>";
echo "<b >".$resid."</b>";
echo "</div>";
echo "</div>";
ActiveForm::end();

echo Mywidg::widget(['text'=>'Some stuff']);
echo "<hr>";
print_r($res);
echo "<hr>";
print_r($resi);
?>

