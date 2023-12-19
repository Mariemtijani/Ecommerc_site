<?php 

session_start();
require("connexion.php");

 // get the data
$id_product = $_POST["idPro"];

$selectlReq = $connexion -> prepare("SELECT count(*) as countPro FROM panier where id_pro=? AND user_name=?");
$selectlReq -> execute(array($id_product,$_SESSION["login"]));
$countpro = $selectlReq -> fetch(PDO::FETCH_OBJ);

// add to table panier
if(isset($_SESSION["login"]))
        $addQuantReq = $connexion -> prepare("UPDATE panier set quantite = quantite - 1 where id_pro=? and user_name=?");
        $addQuantReq -> execute(array($id_product,$_SESSION["login"]));



?>