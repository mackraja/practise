<?php

$avar = array(
0 => array(1,2,3,4,5,6,7,8,9),
1 => array(10,11,12,13,14,15,16,17,7,8,9,10),
23 => array(21,22,23,4,5,6,7,11,12,13,14,15,21));




$seen = array();
foreach($avar as &$entry){
    $entry = array_unique(array_diff($entry,$seen));
    $seen = array_merge($entry,$seen);
}
unset($entry);
echo "<pre>";
print_r($avar);
echo "</pre>";



$items_thread = array_unique($avar[1], SORT_REGULAR);
echo "<pre>";
print_r($items_thread);
echo "</pre>";

$mystring = '[5][1][0]One[4][0][0]Two[8][1][1]Three';

echo "<pre>";
print_r(array_chunk($mystring, 2));
echo "</pre>";



function GetTypesByDecimal($decimal = 0) {
			/**
			 Bit 	=	Type Name					= 	Value store in DB
			 ------------------------------------------------------------
			 1		=	Manual Action				=	0
			 2		=	Offer(automatic)			=	1
			 4		=	Coupon (automatic)			=	2
			 8		=	New Affiliates (automatic)	=	3
			 16		=	New Invoices (automatic)	=	4
			 32		= 	Products Feed (automatic)	=	5
			 **/
			$bit_vs_types = array(
					1 	=> 	0,
					2 	=> 	1,
					4 	=> 	2,
					8 	=> 	3,
					16 	=> 	4,
					32 	=> 	5
			);
			
			if(!$decimal || $decimal < 0) return $decimal;
				
			echo $decimal.' = '.$decToBin = decbin($decimal);
			echo "<br>";
			$length = $count = strlen($decToBin);
			for($i = 0; $i < $length; $i++) {
				echo $number = $decToBin[$i] * pow(2, --$count);
				echo "<br>";
				if($number)$ids[$i] = $bit_vs_types[$number];
			}			
			sort($ids);
			return $ids;
		}

// for ($i=0; $i <= 32; $i++) { 
// 			echo $i.' = '.decbin($i)."</br>";
// 		}		
echo "<pre>";
print_r(GetTypesByDecimal(21));
echo "</pre>";
?>