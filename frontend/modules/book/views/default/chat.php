<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use frontend\widgets\Mywidg;
use yii\helpers\Url;

//$f=  ActiveForm::begin(['action'=>['chatting'],'id'=>'chat']);
$f=  ActiveForm::begin([
        'id'=>'chat',
	    'enableAjaxValidation' => true,
    ]);
?>
<div class="row">

    <div class='col-md-4'> 
        <?php echo $f->field($form, 'data');?>
    </div>
    <div class='col-md-2'>
        <?php echo Html::submitInput('Send',['style'=>'margin-top:30px;']); ?>
    </div>
    <div class='col-md-6' style='padding-top:30px;'>
       <div id="publish">Messages</div>
    </div>
</div>
<?php
ActiveForm::end();
?>
<script>
    var counter =0;
    var url = "<?=URL::toRoute(['chatting']);  ?>";
    let chat =document.querySelector('#chat');
    chat.addEventListener('submit', function(event) {
        event.preventDefault();
        let message = document.getElementById("chatdata-data").value;
        if (message) {
            document.getElementById("chatdata-data").value = '';
            let response = fetch(url, {
                method: 'POST',
                body: message
            });
            showMessage(message);
        }
        return false;
    });
    async function subscribe() {
        let response = await fetch(url);

        if (response.status == 502) {
            // Таймаут подключения
            // случается, когда соединение ждало слишком долго.
            // давайте восстановим связь
            await subscribe();
        } else if (response.status != 200) {
            // Показать ошибку
            showMessage(response.statusText);
            // Подключиться снова через секунду.
            await new Promise(resolve => setTimeout(resolve, 2000));
            await subscribe();
        } else {
            // Получить сообщение
            let message = await response.text();
            showMessage(message);
            await new Promise(resolve => setTimeout(resolve, 2000));
            await subscribe();
        }
    }
    function showMessage(message){
        let pub =document.querySelector('#publish');
        var tag = document.createElement("div");
        var text = document.createTextNode(message);
        tag.appendChild(text);
        pub.appendChild(tag);
    }
    subscribe();

</script>
