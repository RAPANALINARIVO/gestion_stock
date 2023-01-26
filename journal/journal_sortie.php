            <?php include('../navbar/nav.php')?>                
                </table>
            </div>
            <div class="col-lg-11 ">
            
            <center> <h5>journal de prelevement</h5></center>
                <table class="table">
                    <thead>
                    <th>id</th>
                    <th>produits</th>
                    <th>designation</th>
                    <th>categorie</th>
                    <th>quantite</th>
                    <th>prix_u</th>
                    <th>montant</th>
                    <th>date_prelevement</th>
                    <th>libellées</th>
                    </thead>
                    <tbody>
                        <?php
                        include('../con_db/connexion.php');
                        $req=$connexion->query('SELECT journal_sortie.id_prod,journal_sortie.date_prod,journal_sortie.nom_prod,journal_sortie.quantite_prod,journal_sortie.prix_unit_prod,journal_sortie.valeur_prod ,journal_sortie.libellee,journal_sortie.seuil_prod,categorie.categorie,designation.designation
                        FROM journal_sortie INNER JOIN designation ON (journal_sortie.id_designation=designation.id_designation) INNER JOIN categorie ON (journal_sortie.id_categorie=categorie.id_categorie) ');
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