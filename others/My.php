<?php

// Fabbonaci Series :- 0,1,1,2,3,5,8,13,21

$a = 0;
$b = 1;
for ($i=0; $i < 10; $i++) { 
	$fabbo[$i] = $a + $i;
	if($fabbo[$i] > 0){
		$c = $a + $b;
		$fabbo [$i] = $c;
		$b = $a;
		$a = $c;
	}
}
echo "<pre>";
print_r($fabbo);



// Using Recursive
function fabbonaci($a,$b){
	if($a > 10){
		break;
	}else{
		echo $c = $a + $a;
		if($c > 0){
			echo $c = $a + $b;
			$b = $a;
			$a = $c;
		}
		echo "</br>";
		$a ++;
	}
	fabbonaci($a,$b);
}
echo "0</br>1</br>";
fabbonaci(1,0);
?>