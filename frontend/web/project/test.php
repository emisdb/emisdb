<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>test</title>
		<link rel="stylesheet" href="css/test.css">
	</head>
    <body>		
    <div id = "app">
		<div class="wrapper" >
			<div class="inside" v-for="month in monthes" v-bind:class="{'widel' : month.id == 1 }">
				{{month.full}}
			</div>
		</div>
	</div>
		
		<?php
		phpinfo();
		?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://unpkg.com/vue"></script>
		<script src="js/test.js"></script>
    </body>
</html>
