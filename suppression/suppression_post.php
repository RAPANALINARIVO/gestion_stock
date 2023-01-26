<?php
include('../con_db/connexion.php');
$supp=$_POST['supp'];
if(isset($supp))
{
    $req1=$connexion->prepare('DELETE FROM stock WHERE id_prod=:supp');
    $req2=$connexion->prepare('DELETE FROM categorie  WHERE categorie=:supp');
    $req3=$connexion->prepare('DELETE FROM designation  WHERE designation=:supp');
        $req1->execute(array 
        ('supp' => $supp));
        $req2->execute(array 
        ('supp' => $supp));
        $req3->execute(array 
        ('supp' => $supp));
}
header('location: ../mvt/entrer.php');
?>