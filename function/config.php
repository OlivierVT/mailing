<?php
    ini_set('display_errors', 1);
    date_default_timezone_set('Europe/Brussels');

    $db_host = "localhost";
    $db_name = "mailing_list";
    $db_user = "root";
    $db_password = "root";


    try{
        $dsn = "mysql:host=$db_host;dbname=$db_name;chartset=utf8";
        $connexion_db = new PDO($dsn, $db_user, $db_password);      

    }catch(\PDOException $e){
        $e -> getMessage();
    }

    function is_logged(){
        if(isset($_SESSION)){
            if(isset($_SESSION['admin'])){
                if($_SESSION['admin'] === 1){
                    $_SESSION['admin'] = 0;
                }else{
                    $_SESSION['admin'] = 1;
                }
            }
        }
    return;
    }

?>
