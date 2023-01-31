<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css"/>
    <link href="signin.css" rel="stylesheet">
    <style>
        body{
            background-image: url('images/taleva2.jpg');
            background-position:auto;
            background-attachment:fixed;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body >
<body >
<div class="container">
        <div class="row">
            <div class="col-lg-6 my-5 m-auto">
                <div class="card bg-dark mt-5">
                    <div class="card-title bg-primary text-white text-center mt-5">
                        <h3 class="py-3" >TALEVA</h3>
                    </div>
                    <!-- ///////////////////////// -->
                    <?php
                        if( @$_GET['erreur']==true)
                        {
                        ?>
                            <div class="alert-light text-danger text-center py-3"><?php echo $_GET['erreur'];?></div>
                        <?php
                        }
                    ?>
                    <!-- /////////////////////////// -->

                    <!-- //////////////////////// -->
                    <?php
                        if(@$_GET['invalide']==true)
                        {
                        ?>
                        
                            <div class="alert-light text-danger text-center py-3"><?php echo @$_GET['invalide'];?></div>
                        
                      <?php 
                        } 
                    ?>
                    <div class="card-body">
                        <form action="login_post.php" method="post">
                            <input type="text" name="user" placeholder="Nom d'utilisateur" class="form-control mb-3" >
                            <input type="password" name="mdp" placeholder="Mot de passe" class="form-control mb-3 ">
                            <button type="submit" name="login" class="btn btn-success mt-3" > se connecter</button>
                        </form>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</body>
</html>