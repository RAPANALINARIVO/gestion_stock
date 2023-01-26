<?php
include('../con_db/connexion.php');
//  RECUP USER
$heure=date('i:s');
$heur=date('H');
$heur=($heur+1).':'. $heure;
$produit=$_POST['prod'];
$quantite=$_POST['qte'];
$prix=$_POST['prix'];
$date=$_POST['dat'].' '.$heur;
$motif=$_POST['mot'];
$designation=$_POST['design'];
$categorie=$_POST['cat'];
$seuil=$quantite;
$modif=$_POST['modif'];
$req=$connexion->query("SELECT* FROM stock WHERE id_prod=".$modif);
$resultat=$req->fetch();
$qte=$resultat['quantite_prod'];
$seuil1=$resultat['seuil_prod'];
$prix1=$resultat['prix_unit_prod'];
$qte=$qte-$quantite;

$valeur=($quantite*$prix);

$requete1=$connexion->query("SELECT *FROM categorie");
while ($donnees1=$requete1->fetch()){
if($categorie==$donnees1['categorie'])
{
$id1=$donnees1['id_categorie'];
    // echo $id1;
}
}
//recuperation id_designation
$requete2=$connexion->query("SELECT *FROM designation");
while ($donnees=$requete2->fetch()){
if($designation==$donnees['designation'])
{
$id2=$donnees['id_designation'];
}
}

$requete=$connexion->prepare('UPDATE stock 
SET nom_prod= :nv_nom ,date_prod= :nv_date, quantite_prod=:qte, prix_unit_prod=:prix,valeur_prod=:val,seuil_prod=:seuil,id_designation=:id1,id_categorie=:id2,libellee=:libel WHERE id_prod= :modif');
$requete->execute(array
('nv_nom' => $produit,
'nv_date' =>$date,
'qte' => $quantite,
'prix' =>$prix,
'val' =>$valeur,
'seuil' =>$seuil,
'id1' =>$id2,
'id2' =>$id1,
'libel'=>$motif,
'modif'=>$modif));
header('Location:../mvt/entrer.php');

?>