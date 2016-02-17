<?php
/**********************************************************************************
 ****************************** Function ******************************************
 **********************************************************************************/

$commercial_admin = '';
$x = 0;
$y = 1;
for ($i = 0; $i <= 10; $i++) {
	$series[$i] = ($i * ($i + 1)) / 2;
	// 1,3,6,10,15....

	$fabbo[$i] = $x + $i;
	if ($i > 1) {
		$z = $x + $y;
		$fabbo[$i] = $z;
		// Fibonacci series
		// Formula Fn = Fn-1 + Fn-2
		$x = $y;
		$y = $z;
	}
}
/**********************************************************************************
 ****************************** Make a series of 1,3,6,10,15 **********************
 **********************************************************************************/

echo '<strong>Make a series of 1,3,6,10,15....</strong></br>';
echo '<pre>';
print_r($series);
echo '</pre>';
echo str_repeat('-', 100) . '</br>';

/**********************************************************************************
 ****************************** Fibonacci Series ***********************************
 **********************************************************************************/

echo '<strong>Fibonacci Series</strong></br>';
echo '<pre>';
print_r($fabbo);
echo '</pre>';
echo str_repeat('-', 100) . '</br>';

/*********************************************************************************
 ************************ Prime Number *******************************************
 ********************************************************************************/

function prime($n){

	for($i=1;$i<=$n;$i++){  //numbers to be checked as prime
		$counter = 0;
		for($j=1;$j<=$i;$j++){ //all divisible factors
			
			if($i % $j==0){
				$counter++;
			}
		}
		//prime requires 2 rules ( divisible by 1 and divisible by itself)
		if($counter==2){
			print $i."<br/>";
		}
	}
}
echo '<strong>Prime Number 2,3,5,7....</strong></br>';
prime(20);  //find prime numbers from 1-20
echo str_repeat('-', 100) . '</br>';

/*********************************************************************************
 ************************ Star Triangle ******************************************
 ********************************************************************************/
echo '<strong>Star Triangle</strong></br>';
for($i=0;$i<=5;$i++){
	for($j=1;$j<=$i;$j++){
		echo "*&nbsp;";
	}
	echo "<br>";
}
echo "<br>";
/********************************************************************************/
for($i=0;$i<=5;$i++){
	for($j=5-$i;$j>=1;$j--){
		echo "*&nbsp;";
	}
	echo "<br>";
}
echo "<br>";
/********************************************************************************/
for($i=0;$i<=6;$i++){
	for($k=6;$k>=$i;$k--){
		echo " &nbsp;";
	}
	for($j=1;$j<=$i;$j++){
		echo "* &nbsp;";
	}
	echo "<br>";
}
for($i=5;$i>=1;$i--){
	for($k=6;$k>=$i;$k--){
		echo " &nbsp;";
	}
	for($j=1;$j<=$i;$j++){
		echo "* &nbsp;";
	}
	echo "<br>";
}
/********************************************************************************/
$n=9;
for($i=0; $i<=$n; $i++)
{
	for($j=1; $j<=$i; $j++)
		echo "&nbsp;";
		for($k=1; $k<=$n-$i; $k++)
			echo $k;
			for($j=($k-2); $j>0; $j--) 
				echo $j;
			for($k=1; $k<=$i; $k++)
				echo "&nbsp;";
				echo "</br>";

}
/********************************************************************************/
$n = $i = 10;
while ($i--){
	echo str_repeat('&nbsp;&nbsp;', $i).str_repeat('*&nbsp;&nbsp;', $n - $i)."<br>";
}
/***** OR *****/
$height = 10;
for($i=1;$i<=$height;$i++){
    for($t = 1;$t <= $height-$i;$t++)
    {
        echo "&nbsp;&nbsp;";
    }
    for($j=1;$j<=$i;$j++)
    {
        // use &nbsp; here to procude space after each asterix
        echo "*&nbsp;&nbsp;";
    }
echo "<br />";
}
echo str_repeat('-', 100) . '</br>';
