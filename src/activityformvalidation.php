<?php
include 'Database.php';

session_start();
if(isset($_SESSION["id"]))
  echo $_SESSION["id"];

//$id = $_SESSION["id"];
$id = "luxybaxy@gmail.com";

if(isset($_POST["activity-submit"])){
	echo "Yayy nigga";
}

$db = new Database("datatasks");
$name = $_POST["name"];
$day = $_POST["day"];
$month = $_POST["month"];
$year = $_POST["year"];
$item = $_POST["item"];

$sql = "INSERT INTO Activity VALUES ('".$id."','".$name."','".$year."-".$month."-".$day."','".$item."') ";

$db->izvrsiUpit($sql);
$db->getResult();


?>