<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navigation</title>
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css"/>
    <style>
    .col-lg-1
    {
        height: 100%;
        position: fixed;
        width: auto;
        margin-top:0px;
    }
    .col-lg-11
    {
        padding: 10px;
        margin-left: auto;
        overflow-y: scroll;
        overflow-y: hidden;
        margin-top: 0px;
    }
    .menu
    {
      position: fixed;
      width: 100%;
      height: 100%;  
    }
    h1
    {
        font-style: oblique;
        font-family: 'Times New Roman', Times, serif;
        color:orange;
    }
    a{
        font-style: italic;
    }
    a:hover{
        color: yellowgreen;
        font-family: 'Times New Roman', Times, serif;
        font-style: italic;
        
    }
    a:active{
    color: purple;
    }
    h2{
        font-family: 'Times New Roman', Times, serif;
        font-style: italic;
    }
    .icon{
        color: white;
    }
    body{
    background-image: url("../images/img1.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position:auto;
    background-size: cover;
    }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row bg-dark text-light">
    <center><h1>HOTEL BUNGALOW TALEVA</h1></center>
    <div><h1>Menus</h1></div>
    </div>
        <div class="row">
            <div class="col-lg-1 bg-dark">
                <table class="table" >
                <thead>
                <tr>
                    <th>
                        <div class="icon"><img src="../dist/bootstrap-icons/house-door.svg" alt="house-door" width="32" height="32" ></div>
                        <a href="../acceuil/acceuil.php">Acceuil </a>
                    </th>
                    </tr>
                    
                    <tr>
                        <th>
                            <div class="icon"><img src="../dist/bootstrap-icons/cart-plus" alt="cart-plus" width="32" height="32" ></div>
                            <a href="entrer.php">Entrer</a>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div><img src="../dist/bootstrap-icons/cart-dash" alt="" width="32" height="32"></div>
                            <a href="sortie.php">Sorties</a>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div><img src="../dist/bootstrap-icons/minecart-loaded" alt="" width="32" height="32"></div>
                            <a href="../stock/stock.php">Produits</a>
                        </th>
                    </tr>
                    
                    <tr>
                        <th>
                            <div><img src="../dist/bootstrap-icons/journal-bookmark" alt="journal" width="32" height="32"></div>
                            <a href="../journal/choixjournal.php">Journal</a>
                        </th>
                    </tr>
                </thead>
                
                </table>
            </div>
            <div class="col-lg-11 ">
            <center> <h5>veuillez saisir la quantite quez vous avez prelevés</h5></center>
            <form action="sortie_post.php?id=hjhhhg" method="post">
                <table class="table bg-dark text-light" >
                    <tr>
                    <th><label class="form-label" for="prod">produit</label></th>
                    <th><label class="form-label" for="qte">quantite</label></th>
                    <th><label class="form-label" for="seuil">seuil</label></th>
                    <th><label class="form-label" for="prix">prix</label></th>
                    <th><label class="form-label" for="design">designation</label></th>
                    <th><label class="form-label" for="cat">categorie</label></th>
                    <th><label class="form-label" for="mot">motifs</label></th>
                    </tr>
                    <tr>
                    <?php
                    include('../con_db/connexion.php');
                    if(isset($_POST['prod']))
                    {$var=$_POST['prod'];}
                    
                    $req=$connexion->query("SELECT * FROM `stock` WHERE `nom_prod` LIKE '$var'");
                    $donnees=$req->fetch();
                    ?>
                    <td><input class="form-control" type="text" id="prod" name="prod" required="" value="<?php echo $donnees['nom_prod'] ;?>" ></td>
                    <td><input class="form-control" type="number" min="0" id="qte" name="qte"required=""value="<?php echo $donnees['quantite_prod'] ;?>" ></td>
                    <td><input class="form-control" type="number"id="seuil" min="0" name="seuil"required=""value="<?php echo $donnees['seuil_prod'] ;?>" ></td>
                    <td><input class="form-control" type="number"id="prix" min="0"  name="prix"required=""value="<?php echo $donnees['prix_unit_prod'] ;?>" ></td>
                    <td><select class="form-control" name="design" id="design" list="designation" >
                            <?php
                            include('../con_db/connexion.php');
                            $requete=$connexion->query('SELECT*FROM designation');
                            while($donnees1=$requete->fetch())
                            {
                                if($donnees1['id_designation']==$donnees['id_designation'])
                                {
                                    ?>
                                     <option  selected="selected"value="<?php echo $donnees1['designation']?>"><?php echo $donnees1['designation']?></option>
                                <?php
                                }
                                else
                                {
                                    ?>
                                      <option value="<?php echo $donnees1['designation']?>"><?php echo $donnees1['designation']?></option>

                                    <?php
                                }
                                ?>
                                
                               
                        <?php
                            }
                            ?>
                        </select></td>
                    <td><select class="form-control" name="cat" id="cat">
                        <?php
                            include('../con_db/connexion.php');
                            $requete=$connexion->query('SELECT*FROM categorie');
                            while($donnees2=$requete->fetch())
                            {
                                if($donnees2['id_categorie']==$donnees['id_categorie'])
                                {                                ?>
                                <option selected="selected"  value="<?php echo $donnees2['categorie']?>"><?php echo $donnees2['categorie']?></option>
                                <?php
                                }
                                else{?>
                                    <option value="<?php echo $donnees1['designation']?>"><?php echo $donnees1['designation']?></option>

                                 <?php
                                }
                            }
                           
                                ?>
                        </select></td>
                    <td><input class="form-control" type="text"id="mot" name="mot"required="" value="<?php echo $donnees['libellee'] ;?>" ></td>
                    <td><input type="hidden" class="form-control" type="text"id="dat" name="dat"required="" value="<?php echo $donnees['date_prod'] ;?>" ></td>
                    </tr>
                </table>
                <center>
                    <button class="btn btn-success " name="modif" value="<?php echo $donnees['id_prod'] ?>"type="submit">prelever</button>
                    <button class="btn btn-danger" name="annuler" type="submit"><a href="entrer.php">Annuler</a></button>
                </center>
                </form>
               
           
            
            </div>
        </div>
    </div>
</body>
</html>