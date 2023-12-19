<?php
require('connexion.php');
//--------------------delete produit--------------------
if(isset($_GET['id_pro'])){
$requete=$connexion->prepare('DELETE from produit where id_pro=?');
$requete->execute(array($_GET['id_pro']));
header("location:accueiL.php?msgok=Operation's donne");
}
//--------------------delete categorie--------------------
elseif(isset($_GET['id_cat'])){
    $requete=$connexion->prepare('DELETE from categorie where id_cat=?');
    $requete->execute(array($_GET['id_cat']));
    if($_GET['page']=='AddCategory'){
    header("location:AddCategory.php?msgok=Operation's donne");}
    elseif($_GET['page']=='accueiL'){
        header("location:accueiL.php?msgok=Operation's donne");
    }
}
//--------------------delete marque--------------------
elseif(isset($_GET['id_mar'])){
    $requete=$connexion->prepare('DELETE from marque where id_mar=?');
    $requete->execute(array($_GET['id_mar']));
    if($_GET['page']=='Addbrand'){
        header("location:Addbrand.php?msgok=Operation's donne");}
        elseif($_GET['page']=='accueiL'){
            header("location:accueiL.php?msgok=Operation's donne");
        }}
else{
    header("location:accueiL.php?msgerror=Some thing went wrong! try again.");
}
?>