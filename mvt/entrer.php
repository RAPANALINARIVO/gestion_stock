            <?php include('../navbar/nav.php')?>                
                </table>
            </div>
            <div class="col-lg-11 px-5">
                <!-- Button trigger modal -->
                <button id="btn1" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ajout">
                <img src="../dist/bootstrap-icons/plus-lg.svg" alt="signe-plus"> Ajouter</button>
                <!-- debut modal-->
                <div class="modal fade" id="ajout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl ">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajout d'un produit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <form action="entrer.php" method="post">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="prod">Produit :</label>
                                            <input type="text" id="prod" name="prod" class="form-control" > 
                                        </div>
                                        <div class="form-group">
                                            <label for="qte">Quantite :</label>
                                            <input type="number" min="0" id="qte" name="qte" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="prix">Prix :</label>
                                            <input type="number" min="0" id="prix" name="prix" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="design"> Designation :</label>
                                            <select name="design" id="design" class="form-control">
                                                <option></option>
                                                    <?php
                                                    include('../con_db/connexion.php');
                                                    $requete=$connexion->query('SELECT*FROM designation');
                                                    while($donnees=$requete->fetch())
                                                    {?>
                                                        
                                                        <option value="<?php echo $donnees['designation']?>"><?php echo $donnees['designation']?></option>
                                                    <?php
                                                    }
                                                    ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="cat">categorie :</label>
                                            <select class="form-control" name="cat" id="cat">
                                                <option ></option>
                                            <?php
                                                include('../con_db/connexion.php');
                                                $requete=$connexion->query('SELECT*FROM categorie');
                                                while($donnees=$requete->fetch())
                                                {?>
                                                    <option value="<?php echo $donnees['categorie']?>"><?php echo $donnees['categorie']?></option>
                                            <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="dat">Date :</label>
                                            <input type="date" id="dat" name="dat" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="mot">Motif(s) :</label>
                                            <textarea name="mot" id="" cols="30" rows="5" class="form-control block-help sr-only"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><img src="../dist/bootstrap-icons/x-circle.svg" alt=""> Annuler</button>
                                        <button type="submit" name="valider" class="btn btn-success"><img src="../dist/bootstrap-icons/save.svg" alt="">  Enregistrer</button>
                                    </div>
                        </form>
                    </div>
                </div>
            </div>
           
        <?php
            if(isset($_POST['valider']))
            {

                        ?>
                        
                        <!-- debut php -->
                        <?php
                        //connexion
                        include('../con_db/connexion.php');
                        function calcul($quantite,$prix)
                        {
                        $resultat=($quantite*$prix);
                        return $resultat;
                        }
                        //recuperation 
                        $heure=date('i:s');
                        $heur=date('H');
                        $heur=($heur+1).':'. $heure;
                        $produit=$_POST['prod'];
                        $quantite=$_POST['qte'];
                        $prix=$_POST['prix'];
                        $valeur=calcul($quantite,$prix);
                        $date=$_POST['dat'].' '.$heur;
                        $motif=$_POST['mot'];
                        $designation=$_POST['design'];
                        $categorie=$_POST['cat'];
                        $seuil=$quantite;
                        //creation de fonction pour calculer les valeurs des produits

                        //recuperation id_categorie
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
                        // nom prod from table stock 
                        $prod=0;
                        $quantite1=0;
                        $prix1=0;
                        $req=$connexion->query("SELECT * FROM stock WHERE nom_prod LIKE '$produit' ");
                        $donnees=$req->fetch(PDO::FETCH_OBJ);
                        
                        
                        //insertion de donnnees
                    if(isset($produit) AND isset($quantite) AND  isset($prix) AND  isset($date) AND isset($motif) AND isset($designation))
                    {
                        if($produit!=="" AND $prix!=="" AND $quantite!=="" AND $date!=="" AND $motif!=="" AND $designation!=="" AND $categorie!=="")
                        {
                            if(empty($donnees -> nom_prod))
                            {
                            $requete=$connexion->prepare('INSERT INTO stock (date_prod,nom_prod,quantite_prod,prix_unit_prod,valeur_prod,id_categorie,id_designation,libellee,seuil_prod)
                                                        VALUES(:dat,:prod,:qte,:prix,:val,:id_cat,:id_design,:libel,:seuil)');
                            $requete->execute( array
                            ('dat' => $date,
                            'prod' => $produit,
                            'qte' =>$quantite,
                            'prix' => $prix,
                            'val' => $valeur,
                            'id_cat' => $id1,
                            'id_design' => $id2,
                            'libel' => $motif,
                            'seuil'=>$seuil
                            ));
                            $requete=$connexion->prepare('INSERT INTO journal_entrer(date_prod,nom_prod,quantite_prod,prix_unit_prod,valeur_prod,id_categorie,id_designation,libellee,seuil_prod)
                            VALUES(:dat,:prod,:qte,:prix,:val,:id_cat,:id_design,:libel,:seuil)');
                            $requete->execute( array
                            ('dat' => $date,
                            'prod' => $produit,
                            'qte' =>$quantite,
                            'prix' => $prix,
                            'val' => $valeur,
                            'id_cat' => $id1,
                            'id_design' => $id2,
                            'libel' => $motif,
                            'seuil'=>$seuil
                            ));
                            
                        }
                            else{
                                $quantite1=($donnees -> quantite_prod)+$quantite;
                                $prix1=($donnees -> prix_unit_prod)+$prix;
                                $valeur1=calcul($quantite1,$prix1);
                                $req=$connexion->prepare('UPDATE stock SET quantite_prod= :nv_qte,prix_unit_prod=:nv_prix,valeur_prod=:nv_val WHERE nom_prod=:nv_prod');
                                $req->execute(array(
                                    'nv_qte' => $quantite1,
                                    'nv_prix' => $prix1,
                                    'nv_val' => $valeur1,
                                    'nv_prod' => $produit
                                ));
                                $req=$connexion->prepare('UPDATE journal_entrer SET quantite_prod= :nv_qte,prix_unit_prod=:nv_prix,valeur_prod=:nv_val WHERE nom_prod=:nv_prod');
                                $req->execute(array(
                                    'nv_qte' => $quantite1,
                                    'nv_prix' => $prix1,
                                    'nv_val' => $valeur1,
                                    'nv_prod' => $produit
                                ));
                            }
                        }   
                    }
            }
            ?>
            <center><h5 class="title">LISTE DES PRODUITS APPROVISIONNES</h5></center>
                        <table class="table bg-dark text-center text-light text-capitalize">
                        <thead>
                        <th>id</th>
                        <th>produits</th>
                        <th>designation</th>
                        <th>categorie</th>
                        <th>quantite</th>
                        <th>seuil</th>
                        <th>prix_u</th>
                        <th>montant</th>
                        <th>date_entrer</th>
                        <th>motifs</th>
                        <th>operations</th>
                        </thead>
                        <tbody>
                        <?php
                        include('../con_db/connexion.php');
                        $req=$connexion->query('SELECT stock.id_prod,stock.date_prod,stock.nom_prod,stock.quantite_prod,stock.prix_unit_prod,stock.valeur_prod ,stock.libellee,stock.seuil_prod,categorie.categorie,designation.designation
                        FROM stock INNER JOIN designation ON (stock.id_designation=designation.id_designation) INNER JOIN categorie ON (stock.id_categorie=categorie.id_categorie)');
                        
                        while($donnees=$req->fetch())
                        {
                            ?>
                            <tr>
                                <td class="table-success" id="<?php  echo $donnees['id_prod'];?>"><?php echo $donnees['id_prod'];?></td>
                                <td class="table-success" ><?php echo $donnees['nom_prod'];?></td>
                                <td class="table-success" ><?php echo $donnees['designation'];?></td>
                                <td class="table-success" ><?php echo $donnees['categorie'];?></td>
                                <td class="table-success" ><?php echo $donnees['quantite_prod'];?></td>
                                <td class="table-success" ><?php echo $donnees['seuil_prod'];?></td>
                                <td class="table-success" ><?php echo $donnees['prix_unit_prod'];?></td>
                                <td class="table-success" ><?php echo $donnees['valeur_prod'];?></td>
                                <td class="table-success" ><?php echo $donnees['date_prod'];?></td>
                                <td class="table-success" ><?php echo $donnees['libellee'];?></td>
                                <td >
                                <form action="../suppression/suppression_post.php" method="post">
                                <button class="btn btn-danger" type="submit" name="supp" value="<?php echo $donnees['id_prod'];?>"><img src="../dist/bootstrap-icons/trash.svg" alt="poubelle">Supprimer</button>
                                </form>
                                </td>
                                <td>
                                <form action="../modif.php/modif.php" method="post">
                                <a href="modifier.php"> <button class="btn btn-warning" type="submit" name="modifier" value="<?php echo $donnees['id_prod'];?>"><img src="../dist/bootstrap-icons/pencil.svg" alt=""> Modifier</button> </a> 
                                </form>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                        </table> 
            
            </div>
        </div>
    </div>
    <script src="../dist/js/jquery-3.6.0.js"></script>
    <script src="../dist/js/bootstrap.bundle.js"></script>
    <script>
        // $(document).ready(function()
        // {
        //     $("#btn1").click(function()
        //     {
        //         $("#prod").val("vary");
        //     });
        // });
    </script>

</body>
</html>