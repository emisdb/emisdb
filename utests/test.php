<?php
function numberOfCarryOperations($a,$b){
	$result = 0;
	$i = 10;
	$add = 0;
	while((0<$a)||(0<$b)){
		$aa = $a%$i;
		$bb = $b%$i;
		$a = intval($a/10);
		$b = intval($b/10);
		if($aa+$bb+$add>9) {
			$result++;
			$add = 1;
		} else {
			$add = 0;
		}
	}
	echo "---\n";
	return $result."\n";
}
echo numberOfCarryOperations(123, 456) ;
echo numberOfCarryOperations(555, 555) ;
echo numberOfCarryOperations(900, 11) ;
echo numberOfCarryOperations(145, 55) ;
echo numberOfCarryOperations(0, 0) ;
echo numberOfCarryOperations(1, 99999) ;
echo numberOfCarryOperations(999045, 1055) ;
echo numberOfCarryOperations(101, 809) ;
echo numberOfCarryOperations(189, 209) ;