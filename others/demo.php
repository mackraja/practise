<?php
echo "<pre>";
var_dump(array('', false, 42, array('42')));
echo "<br/>";
var_export(array('', false, 42, array('42')));
echo "<br/>";
print_r(array('', false, 42, array('42')));
echo "<br/>";

echo chop("MontyKhannaP","P")."</br>";
echo substr("MontyKhannaP",0,-1);


echo "</br><------------------Logic------------------></br>";
$list1 = "A,T,L,H,K,L";
$list2 = "T,L";
$list3 = "A,H,K";

$arrayList1 = explode(",", $list1);
$arrayList2 = explode(",", $list2);

$i=0;
while ($a = $arrayList1[$i]) {
	$j=0;
	$flog = false;
	while ($b = $arrayList2[$j]) {
		if($a == $b){
			$flog = true;
			break;
		}
		$j++;
	}
	if($flog == false){
		$mack .= $a;
	}
	$i++;
}
echo $mack;
echo "</br>";
for ($i=0; $i < count($arrayList1); $i++) {
	$flag = false;
	for ($j=0; $j < count($arrayList2); $j++) {
		if ($arrayList1[$i] == $arrayList2[$j]) {
			$flag = true;
		}
	}
	if($flag == false){
		$matched[] .= $arrayList1[$i];
	}
}
print_r($matched);

echo "</br><------------------Exponent------------------></br>";

function expo($base,$power){
	$a = $base;
	for ($i=1; $i < $power; $i++) { 
		$base = $base * $a;
	}
	echo $base;
}
expo(8,6);

echo "</br><------------------Passed by value and address------------------></br>";

class Holder {
    private $value;

    public function __construct($value) {
        $this->value = $value;
    }

    public function getValue() {
        return $this->value;
    }
}

echo "</br><------------------Passed by value------------------></br>";

function swap($x, $y) {
    $tmp = $x;
    $x = $y;
    $y = $tmp;
}
$a = new Holder('a');
$b = new Holder('b');
swap($a, $b);
echo $a->getValue() . ", " . $b->getValue() . "\n";

echo "</br><------------------Passed by Address------------------></br>";

function swapAdd(&$x, &$y) {
    $tmp = $x;
    $x = $y;
    $y = $tmp;
}
$a = new Holder('a');
$b = new Holder('b');
swapAdd($a, $b);
echo $a->getValue() . ", " . $b->getValue() . "\n";

function add_some_extra(&$string) // if remove & then passed by value else passed by address
{
    $string .= 'and something extra.';
}
$str = 'This is a string, ';
add_some_extra($str);
echo $str;    // outputs 'This is a string, and something extra.'