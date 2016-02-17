<?php
// $file_name = 'template.html';
// $file_Arr = array('./components',
// 				'./components/template.html',
// 				'./components/template2.html',
// 				'./components/side/template.html',
// 				'./components/side/template2.html',
// 				'./components/side/second/template.html',
// 				'./components/side/second/template2.html',
// 				'./components/side/second/third/template.html',
// 				'./components/side/second/third/template2.html');

// $file_Arr = scandir(".");
// foreach ($file_Arr as $dirValues) {
// 	$basename = basename($dirValues);
// 	// echo "<br><br><br><br>";
// 	if(is_file($basename)){
// 		echo $dirValues;
// 		echo "<br>";	
// 	}
	
// 	// if(basename($dirValues) == $file_name){
// 	// 	echo $file_ArrKey = array_keys($dirValues);		
// 	// }
// }

function dirToArray($dir,$file_name) {
   $result = array();
   $cdir = scandir($dir);
   foreach ($cdir as $key => $value)
   {
      if (!in_array($value,array(".","..")))
      {
         if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
         {
            $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value,$file_name);
         }
         else
         {
         	if($value == $file_name){
         		$result[] = $value;	
         	}
         }
      }
   }
   return $result;
}

define('ROOT', dirname(__FILE__));
$file_name = 'template.html';
$tree = dirToArray(ROOT,$file_name);
echo "<pre>".print_r($tree,1)."</pre>";


$dir = 'components';
function getFiles($dir, &$results = array(), $filename = 'template.html'){
    $files = scandir($dir);
    foreach($files as $key => $value){
        $path = realpath($dir.'/'.$value);
        if(!is_dir($path)) {
        	if($value == $filename)        	
        		$results[] = $path;        	
        } else if($value != "." && $value != "..") {
            getFiles($path, $results);
        }
    }
    return $results;
}
echo '<pre>'.print_r(getFiles($dir), 1).'</pre>';