<?php
use yii\helpers\Html;
?>
<!-- Navbar (sit on top) -->
<nav class="w3-top w3-card w3-blue" id="comNavbar">
	<div class="w3-bar" id="myNavbar"> 
    <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
		 <i class="fa fa-bars"></i>
	</a>
	<ul class="nav navbar-nav">
		<li class="active"> <?= Html::a("GO DIGITAL", ['projects','#'=>'home'],['class'=>'w3-bar-item w3-button']) ?>
		<li><a href="#about" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-line-chart"></i>GROWTH</a></li>
		<li><a href="#portfolio" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-money"></i>EARNINGS</a></li>
		<li><a href="#contact" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-envelope"></i> CONTACT</a></li>
	</ul>
 
	</div>

  <!-- Navbar on small screens -->
  <nav id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="#about" class="w3-bar-item w3-button" onclick="toggleFunction()">GROWTH</a>
    <a href="#portfolio" class="w3-bar-item w3-button" onclick="toggleFunction()">EARNINGS</a>
    <a href="#contact" class="w3-bar-item w3-button" onclick="toggleFunction()">CONTACT</a>
    <a href="#" class="w3-bar-item w3-button">SEARCH</a>
  </nav>
</nav>