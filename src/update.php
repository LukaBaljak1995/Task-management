<?php
	include 'Database.php';
	session_start();
	$id = $_SESSION["id"];
	$db = new Database("datatasks");
	$do = $_GET["do"];
	$db = new Database("datatasks");
    $name = $_GET["name"];
    $date = $_GET["date"];
    $item = $_GET["item"];

	switch ($do) {
		case 'insert':
		$sql = "INSERT INTO Activity VALUES ('".$_SESSION["id"]."','".$name."','".$date."','".$item."') ";

        $db->izvrsiUpit($sql);
       
        if($db->getResult()==1){
            ?>
              Task successfully added! 
            <?php
         } else {
			?>
              Task already exists!
            <?php
          }
			break;

		case 'delete':
			
		$sql = "DELETE FROM Activity WHERE email= '".$_SESSION["id"]."' AND name = '".$name."' AND date = '".$date."' AND item ='".$item."'" ;

        $db->izvrsiUpit($sql);


			break;
		
		default:
			# code...
			break;
	}


?>