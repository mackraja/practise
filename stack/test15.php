<?php
// echo $one = "12.07.2016 - ".date("d.m.Y", strtotime("12.07.2016"));
// echo "</br>";
// echo $two = "12.07.16 - ".date("d.m.Y", strtotime("16-07-12"));

// echo implode(',', array_map("intval", json_decode('{"0":"7","1":"12","2":"14","3":"13"}', true)));
?>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>   
</head>
<body>
<?php
echo "<pre>",print_r($_POST,1),"</pre>";
?>
    <form action="" method="post">
    <select class="form-control" name="cols[]" multiple="multiple" id="cols[]" required="required">
      <option value="latest_upd">Latest Update</option>
      <option value="status">Status</option>
      <option value="spin">SPIN</option>
      <option value="file_location">File location</option>
      <option value="upl_webgis">uploaded to webgis</option>
      <option value="rem_upl">Remarks on upload</option>
    </select>

    <input type="checkbox" name="countries[]" /> USA<br />
	<input type="checkbox" name="countries[]" /> Canada<br />
	<input type="checkbox" name="countries[]" /> Japan<br />
	<input type="checkbox" name="countries[]" /> China<br />
	<input type="checkbox" name="countries[]" /> France<br />

    <input type="submit">
    </form>

    <div id="ball" class="dd">

    <script type="text/javascript">
    $(document).on('submit',function() {
    	var result = '';
	  $('select[name="cols[]"]').find('option:selected').each(function() {
	     result = $('select[name="cols[]"]').val();
	  });
	  alert(result);
	});

	$('input:checkbox').change(function() {
    	var limit = 2;
    	if($("[type='checkbox']:checked").length > limit)
    	{
			alert("You can only select a maximum of "+limit+" checkboxes")
			this.checked=false;
		}
	});

    var ab = document.getElementById('ball').hasAttribute('class');
	if ($('div').attr('class') != undefined){
		// alert('YES');
	}
    alert(b);
    </script>



</body>
</html>

<?php
$a = 0;
if($a == 'monty' && $a == 'anil'){
	echo 'Mackraja';
}else{
	echo "Nothing";
}
	echo "</br></br></br>";
 	var_dump("00005ab" == 5); // true
 	  echo "</br>";
 	var_dump("abc" == 0); // true
 	  echo "</br>";
 	var_dump("ab2" == 2); // false
 	  echo "</br>";
 	var_dump("2ab" == 2); // true
 	  echo "</br>";

 	$ab = (float) 122.3434 + (int) 2;
 	var_dump($ab);
 	  echo "</br>";

 	// int + int = int
 	// string + string = string
 	// // float + float = double
 	
 	// int + string = int  	
 	// float + string = double
 	// int + float = double
 	
    $key = 2;
    if($key == '2abc' && $key == 'abc2'){
    	echo 'Mackraja 123';
    }else{
    	echo "Nothing 123";
    }
      echo "</br>";
    var_dump("10" == "1e1"); // 10 == 10 -> true
    echo "</br>";
    var_dump(100 == "1e2"); // 100 == 100 -> true
    echo "</br></br></br></br></br>";

    // echo exec('whoami');
    // echo system('ls', $retval);


// for ($j=0; $j < 2; $j++) {    			
//    			if($j == 1){
//    				$re[$i][] = $i + 1 ;
//    			}else{
// 				$re[$i][] = $i;
//    			}
//    		}


    $q = array (     
	    			'2016-02-01 12:00' ,
	    			'2016-02-01 12:10' ,    
	    			'2016-02-01 12:20' ,    
	    			'2016-02-01 12:30' ,   
	    			'2016-02-01 12:40' ,    
	    			'2016-02-01 12:50' ,   
	    			'2016-02-01 13:00' ,    
	    			'2016-02-01 13:10' ,   
	    			'2016-02-01 13:20' ,    
	    			'2016-02-01 13:30' ,    
	    			'2016-02-01 13:40'  ,    
	    			'2016-02-01 13:50' ,    
	    			'2016-02-01 14:00' ,    
	    			'2016-02-01 14:10' ,    
	    			'2016-02-01 14:20' ,    
	    			'2016-02-01 14:30' ,    
	    			'2016-02-01 14:40' ,    
	    			'2016-02-01 14:50' ,    
	    			'2016-02-01 15:00' ,    
	    			'2016-02-01 15:10' ,    
	    			'2016-02-01 15:20' ,    
	    			'2016-02-01 15:30' ,    
	    			'2016-02-01 15:40' ,    
	    			'2016-02-01 15:50' ,    
	    			'2016-02-01 16:00' ,    
	    			'2016-02-01 16:10' ,    
	    			'2016-02-01 16:20' ,    
	    			'2016-02-01 16:30' ,    
	    			'2016-02-01 16:40' ,    
	    			'2016-02-01 16:50' ,    
	    			'2016-02-01 17:00'  
    			);
    $qc = count($q);
    $re = array();
   	for ($i=0; $i < $qc; $i++) { 
   		 for ($j=0; $j < 2; $j++) {    			
   			if($j == 1){
   				$re[$i][] = $q[$i + 1] ;
   			}else{
				$re[$i][] = $q[$i];
   			}
   		}
   	}
echo "<pre>".print_r($q,1)."</pre>";
echo "<pre>".print_r($re,1)."</pre>";
"
set @n:= '2016-02-01 12:00:00';
select *, (select @n:= @n + interval 10 MINUTE) n
from tbl_student_log limit 60 


CALL generate_series_date_minute('2016-02-01 12:00:00', '2016-02-01 17:00:00', 10);
SELECT s.series AS timeslice
FROM series_tmp AS s, tbl_student_log AS t 
GROUP BY s.series";

$_POST = array('image'=>'','blog_title'=>'yes','blog_description'=>'nothing');
foreach ($_POST as $key => $value) {
	if(!empty($value)){
		$fields .= $key.',';
		$values .= "'".$value."'".',';
	}
}
$fields = substr($fields, 0, -1);
$values = substr($values, 0, -1);
echo "INSERT INTO blogs($fields)values($values)";
?>