<?php 
    session_start();
    require("connexion.php");
    $delReq = $connexion -> prepare("DELETE from panier where id_pro=? and user_name=?");
    $delReq -> execute(array($_GET["idPro"],$_SESSION["login"]));
    header("location:cart_shopping?msg=Item has been removed!");
?>