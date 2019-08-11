<!DOCTYPE html>
<html>
	<head>
		<title>Setting up database</title>
	</head>
<body>
	<h3>Setting up...</h3>
<?php
	require_once 'functions.php';
	
	createTable('users',
		'name VARCHAR(15),
		user_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		password VARCHAR(20),
		credit INT UNSIGNED DEFAULT 10000,
		
		
