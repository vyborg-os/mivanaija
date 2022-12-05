<?php
	//Set DB variables
	$host		=	'localhost';
	$user		=	'mivanxno_mivanxno';
	$password	=	'Wakeup200$$';
	$db_name	=	'mivanxno_mivanaija';

	//Start Connection
	$mysqli = new mysqli($host, $user, $password, $db_name);
	//Check for Connection Error
	if ($mysqli->connect_error) {
		die("Connection to server was not established <br>".$mysqli->connect_error);
	}

