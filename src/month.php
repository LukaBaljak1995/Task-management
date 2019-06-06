<?php
include 'Database.php';

$id;
//session_start();
if(isset($_SESSION["id"])){
  echo $_SESSION["id"];
	$id=$_SESSION["id"];
}


?>
<html lang="en">
  <head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script type="text/javascript">
    $(document).ready(function () {
      $("#kombo_drzave").change(function(){
      var vrednost = $("#dropdown-menu").val();
      $.get("prikazidrzavu.php", { id: vrednost },
         function(data){
           $("#popuni").html(data);
         });
      });
      });
    </script>

  </head>

<table class="table table-bordered" >
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">#</th>
      
      <th scope="col">Place</th>
      <th scope="col">Activity</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    	<?php
			$i = 1;
			$db = new Database("datatasks");
			
			$today_sql = date('Y'). '-'.date('m').'-'.date('d');
			echo "<br>".$today_sql;
      $week_from_today_sql =date('Y', strtotime("+7 days")) . '-'. date('m', strtotime("+7 days")) . '-'. date('m', strtotime("+30 days"));
	
   			 $sql = "SELECT date, name, item FROM Activity WHERE email = " . '"luxybaxy@gmail.com" AND date between'. "'". $today_sql."'".' and '. "'". 
                $week_from_today_sql."'".' ORDER BY date, name';
   			 $db -> izvrsiUpit($sql); 
      $current = date('Y/m/d');
      $ind = 0;
			while($red=$db->getResult()->fetch_object()){
        
        while(explode("/",$current)[2]!=explode("-",$red->date)[2]){
         $current = date('Y/m/d', strtotime("+1 days"));
          $i = 1;
          $ind = 0;
        }
        if($ind==0){
          ?>
        <td> <?php echo $current ;  $ind = 1;?> </td>
       
        <?php
        } else {
          ?>
          <td>  </td>
           <?php
        }
		?>
		      <th scope="row"> <?php echo $i; $i+=1; ?> </th>
		      <td> <?php echo $red->name ?> </td>
		      <td> <?php echo $red->item ?> </td>
    </tr>

    <?php }?>
</table>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
