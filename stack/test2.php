// <?php
//function micro-interpreter
//assuming valid conditions: <=, >=, =<, =>

$a="32.543";
$b="=>1957";


$my_result=m_int($a,$b);

echo"************************************";?><br><?php
echo"variable is:".$my_result[0];?><br><?php
echo "comparison is: ".$my_result[1];?><br><?php
echo "value is: ".$my_result[2];?><br><?php
echo "result is: ".$my_result[3];?><br><?php

exit;


//********************************************
function m_int($variable, $condition){

$test="*";
$result="condition not found";

$conditions=array("<=",">=","=>", "=<");

$variable=(float)$variable;
echo"variable equals ".$variable;?><br><?php

$test=substr($condition,0,2);
echo"test condition equals :".$test;?><br><?php

$value=(float)substr($condition,2);
echo"value equals :".$value;?><br><?php

if (in_array($test,$conditions)){

if($test==">=" || $test=="=>"){
if($variable>=$value){
$result="true";
echo"variable >= value is : ".$result;?><br><?php
}else{
$result="false";
echo"variable >= value is : ".$result;?><br><?php
}


}

if($test=="<=" || $test=="=<"){
if($variable<=$value){
$result="true";
echo"variable <= value is : ".$result;?><br><?php
}else{
$result="false";
echo"variable <= value is : ".$result;?><br><?php
}


}

}

$output=array($variable,$test,$value,$result);
return $output;

} 