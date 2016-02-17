<?php
echo "<----------Duplicate array---------><br>";
$array = array('apple', 'orange', 'pear', 'banana', 'apple',
   'pear', 'kiwi', 'kiwi', 'kiwi');

function get_duplicates( $array ) {
    return array_unique( array_diff_assoc( $array, array_unique( $array ) ) );
}

$new_array = array();
foreach ($array as $key => $value) {
    if(isset($new_array[$value]))
    	$new_array[$value] += 1;
    else
    	$new_array[$value] = 1;
}
echo "<pre>";
print_r($array);
print_r(array_count_values($array));
print_r(get_duplicates($array));
print_r($new_array);
echo "</pre>";

echo "<----------Duplicate String---------><br><br>";
echo $str = 'one,two,one,five,seven,bag,tea';
echo "<br>";
echo $str = implode(',',array_unique(explode(',', $str)));
echo "<br><br>";
echo count_chars("abbbaaacccdeeedddfff",3);
echo "<br><br>";
echo $data = "Two Ts and one F.";
echo "<br>";
foreach (count_chars($data, 1) as $i => $val) {
   echo "There were $val instance(s) of \"" , chr($i) , "\" in the string.<br>";
}
echo "<br>";
echo "<----------Break Continue---------><br><br>";
for ($i=0; $i <= 10; $i++) {
	if($i == 5)
		break;
	echo $i;
}

function folderSize($dir){
$count_size = 0;
$count = 0;
$dir_array = scandir($dir);
  foreach($dir_array as $key=>$filename){
    if($filename!=".." && $filename!="."){
       if(is_dir($dir."/".$filename)){
          $new_foldersize = foldersize($dir."/".$filename);
          $count_size = $count_size+ $new_foldersize;
        }else if(is_file($dir."/".$filename)){
          $count_size = $count_size + filesize($dir."/".$filename);
          $count++;
        }
   }
 }
return $count_size;
}
echo "<br><br>";
echo shell_exec("du -h " . getcwd());
// echo $folder_name = getcwd();
// echo folderSize($folder_name);

$servername = "localhost";
$username = "root";
$password = "bohemia";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM test123.posts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
    		$mack[] = $row;     
     }
}

$sql1 = "SELECT * FROM portal.abouts";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
     // output data of each row
     while($row1 = $result1->fetch_assoc()) {
    		$mack1[] = $row1;     
     }
}
echo "<pre>";
print_r($mack);
print_r($mack1);
echo "</pre>";
$conn->close();

echo "<br>";
echo "<----------Static Variable---------><br><br>";

class M {
    static $a = 5;
    function setA($value) {
      self::$a = $value; 
    }
    function getA() { 
      return self::$a; 
    }
    function foo(){
      return "statically";
    }
}
Class K extends M {
    static $a = 10;
    function getA() { 
      return self::$a; 
    }
}

$m = new M();
$k = new K();

echo $m->getA();
echo "<br>";

$k->setA(25);
echo $m->getA();
echo "<br>";

echo $k->getA();
echo "<br>";

echo M::foo();