<?php
    $myfile = fopen("test1.php", "r") or die("Unable to open file!");
    echo '<pre>'.htmlspecialchars(fread($myfile,filesize("test1.php"))).'</pre>';
    fclose($myfile);
?>