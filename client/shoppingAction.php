<?php 
    session_start();
    require("connexion.php");

     // get the data
    $id_product = $_POST["idPro"];
    

    $selectlReq = $connexion -> prepare("SELECT count(id_pro) as countPro FROM panier where id_pro=? and user_name=? ");
    $selectlReq -> execute(array($id_product,$_SESSION["login"]));
    $countpro = $selectlReq -> fetch(PDO::FETCH_OBJ);

    // add to table panier
    if(isset($_SESSION['login'])){
        if($countpro-> countPro < 1){
            $panierReq = $connexion -> prepare("INSERT INTO panier VALUES (?,?,?,?)");
            $panierReq -> execute(array(null,$id_product,1,$_SESSION["login"]));
        }
        else{
            
            $updatReq = $connexion -> prepare("UPDATE panier SET quantite = quantite + 1 where id_pro=? ");
            $updatReq -> execute(array($id_product));

        }

    }
    

    




?>
