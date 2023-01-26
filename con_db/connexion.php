<?php
try
    {
        $connexion=new PDO('mysql:host=localhost;dbname=gestion_stock','root','',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
catch(exception $e)
    {
        die('erreur:' .$e->getMessage());
    }
?>