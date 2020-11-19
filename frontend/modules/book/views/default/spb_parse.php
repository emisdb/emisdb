<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $data object */
/* @var $exception Exception */

$this->title = "Спб данные";

?>
<div class="site-index">
	<h2 class="headline text-info"><i class="fa fa-warning text-yellow"></i>
		<?= Html::a('Парсинг данных санкт-петербургского правительства','http://data.gov.spb.ru/developers/');?></h2>
		<?= Html::input('number','data_id', $id, $options=['class'=>'form-control','maxlength'=>10, 'style'=>'width:350px', 'id'=>'data_id']) ?>
	<?= Html::a('Получить данные', ['ajax-parse','page'=>1], ['class' => 'btn btn-success', 'id'=>'getData']) ?>
       <pre>
				<?php  var_dump($headers); ?>
      <hr/>
	    <div id="resultSpace"> </div>
       </pre>
</div>
<?php  $this->registerJs(<<<JS
    $(document).ready(function () {
        $("#getData").click(function(e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.
            
            var idd = $('#data_id').val();
            var form = $(this);
            var url = form.attr('href') + "&id=" +idd;

            $.ajax({
                type: "POST",
                dataType: 'json',
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function(data)
                {
                    
                    $('#resultSpace').html(JSON.stringify(data));
                }
            });
        });

    });
JS
, $this::POS_READY); ?>