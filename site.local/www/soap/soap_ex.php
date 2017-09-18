<?php
$client = new SoapClient("sms.wsdl");
var_dump ($client->__getFunctions());
?>