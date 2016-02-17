<?php

$string = '<?xml version="1.0" encoding="UTF-8"?>
<request
    xmlns:domain="http://www.eurodns.com/domain"
    xmlns:nameserver="http://www.eurodns.com/nameserver"
    xmlns:contact="http://www.eurodns.com/contact">

    <domain:transfer>
        <domain:name>#DOMAIN.TLD#</domain:name>
        <domain:authcode>#AUTHCODE#</domain:authcode>
    </domain:transfer>

#NAMESERVERS#

#CONTACTS#

</request>';


$test = '<![CDATA[$2$3$4$19!193.7$=L-xyDgE]]>';
$test = addcslashes($test,'$');
$output = preg_replace("/\#AUTHCODE\#/",$test,$string);

echo $output;

exit;