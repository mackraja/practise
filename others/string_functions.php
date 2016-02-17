<?php

/**********************************************************************************
 **************** addslashes() and stripslashes() *********************************
 **********************************************************************************/
echo '</br><strong>Add and Strip Slashes</strong>:</br></br>';
echo 'String : '.$str = "Is your name O'Reilly?</br>";
echo 'Add Slashes : '.$add_str = addslashes($str); // Outputs: Is your name O\'Reilly?
echo 'Remove Slashes : '.stripslashes($add_str); // Outputs : Is your name O'Reilly?

/**********************************************************************************
 **************** chop or rtrim, ltrim, trim **************************************
 **********************************************************************************/
echo '</br><strong>chop or rtrim, ltrim, trim</strong>:</br></br>';
echo $strhow = strlen("hello how are you")."</br>"; // Outputs : 17
$chopstr =  chop("hello how are you   "); 
echo strlen($chopstr)."</br>"; // Outputs : 17

/**********************************************************************************
 **************** str_split, wordwap **********************************************
 **********************************************************************************/
echo '</br><strong>str_split, wordwap</strong>:</br></br>';
$str1 = "Hello Friend How Are You?";
$arr2 = str_split($str1, 3);
echo "<pre>".print_r($arr2,1)."</pre>";
echo wordwrap($str1, 5, "</br>").'</br>';

/**********************************************************************************
 **************** Number_Format ***************************************************
 **********************************************************************************/
echo '</br><strong>Number Format</strong>:</br></br>';
$number = 1234.56;
// english notation (default)
echo $english_format_number = number_format($number).'</br>';
// 1,235
// French notation
echo $nombre_format_francais = number_format($number, 2, ',', ' ').'</br></br>';
// 1 234,56
echo $number = 1234.5678.'</br>';
// english notation without thousands separator
echo $english_format_number = number_format($number, 2, '.', '').'</br>';
// 1234.57

/**********************************************************************************
 **************** htmlentities, html_entity_decode ********************************
 **********************************************************************************/
echo '</br><strong>htmlentities, html_entity_decode</strong>:</br></br>';
$orig = "I'll \"walk\" the <b>dog</b> now";
$a = htmlentities($orig);
$b = html_entity_decode($a);
echo $a.'</br>'; // I'll &quot;walk&quot; the &lt;b&gt;dog&lt;/b&gt; now
echo $b.'</br>'; // I'll "walk" the <b>dog</b> now

/**********************************************************************************
 **************** str_pad, str_repeat *********************************************
 **********************************************************************************/ 
echo '</br><strong>str_pad, str_repeat</strong>:</br></br>';
$input = "Alien";
echo str_pad($input, 10).'</br>';                      // produces "Alien     "
echo str_pad($input, 10, "-=", STR_PAD_LEFT).'</br>';  // produces "-=-=-Alien"
echo str_pad($input, 10, "_", STR_PAD_BOTH).'</br>';   // produces "__Alien___"
echo str_pad($input,  6, "KK").'</br>';               // produces "Alien_"
echo str_pad($input,  3, "*").'</br>';                 // produces "Alien"

echo str_repeat(" * ", 10);

/**********************************************************************************
 **************** str_replace *****************************************************
 **********************************************************************************/  
echo '</br><strong>str_replace</strong>:</br></br>';
// Provides: Hll Wrld f PHP
$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
echo "<pre>".print_r($vowels,1)."</pre>";
echo $subject = "Hello World of PHP";
echo '</br>';
echo str_replace($vowels, "", $subject, $count).'</br>';
echo $count.'</br>';

/**********************************************************************************
 **************** shuffle, str_shuffle, rand, array_rand **************************
 **********************************************************************************/  
echo '</br><strong>shuffle, str_shuffle, rand, array_rand</strong>:</br></br>';
$numbers = range(1, 20);
echo "<pre>".print_r($numbers,1)."</pre>";
shuffle($numbers);
echo "<pre>".print_r($numbers,1)."</pre>";

echo $str = 'abcdef';
echo '</br>';
$shuffled = str_shuffle($str);
// This will echo something like: bfdaec
echo $shuffled.'</br></br>';

echo rand().'</br>';
echo rand(5, 15).'</br>';

$input = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
echo "<pre>".print_r($input,1)."</pre>";
$rand_keys = array_rand($input, 2);
echo $input[$rand_keys[0]].'</br>';
echo $input[$rand_keys[1]].'</br>';

$var1 = "Hello";
$var2 = "hello";
if (strcasecmp($var1, $var2) == 0) {
    echo '$var1 is not equal to $var2 in a case sensitive string comparison';
}