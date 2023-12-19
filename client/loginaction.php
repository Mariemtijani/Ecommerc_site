<?php

require("conixtion.php");
$r=$con->prepare("SELECT  COUNT(user_name) as c  FROM client WHERE email LIKE ? AND mot_passe LIKE ? ");
$r->execute(array($_POST["email"],$_POST["password"]));
$l=$r->fetch();
echo $l["c"];
if ($l["c"]==0) {
    header("location:logine.php?msg=les donnes  ne pas execte, click sur button pour crearte new conte");
}else{
session_start();
$_SESSION["login"] = $_POST["email"];
$_SESSION["password"] = $_POST["password"];
header("location:acceuil.php");
}



?>