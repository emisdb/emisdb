<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;


?>
	<div class="container">
<?php $f=  ActiveForm::begin(); ?>
		<div class='row'>
			<div class="col-md-4">
				<?php echo $f->field($form, 'start'); ?>
			</div>
			<div class="col-md-4">
				<?php echo $f->field($form, 'finish'); ?>
			</div>
			<div class="col-md-4">
				<div class="margintop">
					<?php echo Html::submitInput('Run'); ?>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class="col-md-4">
				<?php
				if(isset($number)&&$number>0 ) $color='#faf'; else $color='#faa';
				if(isset($number)) {
					echo '<div class="result">Number of tickets:' . $number . '</div>';
				}
				?>
			</div>
		</div>
		<?php ActiveForm::end(); ?>
	</div>
<style>
	.result{
        margin: 5px ;
		font-weight: bold;
	}
	.margintop{
		margin-top: 25px;
	}
</style>