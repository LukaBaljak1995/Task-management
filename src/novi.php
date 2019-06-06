<?php
session_start();
if(isset($_SESSION["id"])){
  unset($_SESSION["id"]);
} else {
    unset($_SESSION["id"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tasks</title>


    <link rel="icon" type="" href="img/tasks.png">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/style.min.css" rel="stylesheet">

    <!-- Custom Fonts -->


    <link href="fontaw/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">

    
</head>

<body style="background-image: url(img/notes.png) !important;">

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading"> 
                    
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#login-form" class="active" id="login-form-link">Uloguj se</a> 
                               
                            </div>
                            <div class="col-xs-6">
                           
                                <a href="#register-form" id="register-form-link">Registracija</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" method="post" role="form" action="loginobrada.php" style="display: block;">
                                    <div class="form-group">
                                        <input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="" minlength="5" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="login_password" tabindex="2" class="form-control" placeholder="Šifra" maxlength="16" required>
                                    </div>
                                   
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In" data-toggle="modal" data-target="#myModal">
                                               
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                    

                                <form id="register-form"  method="post" action="loginobrada.php" role="form" style="display: none;">
                                    <div class="form-group">
                                        <input type="name" name="name" id="name" tabindex="1" class="form-control" placeholder="Ime" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="surname" name="surname" id="surname" tabindex="1" class="form-control" placeholder="Prezime" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="register_password" tabindex="2" class="form-control" placeholder="Šifra" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Potvrdi šifru" onkeyup="validate_eqity()" required>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                            <button type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now" " >Pošalji</button>                                             
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
        
    function validate_eqity(){
        var pass = document.getElementById("register_password").value;
        var c_pass = document.getElementById("confirm-password").value;

        //alert(pass+" "+c_pass)
        if(pass==c_pass){
            document.getElementById("confirm-password").style.background="#80ffd4";
            document.getElementById("confirm-password").style.color="black";
            var content = document.createTextNode("Pasword confirmed!");
            document.getElementById("confirm-password").appendChild(content);
            //document.getElementById("confirm-password")innerHTML += "Pasword confirmed!";
        } else {
            document.getElementById("confirm-password").style.color="red";
            document.getElementById("confirm-password").style.background="white";
        }
    }

    </script>

   <script type="text/javascript">$(function() {

    $('#login-form-link').click(function(e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
    $('#register-form-link').click(function(e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });

});
</script>


</body>

</html>
<?php

?>