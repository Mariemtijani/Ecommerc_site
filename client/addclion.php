<?php
require("conixtion.php");
$type=$_FILES["photo"]['type'];
$litetype=["image/png","image/jpeg"];
if (in_array($type,$litetype)) {
    $tmp_name=$_FILES["photo"]['tmp_name'];
    $name=$_FILES["photo"]['name'];
    $locale="image/";
    move_uploaded_file($tmp_name,$locale.$name);
}
$r=$con->prepare("SELECT COUNT(user_name) as c FROM client WHERE email LIKE ? and user_name like ? ");
$r->execute(array($_POST["email"],$_POST["user"]));
$l=$r->fetch();
if ($l["c"]==0) {
    $requete=$con->prepare("INSERT INTO client (nom_client, prenom_client, adr_client, email, num_tele, mot_passe, user_name,photo) VALUES (?,?,?,?,?,?,?,?)");
    $requete->execute(array($_POST["nom"],$_POST["prenom"],$_POST["ades"],$_POST["email"],$_POST["tel"],$_POST["password"],$_POST["user"],$locale.$name));
    session_start();
    $_SESSION["login"]=$_POST["email"];
    $_SESSION["password"]=$_POST["password"];
    header("location:acceuil.php");
}else{
    header("location:sing.php?msg=les donnes deja execte, click sur button pour entre a l conte");
}
?>