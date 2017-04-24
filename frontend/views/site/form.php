<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

if($act) $color='#a8f'; else $color='#8fa';
echo '<h1 style="background-color:'.$color.';">We got a guy '.$name.' is '.$age.'.</h1> <h3>Contact him:'.$mail.'</h3>';
$f=  ActiveForm::begin();
echo "<div class='row'>";
echo '<div class="col-md-3">';
echo $f->field($form, 'name')->label("Recipient name");
echo "</div>";
echo '<div class="col-md-3">';
echo $f->field($form, 'age');
echo "</div>";
echo '<div class="col-md-3">';
echo $f->field($form, 'email');
echo "</div>";
echo '<div class="col-md-3">';
echo $f->field($form, 'active')->checkbox();
echo "</div>";
echo "</div>";
echo "<div class='row'>";
echo Html::submitInput('ENTER');
echo "</div>";
ActiveForm::end();