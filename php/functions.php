<?php
/**
 * Author : MackRaja
*/ 
echo "---------------Anonymous functions---------------</br>";
$message = 'hello';

// No "use"
$example = function () {
	var_dump($message);
};
$example();
echo "</br>";

// Inherit $message
$example = function () use ($message) {
	var_dump($message);
};
$example();
echo "</br>";
echo "---------------Get all functions comes in same modules---------------</br>";
echo "<pre>";
print_r(get_extension_funcs("json"));
echo "</pre>";
echo "---------------Get all loaded or compilred functions in php---------------</br>";
echo "<pre>";
print_r(get_loaded_extensions());
echo "</pre>";

$string = 'cup';
$name = 'coffee';
$str = 'This is a $string with my $name in it.';
echo $str;
eval("\$str = \"$str\";");
echo $str;

?>
