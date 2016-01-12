<?php
    require("function/config.php");
    require("function/main.func.php");

    function do_not_exist($email,$db_connexion){
        $e=array(
            "email"=>$email
        );
        $query = "SELECT user_mail FROM users WHERE email = :email";
        $req= $db_connexion->prepare($query);
        $req->execute($e);

        $exist = $req->rowCount($query);
    }

?>
