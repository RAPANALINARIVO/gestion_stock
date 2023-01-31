
            <?php include('../navbar/nav.php')?>                
                </table>
            </div>
            <div class="col-lg-11 " style="overflow:hidden";>
                <div class="row">
                    <div class="col-2 push-right">
                        <form class="d-flex m-2" method="post">
                        <input class="form-control" name="valeur" type="search" placeholder="votre recherche" required="">
                            <button class="btn btn-outline-success" name="rec" value="rechercher" type="submit">
                        <img src="../dist/bootstrap-icons/search.svg" alt="icon_recherche"></button>
                        </form> 
                    </div>
                </div>
            <table class="table table-dark table-hover table-caption-top table-align-middle table-active">
                <!-- <caption>List des entres</caption> -->
                    <thead>
                        <tr>
                        <th >id</th>
                        <th >produits </th>
                        <th >designation</th>
                        <th >categorie</th>
                        <th >quantite</th>
                        <th >seuil</th>
                        <th >prix_u</th>
                        <th >montant</th>
                        <th>date</th>
                        <th>libellées</th>
                        <th >suppression</th>
                        <th >modification</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        /////////////////recherche//////////////////////////////
                        if(isset($_POST['rec']))
                        {
                            include('../con_db/connexion.php');
                            $valeur_de_recherche=$_POST['valeur'];
                            $req=$connexion->query('SELECT stock.id_prod,stock.date_prod,stock.nom_prod,stock.quantite_prod,stock.prix_unit_prod,stock.valeur_prod ,stock.libellee,stock.seuil_prod,categorie.categorie,designation.designation
                        FROM stock INNER JOIN designation ON (stock.id_designation=designation.id_designation) INNER JOIN categorie ON (stock.id_categorie=categorie.id_categorie)  
                        WHERE CONCAT(stock.id_prod,stock.date_prod,stock.nom_prod,stock.quantite_prod,stock.prix_unit_prod,stock.valeur_prod ,stock.libellee,stock.seuil_prod,categorie.categorie,designation.designation) like "%'.$valeur_de_recherche.'%"');
                        }
                        else{
                            include('../con_db/connexion.php');
                        $req=$connexion->query('SELECT stock.id_prod,stock.date_prod,stock.nom_prod,stock.quantite_prod,stock.prix_unit_prod,stock.valeur_prod ,stock.libellee,stock.seuil_prod,categorie.categorie,designation.designation
                        FROM stock INNER JOIN designation ON (stock.id_designation=designation.id_designation) INNER JOIN categorie ON (stock.id_categorie=categorie.id_categorie) ');
                        }
                        $i=1;
                        while($donnees=$req->fetch())
                        {
                            ?>
                            <tr >
                                <td class="table-success" ><?php echo $i;?></td>
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
                                <button class="btn btn-danger" type="submit" name="supp" value="<?php echo $donnees['id_prod'];?>"><img src="../dist/bootstrap-icons/trash.svg" alt="poubelle"> Supprimer</button>
                                </form>
                                </td>
                                <td>
                                <form action="../modif.php/modif.php" method="post">
                                <a href="modifier.php"> <button class="btn btn-warning" type="submit" name="modifier" value="<?php echo $donnees['id_prod'];?>"><img src="../dist/bootstrap-icons/pencil.svg" alt="">Modifier</button> </a> 
                                </form>
                                </td>
                            </tr>
                        <?php
                        $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>