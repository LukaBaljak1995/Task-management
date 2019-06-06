<!doctype html>
<?php
include_once 'Database.php';

session_start();
        if(isset($_SESSION["id"])){
           // echo $_SESSION["id"];
          $db = new Database ("datatasks"); 
          $sql = "SELECT nameSurname FROM User WHERE email ='".$_SESSION["id"]."'"; 
          $db->izvrsiUpit($sql); 
          $row = $db->getResult()->fetch_object();
          $profile = $row->nameSurname;
       } else {
          header("novi.php");
        }
?>

<html lang="en">
  <head>
    <title>Tasks!</title>
    <link rel="icon" type="" href="img/tasks.png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="css/style.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css">
    <style type="text/css">
    @import url("//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc2/css/bootstrap-glyphicons.css");
    </style>


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
        <li><a href="profil.php"> <?php  echo $profile; ?></a></li>
        <li><a href = "novi.php" >Sign out</a></li>
      </ul>
      </div>
    </nav>
<div class="container">
  <div class="row">
<div class="col-sm-8">
 


    <div class="dropdown" style="margin-top: 20px">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Choose type of display
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    
    <a class="dropdown-item"  href="#" onclick ="display('today')">Today</a>
    <a class="dropdown-item" href="#" onclick="display('week')">Next week</a>
    <a class="dropdown-item" href="#" onclick="display('month')">Next month</a>
   
  </div>
  	<a href="#" class="btn btn-info btn-lg" data-content="Add new activity!" data-toggle="popover" data-trigger="hover" onclick="displayActivityForm()" >
          <span class="glyphicon glyphicon-plus" onclick="displayActivityForm()"></span>
        </a>

</div>
<p><div id="popuni"><b>  </b></div></p>
</div>

 <div class="col-sm-4" id="activity_form" style="display:none; margin-top: 30px " on>
  <form id="form"  method="post" role="form" action="">
                                    <div class="form-group">
                                      <label for="name">Place</label>
                                      <input type="name" name="name" id="name" tabindex="1" class="form-control" placeholder="Where the task needs to be done..." value="" required>
                                    </div>
                                    When?
                                    <div class="form-row">
                                      
                                      <div class="form-group col-md-4">
                                        <label for="inputEmail4"></label>
                                        <input type="text" class="form-control" name = "day" id="day" placeholder="Day">
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label for="inputEmail4" >  </label>
                                        <input type="text" class="form-control" name = "month" id="month" placeholder="Month">
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label for="inputPassword4">   </label>
                                        <input type="text" class="form-control" name = "year" id="year" placeholder="Year">
                                      </div>
                                    </div>
                           
                                            
                                    <div class="form-group">
                                       <label for="name">Activity</label>
                                        <input type="surname" name="item" id="item" tabindex="1" class="form-control" placeholder="What needs to be done..." value="" required>
                                    </div>


                                    <div class="form-group">
                                        
                                            <div class="col-sm-6 col-sm-offset-3">
                                            <button  name="activity-submit" id="add" tabindex="4" class="form-control btn btn-register"  style="display:none" onclick="add_activity()">Add activity!</button>                                             
                                            </div>
                                            <div class="col-sm-6 col-sm-offset-3">
                                            <button type="submit" name="activity-alter" id="alter" tabindex="4" class="form-control btn btn-register" class="btn btn-default" style="display: none" onclick="alter_activity()">Alter activity!</button>   
                                            <button type="submit" name="activity-alter" id="delete" tabindex="4" class="form-control btn btn-register" class="btn btn-default" onclick="alter_database('delete')" >Delete activity!</button>                                           
                                            </div>
                                        
                                    </div>
                                </form>
</div>

<div id="work"></div>

</div>
</div>
    <!-- Optional JavaScript -->
    <script type="text/javascript">
      var x_name, x_date, x_item;

      function validate_equality(){
        $("#work").html(x_name+" "+x_item+" "+x_date);
        var name = document.getElementById('name').value;
        var day =  document.getElementById('day').value;
        var month = document.getElementById('month').value;
        var year  = document.getElementById('year').value;
        var value =  document.getElementById('item').value;
        var date = year+"-"+month+"-"+day;
        if(x_name!=name || x_date!=date || x_item!=item){
            $("#alter").show();
            $("#delete").hide();
            return;
        }
        $("#alter").hide();
        $("#delete").show();

      }

      function display(display_type){
        $.get("today.php", { id: display_type },
         function(data){
          $("#popuni").html(data);
         });
      }

      function displayActivityForm(){
        $("#alter").hide();
          $("#activity_form").show();
          document.getElementById('name').value="";
          document.getElementById('item').value="";
          document.getElementById('day').value="";
          document.getElementById('month').value="";
          document.getElementById('year').value="";
          $("#add").show();
          $("#alter").hide();
          $("#delete").hide();
      }

      function displayActivityFormWithActivityValues(name,day,month,year,item){
       $("#add").hide();
        $("#activity_form").show();
          document.getElementById('name').value=name;
          document.getElementById('day').value=day;
          document.getElementById('month').value=month;
          document.getElementById('year').value=year;
          document.getElementById('item').value=item;
          $("#alter").show();
           $("#delete").show();
          x_name=name;
          x_date=year+"-"+month+"-"+day;
          x_item=item;
      }

      function add_activity(){
        alter_database('insert');
      }

      function alter_activity(){
        alter_database("delete");
        alter_database("insert");
      }

      function alter_database(operation){
        if(operation=="delete"){
        $.get("update.php", { do: operation, name:x_name, date:x_date, item: x_item },
         function(data){
          });
      } else {
         $.get("update.php", { do: operation, name:document.getElementById('name').value, 
            date:document.getElementById('year').value+'-'+document.getElementById('month').value+'-'+document.getElementById('day').value, item: document.getElementById('item').value },
         function(data){
          $("#my_alert").show();
          $("#my_alert").text(data);
          });
         
      }
      display("week");
      }

    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="jquery-1.10.2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>