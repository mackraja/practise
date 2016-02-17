<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
   $counter = 0;
   $first =2; $second = 4; $third = 1; $four = 2; $five = 3;
   $common_fields = '<td>
            <select>
              <option selected>Mr.</option>
              <option>Ms</option>
              <option>Mrs</option>
              <option>Mstr</option>
            </select>
        </td>
        <td>
            <input type="text" class="" placeholder="Family Name">
        </td>
        <td>
            <input type="text" class="" placeholder="First Name">
        </td>';
?>

<table border="1">
    <tr>
        <td>No</td>
        <td>Room Type</td>
        <td>Room Grade</td>
        <td>Gender</td>
        <td>Family Name</td>
        <td>First Name</td>
    </tr>   	
        <?php 
            if($first){
                for ($i=1; $i <= ($first*1); $i++) { 
                    $counter ++;                   
                    echo "<tr><td>$counter</td><td>First</td><td>First Standard</td>$common_fields</tr>";  
                }
            }

            if($second){
                for ($i=1; $i <= ($second*2); $i++) {
                    if($i%2) {$counter++;}
                    $roomtype = ($i%2) ? 'Second' : '';
                    $room = ($i%2) ? 'Second Standard' : '';
                    $no = (!empty($roomtype)) ? $counter : '';
                    echo "<tr><td>$no</td><td>$roomtype</td><td>$room</td>$common_fields</tr>";  
                }
            }

            if($third){
                for ($i=1; $i <= ($third*3); $i++) {
                    if(($i-1)%3 ==0) {$counter++;}
                    $roomtype = (($i-1)%3 ==0) ? 'Third' : '';
                    $room = (($i-1)%3 ==0) ? 'Third Standard' : ''; 
                    $no = (!empty($roomtype)) ? $counter : '';
                    echo "<tr><td>$no</td><td>$roomtype</td><td>$room</td>$common_fields</tr>";
                }
            }

            if($four){
                for ($i=1; $i <= ($four*4); $i++) {
                    if(($i-1)%4 ==0) {$counter++;}
                    $roomtype = (($i-1)%4 ==0) ? 'Four' : '';
                    $room = (($i-1)%4 ==0) ? 'Four Standard' : '';
                    $no = (!empty($roomtype)) ? $counter : '';
                    echo "<tr><td>$no</td><td>$roomtype</td><td>$room</td>$common_fields</tr>";  
                }
            }

            if($five){
                for ($i=1; $i <= ($five*5); $i++) {                    
                    if(($i-1)%5 ==0) {$counter++;}
                    $roomtype = (($i-1)%5 ==0) ? 'Five' : '';
                    $room = (($i-1)%5 ==0) ? 'Five Standard' : '';
                    $no = (!empty($roomtype)) ? $counter : '';
                    echo "<tr><td>$no</td><td>$roomtype</td><td>$room</td>$common_fields</tr>";    
                }
            }
        ?>
</table>
</body>
</html>