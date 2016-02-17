<?php
// Disable a WebKit security feature
// which would prevent from showing the source code.
header('X-XSS-Protection: 0');

if (isset($_GET['source']) || isset($_POST['source'])) {
        $source = file_get_contents(__FILE__);

        // To prevent this control from showing up
        // in the output source code
        // enable the code below.
        /*
        $lines_to_remove = 26;
        $source = explode("\n", $source, $lines_to_remove);
        $source = $source[$lines_to_remove - 1];
        */
        $source = highlight_string($source, true);
        echo $source;
        return;
}
?>
Current time:

<?php


$time=time();
$actual_time=date('H:i:s',$time);
echo $actual_time;

//show user input
$enter=@$_POST['enter'];
echo '<br>Input: '.$enter;

?>

<form action="" method="POST">
    <input type="text" name="enter">
    <input type="submit" value="Refresh">
</form>