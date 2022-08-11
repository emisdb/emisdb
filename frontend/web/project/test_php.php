<!DOCTYPE html>
<html>
<title>Go digital</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/animate.css">
<style>
    body {
        position: relative;
    }
</style>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body  data-spy="scroll" data-target="#comNavbar">
<?php
echo "test";
//    phpinfo();
?>

	$sum = array_sum(array_map(function($val){ return is_numeric($val) ? $val :0;}, [1,2,3, null, 'test', new DateTime()]));
	var_dump($sum);
	echo "<div>D: ".$sum."</div>";
?>

</body>
</html>