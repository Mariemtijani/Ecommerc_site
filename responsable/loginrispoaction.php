<?php
require("connexion.php");
$r=$connexion->prepare("SELECT  COUNT(*) as c 
 FROM responsable
  WHERE email = ? AND mot_passe LIKE ? ");
$r->execute(array($_POST["emaile"],$_POST["passworde"]));
$l=$r->fetch();
if ($l["c"]==0) {
    header("location:loginerspo.php?msg=les donnes  ne pas execte, click sur button pour crearte new conte");
}else{
session_start();
$_SESSION["logine"] = $_POST["emaile"];
$_SESSION["password"] = $_POST["passworde"];
header("location:accueiL.php?");
}



?>