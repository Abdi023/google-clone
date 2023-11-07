<?php
ob_start();

try {
	$con = new PDO("mysql:dbname=google-clone;host=mariadb", "root", "hooyo123");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
?>
