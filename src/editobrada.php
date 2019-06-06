<?php
	session_start();
	$email = $_SESSION["id"];
	$password = $_POST["confirm-password"];
	$name = $_POST["name"];
	$surname = $_POST["surname"];
	$nameSurname = $name." ".$surname;
	include 'Database.php';
	$db = new Database("datatasks");
	$sql = "UPDATE User SET nameSurname = '" .$nameSurname."', password='".$password."' WHERE email = '" .$email."'";
	echo $sql;
	$db->izvrsiUpit($sql); 
	header("Location: profil.php");
?>