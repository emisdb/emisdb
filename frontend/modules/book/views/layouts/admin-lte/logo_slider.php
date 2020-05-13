<?php  $this->registerCSS(<<<CSS

#layer1, #layer2,#layer3,#layer4,#layer5,#layer6

{
	display:none;
	width:340px;
	height:50px;
	margin:2px auto 2px;
	position:relative;
 	font-family: 'BebasNeueRegular', Verdana, Geneva, sans-serif;
    font-weight: bold;
    text-shadow: #c4c5c0 2px 2px 2px;
    font-size: 24px;
    text-align: justify;
        
}
CSS
); ?>
<?php  $this->registerJs(<<<JS
var steps=1;

function step4()
{
    $("#layer"+steps).fadeTo(2000,0.4,function(){step2();});
}

function step3()
{
    $("#layer"+steps).fadeIn(2000,function(){step4();});
}

function step2()
{
    $("#layer"+steps).fadeOut(2000,function() {step3();});
    if(steps>5) steps=1;
    else    steps=steps+1;
}
function step1()
{
//    $("#layer1").css("height","167px");
    $("#layer1").fadeTo("fast",1,function(){step2();});
} 		$(document).ready(function(){
			$("#layer1").fadeTo(1500,0.3,function() {step1();});

		});

JS
); ?>
<div class="canvas_center"><!-- -->      

<div id="layer1">
    Enterprise
</div>
<div id="layer2">
    Management
</div>
<div id="layer3">
    Information
</div>
<div id="layer4">
    Systems
</div> 
<div id="layer5">
    Development
</div> 
<div id="layer6">
    Bureau
</div> 
</div><!---->  

