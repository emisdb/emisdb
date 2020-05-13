<?php  $this->registerCSS(<<<CSS
	ul#head li {
		list-style-type: none;
		width: 20px;
		height: 22px;
		margin-right: 0px;
		float: left;
		overflow: hidden;
	}
	ul#head li img {
		height: 22px;
	}
CSS
); ?>
<?php  $this->registerJs(<<<JS
 		$(document).ready(function(){
 
    		$("li.movable").mouseover(function(){
   				$(this).removeClass("m_inactive");
   				$(this).addClass("m_active");
        		$("li.m_active").animate({ width: "80px"}, 1000 );
  //    			$("li.inactive").animate({ width: "100px"}, 1000 );
      		});
      		$("li.movable").mouseout(function(){
    			$(this).removeClass("m_active");
   				$(this).addClass("m_inactive");
      			$("li.movable").animate({ width: "20px"}, 1000 );
    		});
		});

JS
); ?>
<ul id="head" style="background-color:#fff; padding-left:0px;">
        <li class="inactive" style="width:5px;"><a href="" ></a></li>
        <li class="inactive movable" ><a href=""  ><img src="<?php echo Yii::$app->homeUrl; ?>images/head/e_.jpg" alt="" /></a></li>
        <li class="inactive movable"><a href=""><img src="<?php echo Yii::$app->homeUrl; ?>images/head/m_.jpg" alt=""/></a></li>
        <li class="inactive movable"><a href=""><img src="<?php echo Yii::$app->homeUrl; ?>images/head/i_.jpg" alt=""/></a></li>
        <li class="inactive movable"><a href=""><img src="<?php echo Yii::$app->homeUrl; ?>images/head/s_.jpg" alt=""/></a></li>
        <li class="inactive"><a href=""><img src="<?php echo Yii::$app->homeUrl; ?>images/head/dot.jpg" alt=""/></a></li>
        <li class="inactive movable"><a href=""><img src="<?php echo Yii::$app->homeUrl; ?>images/head/d_.jpg" alt=""/></a></li>
        <li class="inactive movable"><a href=""><img src="<?php echo Yii::$app->homeUrl; ?>images/head/b_.jpg" alt=""/></a></li>
</ul>


