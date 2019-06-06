<script type="text/javascript">
  $("#table tr").click(function(){
   //$(this).addClass('selected').siblings().removeClass('selected');    
   var date = $(this).find('td:first').html();
   var place = $(this).find('td:eq(1)').html();
   var item = $(this).find('td:eq(2)').html();
   var previous = $(this).prev();
   var previousValue = previous.find('td:first').html();
   var current = $(this);
   while(date.length<10){
    date = current.find('td:first').html();
    current=current.prev();
  } 

  var current = $(this);
   while(place.length<2){
    place = current.find('td:eq(1)').html();
    current=current.prev();
  }
  var date_array = date.split("-");

  displayActivityFormWithActivityValues(place.trim(), date_array[2].trim(), date_array[1].trim(), date_array[0].trim(), 
    item.substring(item.indexOf(">")+1,item.lastIndexOf("<")).trim()); 
});
 


 $("#tablet tr").click(function(){
  var place = $(this).find('td:first').html();
  var item =$(this).find('td:eq(1)').html();
  var today = new Date();
  var day = today.getDate();
  var month = today.getMonth()+1; 
  var year = today.getFullYear();

  var current = $(this);
   while(place.length<2){
    place = current.find('td:first').html();
    current=current.prev();
  }

  displayActivityFormWithActivityValues(place.trim(), day, month, year, 
    item.substring(item.indexOf(">")+1,item.lastIndexOf("<")).trim()); 
});


</script>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css">
<style type="text/css">
    @import url("//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc2/css/bootstrap-glyphicons.css");
    </style>
<?php
include 'Database.php';
session_start();
$id = $_GET["id"];
switch ($id) {
case 'today':
?>


<table class="table table-bordered"  id = "tablet">

  <thead>
    <tr>
      <th scope="col">Place</th>
      <th scope="col">#</th>
      <th scope="col">Activity</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    	<?php
			
			$db = new Database("datatasks");
			
			$today_sql = date('Y'). '-'.date('m').'-'.date('d');
			
	
   			 $sql = "SELECT name, item FROM Activity WHERE email = '".$_SESSION["id"]."' AND date = '". $today_sql."'"." ORDER BY name";
   			 $db -> izvrsiUpit($sql); 
         $first = 1;
         $current;
			while($red=$db->getResult()->fetch_object()){
        $i;
        if(!isset($current)){
          $i = 1;
          $current = $red->name;
           ?>
           <td> <?php echo $red->name ?> </td>
           <?php
           
        } else if($red->name!=$current){
          $current=$red->name;
          $i = 1;
          ?>
           <td> <?php echo $red->name ?> </td>
           <?php
        } else {
          ?>
           <td> </td>
           <?php
        }
		?>
          <th scope="row"> <?php echo $i; $i+=1; ?> </th>
		      <td> <a href="#" onclick="funkcija()" > <?php echo $red->item ?> </a></td>
    </tr>

    <?php }?>
</table>

<?php
break;
case 'week':
?>
  
   <table class="table table-bordered" id = "table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Place</th>
      <th scope="col">#</th>
      <th scope="col">Activity</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
      $i = 1;
      $db = new Database("datatasks");
      
      $today_sql = date('Y'). '-'.date('m').'-'.date('d');
      
      $week_from_today_sql =date('Y', strtotime("+7 days")) . '-'. date('m', strtotime("+7 days")) . '-'. date('d', strtotime("+7 days"));
  
         $sql = "SELECT date, name, item FROM Activity WHERE email = '" .$_SESSION["id"]."' AND date between '". $today_sql."'"." and ". "'".$week_from_today_sql."'". " ORDER BY date, name";
         $db -> izvrsiUpit($sql); 
      $current_date;
      $curent_place;
      
      while($red=$db->getResult()->fetch_object()){
         $i;
        if(!isset($current_date) && !isset($current_place)){
          $i = 1;
          $current_date=$red->date;
          $current_place = $red->name;
           ?>
           <td> <?php echo $red->date ?> </td>
           <td> <?php echo $red->name ?> </td>
           <?php
           
        } else if($red->date==$current_date && $red->name!=$current_place){
          $current_place=$red->name;
          $i = 1;
          ?>
          <td> </td>
           <td> <?php echo $red->name ?> </td>
           <?php
        } else if($red->date!=$current_date){
          $i = 1;
          $current_place=$red->name;
          $current_date=$red->date;
          ?>
           <td> <?php echo $red->date ?> </td>
            <td> <?php echo $red->name ?> </td>
           <?php
        } else {
          ?>
          <td> </td>
           <td> </td>
           <?php
        }
    ?>
          <th scope="row"> <?php echo $i; $i+=1; ?> </th>
          <td> <a href="#" onclick="funkcija()"><?php echo $red->item ?> </a></td>
    </tr>

    <?php }?>
</table>
<?php
   break; 

   case 'month':
     ?>

<table class="table table-bordered" id = "table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Place</th>
      <th scope="col">#</th>
      <th scope="col">Activity</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
      $i = 1;
      $db = new Database("datatasks");
      
      $today_sql = date('Y'). '-'.date('m').'-'.date('d');
      $month_from_today_sql =date('Y', strtotime("+30 days")) . '-'. date('m', strtotime("+30 days")) . '-'. date('d', strtotime("+30 days"));
  
         $sql = "SELECT date, name, item FROM Activity WHERE email = '" .$_SESSION["id"]."' AND date between '". $today_sql."'"." and ". "'".$month_from_today_sql."'". " ORDER BY date, name";
                
         $db -> izvrsiUpit($sql); 
     $current_date;
      $curent_place;
      
      while($red=$db->getResult()->fetch_object()){
         $i;
        if(!isset($current_date) && !isset($current_place)){
          $i = 1;
          $current_date=$red->date;
          $current_place = $red->name;
           ?>
           <td> <?php echo $red->date ?> </td>
           <td> <?php echo $red->name ?> </td>
           <?php
           
        } else if($red->date==$current_date && $red->name!=$current_place){
          $current_place=$red->name;
          $i = 1;
          ?>
          <td> </td>
           <td> <?php echo $red->name ?> </td>
           <?php
        } else if($red->date!=$current_date){
          $i = 1;
          $current_place=$red->name;
          $current_date=$red->date;
          ?>
           <td> <?php echo $red->date ?> </td>
            <td> <?php echo $red->name ?> </td>
           <?php
        } else {
          ?>
          <td> </td>
           <td> </td>
           <?php
        }
    ?>
          <th scope="row"> <?php echo $i; $i+=1; ?> </th>
          <td> <a href="#" onclick="funkcija()"><?php echo $red->item ?> </a> </td>
    </tr>

    <?php }?>
</table>
<?php



     break;
     default: 
     break;
   }
  ?>

<div id="demo"></div>
<script type="text/javascript" src="jquery-1.10.2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
