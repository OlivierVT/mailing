<?php
require("function/config.php");
require("function/main.func.php");

if($_POST){

    $email = clean_email($_POST['email']);

    if(is_mail_duplicate($email,$connexion_db)===1){
        $error_mail = "Vous êtes déja inscrit à la newsletter";
    }else if (empty($email)){
        $empty_input = "Vous n'avez entré aucune adresse email";
    }else{
        add_mail($email,$connexion_db);

        $cle= md5(microtime(TRUE)*100000);
        key_mail($email,$cle,$connexion_db);

        $destinataire = $email;
        $sujet = "Activer votre compte" ;
        $entete = "From: inscription@newsletter.com" ;
        $message = 'Pour activer votre compte, veuillez cliquer sur le lien ci dessous
    ou copier/coller dans votre navigateur internet.
    http://votresite.com/activation.php?log='.urlencode($email).'&cle='.urlencode($cle).'

    ---------------
    Ceci est un mail automatique, Merci de ne pas y répondre. <a href="function/unsubscribe.func.php">Ne plus recevoir la newsletter</a>';


    mail($destinataire,$sujet,$message,$entete);


//    mail($destinataire, $sujet, $message, $entete) ; // Envoi du mail
//    var_dump($result);

    $valid_mail="Votre inscription est enregistrée";
       // key_mail($email,$cle,$connexion_db);
    }



}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>title</title>
        <?php include ("inc/inc.meta.php");?>
        <?php include ("inc/inc.linkrel.php");?>

        <link rel="stylesheet" href="src/css/app.css">
        <link rel="stylesheet" href="src/css/app.css">

        <!--modernizr
<script src="assets/js/vendor/modernizr-2.6.2.min.js"></script>

-->
        <!-- typekit here -->
    </head>
    <body>
    <div class="container">
    <h1 class="title">Inscription à la newsletter</h1>
    <?php
        if(isset($valid_mail)){
            echo '<div class="response valid_email">'.$valid_mail.'</div>';
        }else if(isset($error_mail)){
            echo '<div class="response error_email">'.$error_mail.'</div>';
        }else if(isset($empty_input)){
            echo '<div class="response error_email">'.$empty_input.'</div>';
        }else{
            echo '';
        }
//        echo '<div class="valid_email">'.(isset($valid_mail) ? $valid_mail : ''.'</div>');
    ?>



    <form action="" method="post" class="form clearfix">
        <ul class="fieldset flex-container">
            <li class="field flex-item">
                <label for="email" class="field-label">votre email</label>
                <input type="email" name="email" id="email" class="field-input">
            </li>

            <li>
                <button class="btn btn-newsletter">S'inscrire à la newsletter</button>

            </li>

        </ul>


    </form>
    </div>

    </body>

    <!--<script src="js/jquery.js"></script>-->
    <!--<script src="js/main.js"></script>-->
</html>

