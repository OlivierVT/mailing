<?php
session_start();
require("function/config.php");
require("function/main.func.php");
require("function/login_admin.func.php");

if($_POST){
    $admin_mail=clean_email($_POST['a_email']);
    $admin_password= clean(protect_password($_POST["a_password"]));

    if(password_verify($admin_password,is_good_password($admin_password,$connexion_db))){
        if(is_admin_exist($admin_mail,$admin_password,$connexion_db)===0){
            $not_allowed="La combinaison email et mot de passe ne correspondent pas";
            echo 'lol';
        }else{
            header("location:admin.php");
            $_SESSION['admin'];
        }
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Connexion Admin</title>
        <meta name="description" content="content">
        <?php include ("inc/inc.meta.php");?>
        <?php include ("inc/inc.linkrel.php");?>

        <link rel="stylesheet" href="src/css/app.css">
        <link rel="stylesheet" href="src/css/app.css">

        <link rel="author" href="https://plus.google.com/u/0/111250258332756169584/" content="Olivier Van Triel">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600,300' rel='stylesheet' type='text/css'>

        <!--modernizr
<script src="assets/js/vendor/modernizr-2.6.2.min.js"></script>

-->
        <!-- typekit here -->
    </head>
    <body>
    <div class="container">
    <h1 class="title">Administration</h1>

    <?php
        if(isset($not_allowed) ? "<div>".$not_allowed."</div>": '');

    ?>

    <form action="" method="post" class="form clearfix">
        <ul class="fieldset flex-container">
            <li class="field field_login-admin flex-item">
                <label for="a_email" class="field-label">votre email</label>
                <input type="a_email" name="a_email" id="a_email" class="field-input field-input_admin">
            </li>
            <li class="field field_login-admin flex-item">
                <label for="a_password" class="field-label">le mot de passe</label>
                <input type="password" name="a_password" id="a_password" class="field-input field-input_admin">
            </li>
            <li>
                 <button class="btn btn-newsletter">Se connecter</button>
            </li>

        </ul>



    </form>
    </div>

    </body>

    <!--<script src="js/jquery.js"></script>-->
    <!--<script src="js/main.js"></script>-->
</html>

