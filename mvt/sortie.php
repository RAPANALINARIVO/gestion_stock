<?php include('../navbar/nav.php')?>
                
                </table>
            </div>
            <div class="col-lg-11 ">
            <form action="entrer_post.php" method="post">
                <center><h5>Veillez selectionner le produit que vous avez pris dans le stock !</h5></center>
               
               <div class="form-group text-center">
                    <select name="prod" id="" class="form-control">
                    
                    <?php
                    include('../con_db/connexion.php');
                    $req=$connexion->query("SELECT* FROM stock");
                    while($donnees=$req->fetch())
                    {?>
                        <option name="prod" value="<?php echo $donnees['nom_prod'];?>"><?php echo $donnees['nom_prod'];?></option>
                    
                    <?php
                    }
                    ?>
                    </select>
                </div>
                <div class="form-group text-center">
                    <button type="submit" name="btn" class="btn btn-info">Valider</button>
                </div>
                </form>
                
               
               
            </div>
        </div>
    </div>
</body>
</html>