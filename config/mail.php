<?php
return [
	'driver' => 'smtp',
	'host' => 'smtp.gmail.com',
	'port' => 465,
	'from' => array('address' => 'jeri.chen0110@gmail.com', 'name' => 'JeriLaravel'),
	'encryption' => 'ssl',
	'username' => 'jeri.chen0110@gmail.com',
	'password' => 'xxxxxxx',
	'sendmail' => '/usr/sbin/sendmail -bs',
	'pretend' => false,
];
