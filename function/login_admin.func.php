<?php

    function is_admin_exist($email,$password,$connexion_db){

        $a = array(
            "mail"=>$email,
            "password"=>$password
        );
        $query = "SELECT * FROM admin WHERE mail = :mail AND password = :password";

        $req = $connexion_db->prepare($query);
        $req->execute($a);

        $exist = $req->rowCount($query);
            var_dump($exist);

        var_dump($a);
        return $exist;
    }

    function is_good_password($password,$connexion_db){
        $p=array(
            "password"=>$password
        );
        $query = "SELECT admin_password WHERE password = :password";
        $req = $connexion_db->prepare($query);
        $req->execute($p);

        $correct_password = $req->rowCount($query);
        return $correct_password;
    }

?>
