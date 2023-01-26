<?php
session_start();
require_once('con_db/connexion.php');

if(isset($_POST['login']))
{
    if(empty($_POST['user']) || empty($_POST['mdp']))
    {
        header("location:index.php?erreur=Tous les champs doivent etre remplis");
    }
    else
    {
        $req=$connexion->query("SELECT * FROM utilisateur WHERE log='".$_POST['user']."' AND  mdp='".$_POST['mdp']."'");
        if($donnees=$req->fetch())
        {
            $_SESSION['utilisateur']=$_POST['user'];
            header('location:acceuil/acceuil.php');
        }
        else
        {
            header('location:index.php?invalide=utilisateur ou mot de passe incorrect!');
        }
    }
}

?>