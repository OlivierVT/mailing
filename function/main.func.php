<?php
function clean($value){
    return trim(strip_tags(htmlspecialchars($value)));
}
function clean_email($mail){
    return filter_var($mail,FILTER_VALIDATE_EMAIL);
}

function protect_password($password){
    return password_hash($password,PASSWORD_BCRYPT);
}

function is_mail_duplicate($email,$connexion_db){
    $e = array(
        "mail"=>$email
    );

    $query = "SELECT user_mail FROM users WHERE user_mail = (:mail)";
    $req = $connexion_db->prepare($query);
    $req->execute($e);

    $avaiable = $req->rowCount($query);
    return $avaiable;
}

function add_mail($email,$connexion_db){
    $add_mail = array(
    'mail'=>$email
    );

    $query = "INSERT INTO users (user_mail, registration_date) VALUE (:mail, NOW() )";
    $req = $connexion_db->prepare($query);
    return $req->execute($add_mail);
}

function key_mail($mail,$cle,$connexion_db){
    $k = array(
        "cle"=>$cle,
        "mail"=>$mail
    );
    $query="UPDATE users SET mail_key=:cle WHERE mail LIKE :mail";
    $req = $connexion_db->prepare($query);
    $req->execute($k);

}

?>
