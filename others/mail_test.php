<?php
$to      = 'monty.khanna@affilired.com';
$subject = 'Test Mail';
$message = 'hello how are you ?';
$headers = 'From: monty.khanna@affilired.com' . "\r\n" .
    'Reply-To: monty.khanna@affilired.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message, $headers)){
	echo "Mail send";
}else{
	echo "Not send";
}

echo "Now here";
?>
