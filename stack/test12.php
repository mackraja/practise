<?php
// $date_1 =  strtotime("2016-01-11");
// $date_2 = strtotime("2018-01-11");
// $datediff = $date_2 - $date_1;
// echo floor($datediff/(60*60*24));

// $start = new DateTime('2016-01-11');
// $end = new DateTime('2018-01-11');
// $days = $start->diff($end, true)->days;
// echo intval($days / 1);
// $sundays = intval($days / 1) + ($start->format('N') + $days % 1 >= 1);

// echo $sundays;

$date_1 = $from = strtotime('2016-01-11');
$date_2 = strtotime('2018-01-11');
$days = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
$count = 0;
while ($date_1 < $date_2) {
  if(date('l', $date_1) == $days[0]);
  {
  	$count++;	
  }
  $date_1 += 7 * 24 * 3600;
}
echo "From : ".date('Y-m-d',$from)."  To : ".date('Y-m-d',$date_2)."  has $count  $days[0]";


$old = range(0,10);
$order = array(3=>4,6=>1,7=>9);

function match($old,$order){
    foreach ($old as $k => $v){
        if(array_key_exists($k, $order)){
        	$new[] = "-------> $order[$k]";
        }else{
            $new[] = $v;
        }
    }
    return $new;
}
echo "<pre>";
print_r($old);
print_r($order);
print_r(match($old,$order));



$array=array(0=>0,1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9);
$r=array(4=>2,5=>4,3=>6);
print_r($array);
print_r($r);
echo "<br>";
$count=count($array);
foreach($r as $key =>$val){
$a=$array[$key];
$keyu = array_search($val, $array);
$array[$keyu]=$a;
$array[$key]=$val;
}
print_r($array);


$size = $_POST['size'];
$category = $_POST['category'];

if(isset($size)){
  $size = "AND size = $size";
}
if(isset($category)){
  $category = "AND category = $category";
}

$query = "SELECT * FROM images WHERE true $size $category";

if(isset($_POST['size'])){
  $size = $_POST['size'];
  $gs = $db->query("SELECT * FROM images WHERE size = '$size'");
  while($images = $gs->fetch(PDO::FETCH_ASSOC)){
    //I store the images here
  }
}






?>