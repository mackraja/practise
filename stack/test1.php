<?php
$time=time();
$actual_time=date('H:i:s',$time);
echo $actual_time;

$enter=@$_POST['enter'];
if (isset($enter)) {
	$doc = new DOMDocument();
	@$doc->loadHTML($enter);
	$tags = $doc->getElementsByTagName('iframe');
	foreach ($tags as $tag) {
	       $file_name = $tag->getAttribute('src');
	}
	if(isset($file_name)){
		$result ='<iframe src='.$file_name.'></iframe>';		
	}else{
		$result = $enter;	
	}
}
echo '<br>Input: '.$result;
?>
<form action="" method="POST">
    <input type="text" name="enter">
    <input type="submit" value="Refresh">
</form>