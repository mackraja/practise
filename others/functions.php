<?php

echo "---------------Anonymous functions---------------</br>";
$message = 'hello';

// No "use"
$example = function ($raja) {
	var_dump($message);
	echo $raja."Raja";
};
$example("Mack");
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
echo $str."<br/>";
eval("\$newstr = \"$str\";");
echo $newstr."</br>";

echo "---------------Convert Decial to Binary---------------</br>";
for ($i=0; $i < 20; $i++) { 
	echo decbin($i);
	echo "</br>";
}
?>