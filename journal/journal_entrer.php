
            <?php include('../navbar/nav.php')?>                
                </table>
            </div>
            <div class="col-lg-11 ">
            <center> <h5>journal d'approvisionnement</h5></center>
                <table class="table">
                    <thead>
                    <tr>
                    <th>id</th>
                    <th>produits</th>
                    <th>designation</th>
                    <th>categorie</th>
                    <th>quantite</th>
                    <th>prix_u</th>
                    <th>montant</th>
                    <th>date_approvisionnement</th>
                    <th>libellées</th>
                    
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('../con_db/connexion.php');
                        $req=$connexion->query('SELECT journal_entrer.id_prod,journal_entrer.date_prod,journal_entrer.nom_prod,journal_entrer.quantite_prod,journal_entrer.prix_unit_prod,journal_entrer.valeur_prod ,journal_entrer.libellee,journal_entrer.seuil_prod,categorie.categorie,designation.designation
                        FROM journal_entrer INNER JOIN designation ON (journal_entrer.id_designation=designation.id_designation) INNER JOIN categorie ON (journal_entrer.id_categorie=categorie.id_categorie) ');
                        $i=1;
                        while($donnees=$req->fetch())
                        {
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $donnees['nom_prod'];?></td>
                                <td><?php echo $donnees['designation'];?></td>
                                <td><?php echo $donnees['categorie'];?></td>
                                <td><?php echo $donnees['quantite_prod'];?></td>
                                <td><?php echo $donnees['prix_unit_prod'];?></td>
                                <td><?php echo $donnees['valeur_prod'];?></td>
                                <td><?php echo $donnees['date_prod'];?></td>
                                <td><?php echo $donnees['libellee'];?></td>
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