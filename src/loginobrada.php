<?php

include 'Database.php';

if(isset($_POST["login-submit"])){
	

	$email = $_POST["email"];
	$password = $_POST["password"];
	$db = new Database ("datatasks"); 
	$sql = "SELECT * FROM User WHERE email ='".$email."' AND password='".$password."'"; 
    $db->izvrsiUpit($sql); 
   	echo $db->getResult()->num_rows;
    if($db->getResult()->num_rows==1){
    	session_start();
    	$_SESSION["id"]=$email;
		header('Location: pocetna.php');
    } else {
    	header('Location: novi.php');
    }
}

if(isset($_POST["register-submit"])){
	$name = $_POST["name"];
	$surname = $_POST["surname"];
	$email = $_POST["email"];
	$password = $_POST["confirm-password"];
	$db = new Database ("datatasks"); 
	$sql = "SELECT * FROM User WHERE email ='".$email."' "; 
    $db->izvrsiUpit($sql); 
   	//onda vec postoji u bazi
    if($db->getResult()->num_rows==1){
		//header('Location: novi.php');
    } else {
		$sql = "INSERT INTO  User VALUES ('".$email."', '".$name." ".$surname."' ,'".$password."')"; 
   		$db->izvrsiUpit($sql); 
   		session_start();
   		$_SESSION["id"]=$email;
    	header('Location: pocetna.php');
    }

}



?>