<?php
define("DB_SERVER","localhost" );
define("DB_USER","root");
define("DB_PASSWORD", "");
define("DB_NAME", "hundar");
        
        $dbh = new PDO('mysql:dbname='.DB_NAME.';host='.DB_SERVER.';charset=utf8',DB_USER, DB_PASSWORD); 
        
        $sql = "SELECT * FROM katter";
        
        $stmt = $dbh->prepare($dbh);
        $stmt->execute();
        
        $katter = $stmt->fetchAll();
        
?>

