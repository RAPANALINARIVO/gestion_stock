<?php
session_start();

?>
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

    h2{
        font-family: 'Times New Roman', Times, serif;
        font-style: italic;
    }
    .icon{
        color: white;
    }
    #row1
    {
        overflow-y: hidden;
      
    }
    .deco{
        position: relative;
        display: inline-flex;
        margin-left: 1190px;
    }
    .deco:active{
        position: relative;
        display: inline-flex;
        margin-left: 1190px;
        color: red;
    }
    body{
        background-image: url("../images/img1.jpg");
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
        overflow: hidden;
    }
    h1
    {
        text-align : center;
        margin-top: 2px;
        margin-bottom:-2px
    }
    
    </style>

</head>
<body>
<div class="container-fluid">
    <div class="row bg-dark text-light">
        <h1>HOTEL BUNGALOW TALEVA </h1>
        <div class="deco" >
            <?php if($_SESSION['utilisateur'])
            {
                // echo "bienvenue    ".$_SESSION['utilisateur']."</br>";
                echo "<a href='../logout.php?logout'>Deconnexion</a> ";
            }?>
        </div>
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
                            <a href="../mvt/entrer.php">Entrer</a>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div><img src="../dist/bootstrap-icons/cart-dash" alt="" width="32" height="32"></div>
                            <a href="../mvt/sortie.php">Sorties</a>
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