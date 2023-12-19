<?php 
    session_start();
    require("connexion.php");

     // get the data
    $id_product = $_POST["idPro"];

    $selectlReq = $connexion -> prepare("SELECT count(*) as countPro FROM favorite where id_pro=? AND user_name=?");
    $selectlReq -> execute(array($id_product,$_SESSION["login"]));
    $countpro = $selectlReq -> fetch(PDO::FETCH_OBJ);

    // add to table panier
    if(isset($_SESSION["login"]) && $countpro -> countPro==0 ){
            $panierReq = $connexion -> prepare("INSERT INTO favorite VALUES (?,?,?)");
            $panierReq -> execute(array($_SESSION["client"],$id_product,$_SESSION["login"]));
    }
?>