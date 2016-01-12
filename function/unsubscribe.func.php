<?php

    //le lien dans l'email va déclencher la fonction.
    //cette fonction va comparer l'adresse email à celle déja présente dans la DB
    // si les deux adresse correspondent alors on lance une fonction comportant une requête SQL
//Dans cette requête on fait un drop de la ligne correspondant à l'user lié à son email.

    function unsubscribe_user($mail,$connexion_db){
        $u = array(
            "mail"=>"récuperer l'email de l'individu"

        );

        $query = "DELETE FROM users WHERE mail = :mail";
        $req = $connexion_db->prepare($query);
        $req->execute($u);

        $exist = $req->rowCount($query);

    }

?>
