<?php 
require("connexion.php");
session_start();
$requete=$connexion->prepare("SELECT *
 from categorie  ");
$requete->execute();
$requete1=$connexion->prepare("SELECT *
 from marque  ");
$requete1->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsable's space</title>
    <link href="bootstrap.min.css" rel='stylesheet'>
    <link href="style.css" rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src='jquery-2.0.2.min.js'></script>
</head>
<body>

<!-- ---------------------partie categorie------------------------------- -->

   <?php if(isset($_GET['id_cat'])){
    //-----------requete categorie--------
$requetecat=$connexion->prepare("SELECT *
from  categorie where id_cat=?
");
$requetecat->execute(array($_GET['id_cat']));
$cat=$requetecat->fetch();
    
    ?>
    
<div class='container row '>
  
    <form action="actionmodify.php" class='form ms-5 col-10'>
        <label class='form-label mt-5 ms-5 '>ID Categorie :</label>
        <input type="text" class='form-control bg-light ms-5' readonly value="<?php echo $cat['id_cat'] ?>">
        <label for=""class='form-label mt-2 ms-5 '>Categorie :</label>
        <input type="text" class='form-control ms-5' name="Categorie"  value="<?php echo $cat['nom_cat'] ?>">
        <label for=""class='form-label mt-2 ms-5 '>Date :</label>
        <input type="date" class='form-control ms-5' name="DateCategorie"  value="<?php echo $cat['dateCategorie'] ?>">
        <label class='form-label mt-2 ms-5' for="">Description :</label>
        <textarea class='form-control mb-3 ms-5' name="descriptionCategorie" value="<?php echo $cat['descr'] ?>" cols="10" rows="5"></textarea>
        <input type="submit" class="btn btn-dark ms-5 mb-5" value="Modify">
        <a href='AddCategory.php' class="btn btn-dark ms-5 mb-5" >Return</a>
      </form>
     
   
    </div><?php }?>







<!-- ---------------------partie produit------------------------------- -->

    <?php if(isset($_GET['id_pro'])){
    //-----------requete produit--------
$requetePro=$connexion->prepare("SELECT *
from  produit where id_pro=?
");
$requetePro->execute(array($_GET['id_pro']));
$pro=$requetePro->fetch();
    ?>

<div class='container-fluid row ' id="pageaddProduct">
  
    <form action="actionmodify.php" method='POST' enctype='multipart/form-data' class='form ms-5 col-10'>
    <div class="row">
    <div class='col-6'>
    <label for=""class=' form-label mt-5 ms-5 '>ID Product :</label>
        <input type="text" class='form-control bg-light ms-5' readonly name="idpro" value='<?php echo $pro['id_pro']?>'>
        <label for=""class=' form-label mt-3 ms-5 '>Product's name :</label>
        <input type="text" class='form-control ms-5' name="Pname" value='<?php echo $pro['nom_pro']?>' id="">
        <label for=""class=' form-label mt-2 ms-5'>Sell Price :</label>
        <input type="text" class='form-control ms-5' name="SellPrice" value='<?php echo $pro['prix']?>'>
        <label for=""class='form-label mt-2 ms-5'>Purchase Price :</label>
        <input type="text" class='form-control ms-5' name="PurchasePrice" value='<?php echo $pro['purchase_price']?>'>
      
        <label for=""class=' form-label mt-2 ms-5'>Quantity :</label>
        <input type="text" class='form-control ms-5' name="stock" value='<?php echo $pro['quantite']?>'>
        <label for=""class='form-label mt-3 ms-5'>Image :</label>
        <input type="file" class='form-control ms-5' name="image" >  
        <input type="hidden" name="oldimage"value='<?php echo $pro['photo']?>'>
      </div>
        <div class='col-6'>
        <label for=""class='form-label mt-5 ms-5'>Brand :</label>
        <select name="Brand" id="" class=' form-select ms-5'>
        <?php while($ligne1=$requete1->fetch()){?>
  <option  <?php if( $pro["id_mar"]==$ligne1['id_mar'] ){echo 'selected';}?>  value="<?php echo $ligne1["id_mar"]?>" ><?php echo $ligne1["nom_mar"]?></option>
  <?php } ?>
        </select>
        <label for=""class='form-label mt-1 ms-5'>Category :</label>
        
        <select name="Category" id="" class='form-select ms-5'>
<?php while($ligne2=$requete->fetch()){?>
  <option <?php if( $pro["id_cat"]==$ligne2['id_cat'] ){echo 'selected';}?> value="<?php echo $ligne2["id_cat"]?>"><?php echo $ligne2["nom_cat"]?></option>
  <?php } ?>
        </select>
       
       
  <br><label class='form-label  ms-5' for="">Purchase Date :</label>
     <input type="date" name="purchasedate" id="" class="ms-5 form-control" value='<?php echo $pro['purchase_date']?>'>

       
     <input type="submit" style='width:100px' class="btn btn-dark mt-3  ms-5 mb-5" value="Modify">
    <a href='Addproduct.php' style='width:100px' class="btn btn-dark mt-3 ms-5 mb-5" >Return</a>

    </div> 
     </div> 
      </form>
   
    </div>

    
    <?php }?>






    <!-- ---------------------partie marque------------------------------- -->
    <?php if(isset($_GET['id_mar'])){
    //-----------requete marque--------
$requetmar=$connexion->prepare("SELECT *
from  marque where id_mar=?
");
$requetmar->execute(array($_GET['id_mar']));
$mar=$requetmar->fetch();
    ?>
    
    <div class='container row ' id="pageaddBrand">
  
  <form action="actionmodify.php" class='form ms-5 col-10'>
  <label for=""class='form-label mt-5 ms-5 '>ID Brand :</label>
      <input type="text" class='form-control ms-5 bg-light' readonly name="idbrand" value="<?php echo $mar['id_mar'] ?>">
      <label for=""class='form-label mt-5 ms-5 '>Brand :</label>
      <input type="text" class='form-control ms-5' name="brand" value="<?php echo $mar['nom_mar'] ?>" id="">
      <label for=""class='form-label mt-2 ms-5 '>Date :</label>
      <input type="date" class='form-control ms-5' name="DateBrand" value="<?php echo $mar['startDate'] ?>" id="">
      <label class='form-label ms-5 mt-2 '  for="">Description :</label>
      <textarea class='form-control mb-3 ms-5' name="descriptionBrand" id="" cols="10" value="<?php echo $mar['descr'] ?>" rows="5"></textarea>

      <input type="submit" class="btn btn-dark ms-5 mb-5" value="Modify">
        <a href='Addbrand.php' class="btn btn-dark ms-5 mb-5" >Return</a>
 </div>
    </form>
 
</div>
    <?php 


}?>

       </body>
</html>