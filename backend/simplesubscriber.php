<?php 
require('MailingList.php');
$mail = new MailingList(
	array(
		'host'		=> 'localhost',
		'name'		=> 'test_db',
		'username'	=> 'root',
		'password'	=> ''
	),array(
		'table_name'	=> 'house'
	)
);
