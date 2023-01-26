<?php
include('connexion.php');
$mdp=$_POST['mdp'];
$mail=$_POST['mail'];
if(isset($mail) AND $mdp=="TALEVA" AND $mail!=="")
{
   header('Location:acceuil/acceuil.php');
}
else
{
   header('Location:index.php');
}
?>