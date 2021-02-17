<?php

	require_once 'functions.php';

	$db = makeConnection();
	$posts = getUsers($db);

	showUsers($posts);
?>