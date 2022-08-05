<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;


?>
	<div class="container">
<?php $f=  ActiveForm::begin(['id' => 'form-tickets-number',
							'enableClientValidation' => true,
							'enableAjaxValidation' => false,
							'action' => ['/gftask/default/ajax-number'],
	]); ?>
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
					<div class="result" id="result-field">Number of tickets:</div>
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
<script type="text/javascript">
	jQuery(document).ready(function() {
		$('#form-tickets-number').on('beforeSubmit', function(e) {
		var form = $(this);
		var formData = form.serialize();
		$.ajax({
			url: form.attr("action"),
			type: form.attr("method"),
			data: formData,
			}).done(function(response) {
			if (response.data.success == true) {
				document.getElementById("result-field").innerHTML = "Number of tickets:" + response.data.model + ".";
			}
		}).fail(function() {
				console.log("error");
			});

	}).on('submit', function(e){
		e.preventDefault();
	});
	});
</script>