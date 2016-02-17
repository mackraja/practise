<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simple Time Interval Page Element Refresh using JQuery and a sprinkle of Ajax</title>
<?php
include 'js/CustomJquery.inc';
?>
</head>
<body>
<div class="refresh">This will get Refreshed in 5 Seconds</div>
<?php
$jquery->set_script("js/jquery-1.2.6.min.js");
$jquery->set_script("js/jquery.timers-1.0.0.js");

$jquery->set_windowReady(<<<MOK
	
	var j = jQuery.noConflict();
	j(".refresh").everyTime(5000,function(i){
		j.ajax({
			url: "refresh.php",
			cache: false,
			success: function(html){
				j(".refresh").html(html);
			}
		})
	})
	
	j('.refresh').css({color:"green"});
MOK
);
?>
<?=$jquery->get_scripts();?>
<script type="text/javascript">
    $(document).ready(function(){
        <?= $jquery->get_windowReady(); ?>
    })
    $(window).load(function(){
        <?= $jquery->get_windowLoad(); ?>
    })
</script>
</body>
</html>
