<?php 
require('MailingList.php');
$mail = new MailingList(
	array(
		'host'		=> 'localhost',
		'name'		=> 'test_db',
		'username'	=> 'root',
		'password'	=> ''
	)
);

$mail->setTableName('Openup');
$mail->setTimezone('Arctic/Longyearbyen');
$mail->init();
