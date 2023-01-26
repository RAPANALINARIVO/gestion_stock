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
$seuil=$_POST['seuil'];
$modif=$_POST['modif'];
$req=$connexion->query("SELECT* FROM stock WHERE id_prod=".$modif);
$resultat=$req->fetch();
$qte=$resultat['quantite_prod'];
$seuil1=$resultat['seuil_prod'];
$prix1=$resultat['prix_unit_prod'];

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

if($quantite<=$qte)
{
    if ($qte!="")
   	{
  	$quant1=($qte-$quantite);
    $valeur=($quant1*$prix1);
    $valeur1=($quantite*$prix1);
 	if ($quant1<0)
  	{$quant1=0;}
$requete=$connexion->prepare('UPDATE stock 
SET nom_prod= :nv_nom ,date_prod= :nv_date, quantite_prod=:qte, prix_unit_prod=:prix,valeur_prod=:val,seuil_prod=:seuil,id_designation=:id1,id_categorie=:id2,libellee=:libel WHERE id_prod= :modif');
$requete->execute(array
('nv_nom' => $produit,
'nv_date' =>$date,
'qte' => $quant1,
'prix' =>$prix1,
'val' =>$valeur,
'seuil' =>$seuil,
'id1' =>$id2,
'id2' =>$id1,
'libel'=>$motif,
'modif'=>$modif));
$requete=$connexion->prepare('INSERT INTO journal_sortie(date_prod,nom_prod,quantite_prod,prix_unit_prod,valeur_prod,id_categorie,id_designation,libellee,seuil_prod)
VALUES(:dat,:prod,:qte,:prix,:val,:id_cat,:id_design,:libel,:seuil)');
$requete->execute( array
('dat' => $date,
'prod' => $produit,
'qte' =>$quantite,
'prix' => $prix1,
'val' => $valeur1,
'id_cat' => $id2,
'id_design' => $id1,
'libel' => $motif,
'seuil'=>$seuil1
));
?>
<script>alert('operations effectuer');</script>
<?php
header('Location:../mvt/entrer.php');
}
else{
    echo "Vous voulez en prelever $quantite mais il ne vous en reste que $qte, cette operation a donc etait annulée";
}
}
?>