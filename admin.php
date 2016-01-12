<?php
session_start();
require("function/config.php");
require("function/main.func.php");

if(isset($_POST["add_mail"])){

    $new_email = clean_email($_POST['add_mail']);

    if(do_not_exist($new_email,$db_connexion)==1){
        $email_added="L'email à bien été ajouté à la liste";
    }else{
        $email_not_added="L'email saisis comporte une erreur";
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>title</title>
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

    <h1 class="title title_admin">Administration</h1>

    <nav class="admin_navigation">
        <ul class="nav_list clearfix">
            <li class="nav_list--elements"><a href="function/logout.func.php" class="link">se déconnecter</a></li>
            <li class="nav_list--elements"><a href="" class="link">Envoyer une newsletter à toute la liste</a></li>
        </ul>
    </nav>

    <h2 class="secundary_title">Ajouter un utilisateur</h2>
    <form action="" method="post" class="form form_admin clearfix">
        <ul class="fieldset fieldset_admin flex-container">

            <li class="field field_admin flex-item">
                <label for="email" class="field-label">l'email</label>
                <input type="email" name="add_email" id="add_email" class="field-input">
            </li>
            <li>
                <button class="btn btn-newsletter" name="add_mail">ajouter à la liste</button>
            </li>

        </ul>
    </form>

    <div class="result_container">
       <h2 class="secundary_title admin_title">Liste des emails enregistrés</h2>
        <ul class="result_list">
            <li class="result_list--elements"><a href="#" class="link_result">exemple d'une adresse@email.com</a></li>
            <li class="result_list--elements"><a href="#" class="link_result">exemple d'une adresse@email.com</a></li>
            <li class="result_list--elements"><a href="#" class="link_result">exemple d'une adresse@email.com</a></li>
            <li class="result_list--elements"><a href="#" class="link_result">exemple d'une adresse@email.com</a></li>
            <li class="result_list--elements"><a href="#" class="link_result">exemple d'une adresse@email.com</a></li>
            <li class="result_list--elements"><a href="#" class="link_result">exemple d'une adresse@email.com</a></li>
        </ul>
    </div>

<!--    <div class="confirm-added"><p>utilisateur ajouté à la liste</p></div>-->
    </div>

    </body>

    <!--<script src="js/jquery.js"></script>-->
    <!--<script src="js/main.js"></script>-->
</html>

