<?php
require('connexion.php');
if(isset($_POST['idpro'])){
    if(isset($_POST['stock']) && isset($_POST['PurchasePrice'])&& 
    isset($_POST['SellPrice']) && isset($_POST['Pname'])  && isset($_POST['Brand']) 
        && isset($_POST['Category'])  && isset($_POST['purchasedate'])){
$img=$_POST['oldimage'];
if(!empty($_FILES['image'])){
$type=$_FILES['image']['type'];
$ex=['image/png','image/jpg','image/jpeg'];
if(in_array($type,$ex)){
    $nameimg=$_FILES['image']['name'];
    $tmpimg=$_FILES['image']['tmp_name'];
    $location='images/';
    move_uploaded_file($tmpimg,$location.$nameimg);
    $img=$location.$nameimg;
}
}
 

$requte=$connexion->prepare('UPDATE  produit 
set nom_pro=?, prix=?,quantite=?, photo=? , id_mar=?,id_cat=?, purchase_price=?,purchase_date=?
where id_pro=?');
$requte->execute(array($_POST['Pname'],$_POST['SellPrice'],$_POST['stock'],$img,$_POST['Brand'],$_POST['Category'],$_POST['PurchasePrice'],$_POST['purchasedate'],$_POST['idpro']));
header('location:Addproduct.php?msgok=bien modifier');
}}
else{
    header('location:Addproduct.php?msgerror=error : ne laisse pas un chemp vide!');
}


