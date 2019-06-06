<?php
session_start();
if(isset($_SESSION["id"])){
  //echo $_SESSION["id"];
  include "Database.php";
    $db = new Database("datatasks");
    $sql = "SELECT email, namesurname, password FROM User where email = " . "'" . $_SESSION["id"]. "'";
    $db -> izvrsiUpit($sql);
    $red=$db->getResult()->fetch_object();
}
else {
    header("novi.php");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Tasks</title>
    <link rel="icon" type="" href="img/tasks.png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
<body>

<nav class="navbar navbar-inverse" style="background-color: #e6e6e6">
      <div class="container-fluid"  >
        <div class="navbar-header" >
          <a class="navbar-brand" href="pocetna.php">
           Tasks
          </a>
        </div>
         <ul class="nav navbar-nav navbar-right">
        <li><a href="profil.php"> <?php  echo $red->namesurname; ?></a></li>
        <li><a href = "novi.php" >Sign out</a></li>
      </ul>
      </div>
    </nav>

<div class="container" >
  <div class="row">
    <div class="col"></div>
    <div class="col">
      <table class="table">
  <tbody>
    <tr>
      <th scope="row">Name</th>
      <td> <?php echo  $red->email; ?>   </td>
    </tr>
    <tr>
      <th scope="row">Name</th>
      <td> <div contenteditable> <?php echo explode(" ", $red->namesurname)[0];  ?>   </div></td>
    </tr>
    <tr>
      <th scope="row">Surname</th>
      <td> <?php echo explode(" ", $red->namesurname)[1]; ?>  </td>
    </tr>
    <tr>
      <th scope="row"> Password </th>
      <td>
        <?php
        $l = strlen($red->password);
        $i =1;
        while ( $i<= $l) {
          echo "*";
          $i++;
        }
        ?>

      </td>
    </tr>
  </tbody>
</table>

<a href="edit.php">Edit</a> <br>
<a href="novi.php">Sign out</a>
    </div>
    <div class="col"></div>
  </div>

</div>


    <!-- Optional JavaScript -->

<script type="text/javascript" src="jquery-1.10.2.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>


