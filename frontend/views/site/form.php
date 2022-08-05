<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

if(isset($number)) $color='#a8f'; else $color='#8fa';
if(isset($number)) {
	echo '<h4 style="background-color:' . $color . ';">Number of tickets:' . $number . '</h4>';
}
$f=  ActiveForm::begin();
echo "<div class='row'>";
echo '<div class="col-md-6">';
echo $f->field($form, 'start');
echo "</div>";
echo '<div class="col-md-6">';
echo $f->field($form, 'finish');
echo "</div>";
echo "</div>";
echo "<div class='row'>";
echo '<div class="col-md-3">';
echo $f->field($form, 'name')->label("Recipient name");
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