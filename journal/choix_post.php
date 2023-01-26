<?php
 if(isset($_POST['choix']) AND $_POST['choix']==="choix1")
    {
    header("Location:journal_entrer.php");
    }
elseif(isset($_POST['choix']) AND $_POST['choix']==="choix2")
    {
    header("Location:journal_sortie.php");
    }
?>