<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;


$this->title = $project->name;
?>

<div class="site-error">
<div class="w3-theme-l4">
		
<div class="w3-container"> 
    <h1><?= Html::encode($this->title) ?></h1>
    <h4><?= Html::encode($project->text) ?></h4>
</div>
  
<?php 
        foreach ($chapters as $lang) {
			echo '<div class="w3-container w3-content">';
			echo ' <p class="w3-opacity"><b>'.$lang->title.'</b></p> ';
 			echo '  <div class="w3-panel w3-white w3-card w3-display-container">
				<span class="w3-display-topright w3-padding w3-hover-red">X</span>';
			echo ' <p>'.$lang->text.'</p> ';
 			echo '</div>';
			echo '</div>';
         }
?>

</div>
</div>