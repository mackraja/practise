<?
function user_data1($user_id) {
    $data = array();
    $user_id = (int) $user_id;

    $func_num_args = func_num_args();
    $func_get_args = func_get_args();

    if($func_num_args > 1){
        unset($func_get_args[0]);
        $fields ='`' . implode('`,`',$func_get_args) . '`';
    } else {
        $fields = ' * ';
    }
    echo $sql = "SELECT $fields FROM `users` WHERE `user_id`= $user_id ";
    // $query = mysql_query($sql) or die(mysql_error());
    // $data = mysql_fetch_assoc ($query);

    // return $data;
}
user_data1(5,'name','email');
echo "<br>";

function user_data2($user_id,$fields){
    $data = array();
    $user_id = (int)$user_id;

    // $func_num_args = func_num_args();
    $func_get_args = func_get_args();

    if($func_get_args > 1){
        unset($func_get_args[0]);

        $fields =' ` ' . implode('` , `',$fields) . '`';
        echo $myquery= "SELECT $fields FROM `users` WHERE `user_id`= $user_id ";
        // $query = mysql_query($myquery) or die(mysql_error());
        // $data = mysql_fetch_assoc ($query);
        // print_r($data);
        // die();
        // return $data;
    }
}

user_data2(5,array('username','email','age'));


function user_data($user_id,$fields=array('*')){
        $data = array();
        $fields = implode(', ',$fields);
        echo $query1 = "SELECT {$fields} FROM users WHERE user_id= {$user_id}";
        // $query = mysql_query($query1) or die(mysql_error());
        // $data = mysql_fetch_assoc ($query);
        // return $data;        
    }
    user_data(5);
    user_data(5,array('username','email'));