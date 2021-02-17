<?php

	require_once 'functions.php';

	$db = makeConnection();
	$user = registerUser(
		$db,
		$_REQUEST['firstName'],
		$_REQUEST['lastName'],
		$_REQUEST['userName'],
		$_REQUEST['password']
	);
	$user = getUsers($db);

	showUsers($user);
?>