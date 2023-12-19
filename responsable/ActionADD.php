<?php
require("connexion.php");
//----------------------------add brand-------------------
if(isset($_GET['brand'])){
   $brand=ucwords($_GET['brand']);
$search=$connexion->prepare("SELECT count(nom_mar) as mar from marque where nom_mar=?");
$search->execute(array($brand));
$a=$search->fetch();
if($a["mar"]==0){
    $date=$_GET['DateBrand'];
    if(empty($date)){
       $today=date('Y-m-d');
       $date=$today;
      
    }
    $requete=$connexion->prepare("INSERT INTO marque Values(?,?,?,?)");
    $requete->execute(array(null,$brand,$_GET['descriptionBrand'],$date));
    header("location:Addbrand.php");}
else{
    $msg="this brand already exist";
    header("location:Addbrand.php?msg=$msg");
}}

;
//----------------------------add category-------------------
if(isset($_GET['Categorie']) ){
    if(!empty($_GET['Categorie'])){
    $Categorie=ucwords($_GET['Categorie']);
    $search=$connexion->prepare("SELECT count(nom_cat) as cat from categorie where nom_cat=?");
    $search->execute(array($Categorie));
    $a=$search->fetch();
    $date=$_GET['DateCategorie'];
    if(empty($date)){
       $today=date('Y-m-d');
       $date=$today;
      
    }
    if($a["cat"]==0){$requete=$connexion->prepare("INSERT INTO categorie Values(?,?,?,?)");
        $requete->execute(array(null,$Categorie,$_GET['descriptionCategorie'],$date));
        header("location:AddCategory.php");}
    else{
        $msg="this Category already exist";
        header("location:AddCategory.php?msgerror=$msg");
    }
}
else{
    $msg="you must to entry product's  name ";
    header("location:AddCategory.php?msgerror=$msg");
}
}


//----------------------------add product-------------------

if(isset($_POST['Pname'])){
    $Pname=ucwords($_POST['Pname']);
    $search=$connexion->prepare("SELECT count(nom_pro) as p from produit where nom_pro=?");
    $search->execute(array($Pname));
    $a=$search->fetch();
    if($a["p"]==0){
        $imgtype=$_FILES['image']['type'];
        $exten=['image/png','image/jpeg','image/jpg'];
        if(in_array($imgtype,$exten)){
            $imgname=$_FILES['image']['name'];
            $imgtmp=$_FILES['image']['tmp_name'];
            $location='images/';
            move_uploaded_file($imgtmp,$location.$imgname);
            $location2='C:\wamp64\www\phpPHP\client\images/';
            move_uploaded_file($imgtmp,$location2.$imgname);
        }
        $requete=$connexion->prepare("INSERT INTO produit Values(?,?,?,?,?,?,?,?,?)");
        $requete->execute(array(null,$Pname,$_POST['SellPrice'],$_POST['stock'],$location.$imgname,$_POST['Brand'],$_POST['Category'],$_POST['PurchasePrice'],$_POST['purchasedate']));
        header("location:Addproduct.php");}
    else{
        $msg="this product already exist do you want to increase product's quantity ?";
        header("location:Addproduct.php?msg=$msg");
    }
}



?>