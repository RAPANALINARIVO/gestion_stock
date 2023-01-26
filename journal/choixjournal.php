
            <?php include('../navbar/nav.php')?>               
                </table>
            </div>
            <div class="col-lg-11 ">
            <center> <h5 class="title">Selectioner le journal </h5></center>
                    <center>
                        <form action="choix_post.php" method="post">
                        <table>
                        <th><select name="choix" id="">
                            <option value="choix1">journal d'entrer </option>
                            <option value="choix2">journal de la sortie</option>
                        </select></th>
                    
                    </table>
                    <button type="submit" name="btn" class="btn btn-success">Valider</button>
                    </form>
                    
                </center>
            </div>
        </div>
    </div>
</body>
</html>