<?php 
    session_start();
    require("connexion.php");
    $delReq = $connexion -> prepare("DELETE from favorite where id_pro=? and user_name=?");
    $delReq -> execute(array($_GET["idPro"],$_SESSION["login"]));
    header("location:favorite?msg=Item has been removed!");
?>