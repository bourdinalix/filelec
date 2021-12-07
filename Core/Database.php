<?php 

class Database{
    
    public static function getPdo($host, $db_name, $user, $password): PDO{
        $pdo = null;
        try{
            return $pdo = new PDO("mysql:host=".$host.";dbname=".$db_name, $user, $password);
        }catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }
    }
}
