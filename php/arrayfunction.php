<?php

/**********************************************************************************
 ****************************** Array Map *****************************************
 **********************************************************************************/
function cube($n) {
	return ($n * $n * $n);
}

$a = range(0, 10);
$b = array_map('cube', $a);

echo '<strong>Array Map</strong></br>';
echo '<pre>';
print_r($b);
echo '</pre>';
echo str_repeat('-', 100) . '</br>';
$input = array('red', 'green', 'blue', 'yellow');

/**********************************************************************************
 ****************** Array Splice :- Insert into array at specific location ********
 **********************************************************************************/

echo '<strong>Array Splice</strong>: Insert into array at specific location.</br>';
array_splice($input, 3, 0, 'purple');
 // 3 = insert at postion 3, // start from 0, // inserted value "purple"
echo '<pre>';
print_r($input);
echo '</pre>';
echo str_repeat('-', 100) . '</br>';

$input = array('a', 'b', 'c', 'd', 'e');
$output = array_slice($input, 2);
 // returns "c", "d", and "e"
$output = array_slice($input, -2, 1);
 // returns "d"
$output = array_slice($input, 0, 3);
 // returns "a", "b", and "c"


// note the differences in the array keys
/**********************************************************************************
 **************** Array Slice :- Slice(fetch) array at specific location **********
 **********************************************************************************/

echo '<strong>Array Slice</strong>: Slice(fetch) array at specific location.</br>';
echo '<pre>';
print_r($input);
print_r(array_slice($input, 2, -1));
 // 2 = start from array, -1 = end to array
print_r(array_slice($input, 2, -1, true));
echo '</pre>';
echo str_repeat('-', 100) . '</br>';


/**********************************************************************************
 **************** array_chunk — Split an array into chunks ************************
 **********************************************************************************/
echo '<strong>Array Chunk</strong>: Split an array into chunks.</br>';
echo '<pre>';
print_r(array_chunk($input, 2));
print_r(array_chunk($input, 2, true));
echo '</pre>';
echo str_repeat('-', 100) . '</br>';

/**********************************************************************************
 array_combine — Creates an array by using one array for keys and another for its values
 **********************************************************************************/

echo '<strong>Array Combine</strong>: Creates an array by using one array for keys and another for its values.</br>';
echo '<pre>';
$a = array('green', 'red', 'yellow');
$b = array('avocado', 'apple', 'banana');
$c = array_combine($a, $b);
print_r($c);
echo '</pre>';
echo str_repeat('-', 100) . '</br>';

/**********************************************************************************
 array_diff_assoc — Computes the difference of arrays with additional index check 
 **********************************************************************************/

echo '<strong>Array Diff Assoc</strong>: Computes the difference of arrays with additional index check.</br>';
echo '<pre>';
$array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
$array2 = array("a" => "green", "yellow", "red");
print_r(array_diff_assoc($array1, $array2));

$array1 = array(0, 1, 2);
$array2 = array("00", "01", "2");
print_r(array_diff_assoc($array1, $array2));
echo '</pre>';
echo str_repeat('-', 100) . '</br>';

/**********************************************************************************
 **************** array_fill — Fill an array with values **************************
 **********************************************************************************/

echo '<strong>Array Fill</strong>: Fill an array with values.</br>';
echo '<pre>';
print_r(array_fill(5, 6, 'banana'));
print_r(array_fill(-2, 4, 'pear'));
echo '</pre>';
echo str_repeat('-', 100) . '</br>';

/**********************************************************************************
 ******** array_filter — Filters elements of an array using a callback function ***
 **********************************************************************************/

echo '<strong>Array Filter</strong>: Filters elements of an array using a callback function.</br>';
echo '<pre>';
function odd($var)
{
    // returns whether the input integer is odd
    return($var & 1);
}
function even($var)
{
    // returns whether the input integer is even
    return(!($var & 1));
}
$array1 = array("a"=>1, "b"=>2, "c"=>3, "d"=>4, "e"=>5);
$array2 = array(6, 7, 8, 9, 10, 11, 12);
echo "Odd :\n";
print_r(array_filter($array1, "odd"));
echo "Even:\n";
print_r(array_filter($array2, "even"));
echo '</pre>';
echo str_repeat('-', 100) . '</br>';

/**********************************************************************************
 ***** array_flip — Exchanges all keys with their associated values in an array ***
 **********************************************************************************/

echo '<strong>Array Flip</strong>: Exchanges all keys with their associated values in an array.</br>';
echo '<pre>';
$input = array("oranges", "apples", "pears");
print_r(array_flip($input));
echo '</pre>';
echo str_repeat('-', 100) . '</br>';


/**********************************************************************************
 ***** array_intersect — Computes the intersection of arrays ***
 **********************************************************************************/

echo '<strong>Array Intersect</strong>: Computes the intersection of arrays.</br>';
echo '<pre>';
$array1 = array("a" => "green", "red", "blue");
$array2 = array("b" => "green", "yellow", "red");
print_r(array_intersect($array1, $array2));
$array1 = array(2, 4, 6, 8, 10, 12);
$array2 = array(1, 2, 3, 4, 5, 6);
print_r(array_intersect($array1, $array2));
echo '</pre>';
echo str_repeat('-', 100) . '</br>';

/**********************************************************************************
 ***** array_map — Applies the callback to the elements of the given arrays *******
 **********************************************************************************/

echo '<strong>Array Map</strong>: Applies the callback to the elements of the given arrays.</br>';
echo '<pre>';
function custom($n)
{
	return($n * $n * $n);
}
$a = array(1, 2, 3, 4, 5);
print_r(array_map("custom", $a));
/**********************************************************************************/
$func = function($value) {
	return $value * 2;
};
print_r(array_map($func, range(1, 5)));
echo '</pre>';
echo str_repeat('-', 100) . '</br>';

/**********************************************************************************
 ***** array_multisort — Sort multiple or multi-dimensional arrays ****************
 **********************************************************************************/

echo '<strong>Array Multisort</strong>: Sort multiple or multi-dimensional arrays.</br>';
echo '<pre>';
$array = array('Alpha', 'atomic', 'Beta', 'bank');
$array_lowercase = array_map('strtolower', $array);
array_multisort($array_lowercase, SORT_ASC, SORT_STRING, $array);
print_r($array);
/**********************************************************************************/
$a1=array(1,30,15,7,25);
$a2=array(4,30,20,41,66);
$num=array_merge($a1,$a2);
array_multisort($num,SORT_DESC,SORT_NUMERIC);
print_r($num);
echo '</pre>';
echo str_repeat('-', 100) . '</br>';

/**********************************************************************************
 ***** array_pad — Pad array to the specified length with a value *****************
 **********************************************************************************/

echo '<strong>Array Pad</strong>: Pad array to the specified length with a value.</br>';
echo '<pre>';
$input = array(12, 10, 9);
print_r(array_pad($input, 5, 0));
print_r(array_pad($input, -7, -1));
echo '</pre>';
echo str_repeat('-', 100) . '</br>';

/**********************************************************************************
 ********* array_pop — Pop the element off the end of array ***********************
 **********************************************************************************/

echo '<strong>Array Pop</strong>: Pop the element off the end of array.</br>';
echo '<pre>';
$stack = array("orange", "banana", "apple", "raspberry");
$fruit = array_pop($stack);
print_r($stack);
echo '</pre>';
echo str_repeat('-', 100) . '</br>';

/**********************************************************************************
 ********* array_push — Push one or more elements onto the end of array ***********
 **********************************************************************************/

echo '<strong>Array Push</strong>: Push one or more elements onto the end of array.</br>';
echo '<pre>';
$stack = array("orange", "banana");
array_push($stack, "apple", "raspberry");
print_r($stack);
echo '</pre>';
echo str_repeat('-', 100) . '</br>';

/**********************************************************************************
 ******** array_product — Calculate the product of values in an array *************
 **********************************************************************************/

echo '<strong>Array Product</strong>: Calculate the product(multiply) of values in an array.</br>';
echo '<pre>';
$a = array(2, 4, 6, 8);
print_r($a);
echo "product(a) = " . array_product($a) . "\n";
echo '</pre>';
echo str_repeat('-', 100) . '</br>';

/**********************************************************************************
 array_reduce — Iteratively reduce the array to a single value using a callback function
 **********************************************************************************/

echo '<strong>Array Reduce</strong>: Iteratively reduce the array to a single value using a callback function.</br>';
echo '<pre>';
function sum($carry, $item)
{
	$carry += $item;
	return $carry;
}
function multiplication($carry, $item)
{
	$carry *= $item;
	return $carry;
}
$a = array(1, 2, 3, 4, 5);
print_r($a);
var_dump(array_reduce($a, "sum")); // int(15)
var_dump(array_reduce($a, "multiplication", 10)); // int(1200), because: 10*1*2*3*4*5
echo '</pre>';
echo str_repeat('-', 100) . '</br>';

/**********************************************************************************
 ********* array_shift — Shift an element off the beginning of array **************
 **********************************************************************************/

echo '<strong>Array Shift</strong>: Shift an element off the beginning of array.</br>';
echo '<pre>';
$stack = array("orange", "banana", "apple", "raspberry");
print_r($stack);
$fruit = array_shift($stack);
print_r($stack);
echo '</pre>';
echo str_repeat('-', 100) . '</br>';

/**********************************************************************************
 ***** array_unshift — Prepend one or more elements to the beginning of an array **
 **********************************************************************************/

echo '<strong>Array Unshift</strong>: Prepend one or more elements to the beginning of an array.</br>';
echo '<pre>';
$queue = array("orange", "banana");
print_r($queue);
array_unshift($queue, "apple", "raspberry");
print_r($queue);
echo '</pre>';
echo str_repeat('-', 100) . '</br>';

/**********************************************************************************
 ***** array_walk — Apply a user supplied function to every member of an array ****
 **********************************************************************************/

echo '<strong>Array Walk</strong>: Apply a user supplied function to every member of an array.</br>';
echo '<pre>';
$fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");
function test_alter(&$item1, $key, $prefix)
{
	$item1 = "$prefix: $item1";
}
function test_print($item2, $key)
{
	echo "$key. $item2<br />\n";
}
echo "Before :- \n";
array_walk($fruits, 'test_print');
array_walk($fruits, 'test_alter', 'fruit');
echo "After :- \n";
array_walk($fruits, 'test_print');
/**********************************************************************************/
function enumerate( &$item1, $key, &$startNum ) {
	$item1 = $startNum++ ." $item1";
}
$num = 1;
$fruits = array( "lemon", "orange", "banana", "apple");
print_r($fruits);
array_walk($fruits, 'enumerate', $num );
print_r( $fruits );
echo '$num is: '. $num ."\n";
echo '</pre>';

