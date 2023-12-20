<?php 
require("connexion.php");
session_start();
if(!isset($_SESSION['logine'])){
  header('location:loginerspo.php');
}
$requete=$connexion->prepare("SELECT *
 from produit as pro 
 INNER JOIN marque as mar 
 on pro.id_mar=mar.id_mar 
 INNER JOIN categorie as cat 
 on pro.id_cat=cat.id_cat  ");
$requete->execute();
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


<nav class="navbar navbar-expand-sm navbar-dark bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)"><img class='logo' src="logo/logo2.png"></a>

    
      <div class="dropdown dropstart text-end">
      <a class="nav-link text-dark" data-bs-toggle="dropdown" href="#"><i class="fa-solid fa-user"></i></a>

  <ul class="dropdown-menu bg-light">
    <li><a class="dropdown-item bg-light " href="modifyaccount.php">My account</a></li>
    <li><a class="dropdown-item bg-light " href="logout.php">Log out <i class="ms-5 fa-solid fa-right-from-bracket"></i></a></li>
  </ul>
</div>
         </div>
  </div>
</nav>


<script>

function dt(){
  var datetime=new Date()
  var hrs= datetime.getHours()
  var min= datetime.getMinutes() 
  var scd= datetime.getSeconds()
  var session=document.getElementById('session')
  if(hrs<10){document.getElementById('hours').innerHTML='0'+hrs}
  else{ document.getElementById('hours').innerHTML=hrs}
 if (min<10){document.getElementById('minutes').innerHTML='0'+min}
 else{ document.getElementById('minutes').innerHTML=min}
 if(scd<10){document.getElementById('seconds').innerHTML='0'+scd}
 else{  document.getElementById('seconds').innerHTML=scd}
  if (hrs>=12){
      session.innerHTML='PM'
  }
  
}
setInterval(dt,10)
    </script>
    
<div class='container-fluid'>
<div class='bg-dark row'>
<ul class="nav">
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <li><a class="nav-link text-light"id="accueiL" href="accueiL.php"><i class="fa-solid  fa-house"></i> Home</a></li>
<li class='nav-item'><a class="nav-link text-light" data-bs-toggle="dropdown" href="#"><i class="fa-solid  fa-add"></i> Add</a>
<ul class="dropdown-menu bg-light">
<li><a class="dropdown-item bg-light"id="btnaddProduct" href="Addproduct.php">Add product</a></li>
    <li><a class="dropdown-item bg-light"id="btnaddBrand" href="Addbrand.php">Add brand</a></li>
    <li><a class="dropdown-item bg-light"id="btnaddCategorie" href="AddCategory.php">Add Category</a></li>
    
  </ul></li>
<li class='nav-item'><a class="nav-link text-light" data-bs-toggle="dropdown"href="#"><i class="fa-solid fa-magnifying-glass"></i> Search</a>
<ul class="dropdown-menu bg-light">
    <li> <form action='search.php' >
        <input class="form-control-sm me-3 ms-3" name='Search' type="text" placeholder="Search">
        <input type="submit"  value='Search'class='btn btn-dark btn-sm mb-1 me-3'>
      </form></li>
   
  </ul></li>

</ul>

 </div>

 </div>
 <div id='clock'>
      <span id="hours">00</span> 
      <span class="dots" >:</span> 
      <span id="minutes">00</span> 
      <span class="dots">:</span> 
      <span id="seconds">00</span>
      <span id="session">AM</span>
      <span id='cl'><i  class="fa-solid fa-clock"></i></span>
</div>



    <!-- ----------------------------------pageprincipal----------------------------------- -->
<div class="row container-fluid">
<div style='border-right:1px solid lightgrey;height:300px' class='row-3 col-2'>
<ul class="mt-5 list-group ">
<li class="list-group-item bg-dark text-center "><a href='#' class="text-light bg-dark" id='item1'><i class="fa-solid fa-store"></i> Stock</a>
<?php while( $alertproduit=$requete->fetch()){
if($alertproduit['quantite']<30){?>
<a  style='position:absolute;top:-10px;right:5px ;width:25px;height:25px;border-radius:50%'  href="#" class="text-warning bg-light"><i class="fa-solid fa-bell"></i></a>

    <?php } }?></li>
    <div class='item1'>
    <li class="list-group-item  "><a href='#' id='Categories'>Categories</a></li>
    <li class="list-group-item"><a href='#' id='Products' >Products</a></li>
    <li class="list-group-item "><a href='#' id='Brands' >Brands</a></li>
    <li class="list-group-item "><a href='#' id='alertbtn' >Running out</a></li>
    </div>
    <li class="list-group-item  text-center bg-dark "><a href='#' class="text-light bg-dark " id='item2' ><i class="fa-solid fa-comment-dollar"></i> Finance </a>
    
  </li><div class='item2'>
          <li class="list-group-item"><a href='#' id='Financialdetails'>Financial details</a></li>
   

    </div>

     </ul>
     
</div> 
<!--------------PRODUCTS--------------------------->
<div id='listProducts' class='col-10'>
  <h3 class='h3 mt-5 p-2 border-bottom'>All products</h3>
 <table class='table  container mt-4'>

 <thead>
 <tr>
 <th>ID Product </th>
 <th>Product name</th>
 <th>Price</th>
 <th>Quantite</th>
 <th>Product Image</th>
 <th>Brand</th>
 <th>Category</th>
 <th>Modify</th>
 <th>Delete</th>
 </tr></thead>

 <tbody>
 <?php
 $produit=$connexion->prepare("SELECT *
 from produit as pro 
 INNER JOIN marque as mar 
 on pro.id_mar=mar.id_mar 
 INNER JOIN categorie as cat 
 on pro.id_cat=cat.id_cat  ");
 $produit->execute();
  while($ligne9=$produit->fetch()){?>
 <tr><td><?php echo $ligne9["id_pro"]?></td>
 <td><?php echo $ligne9["nom_pro"]?> </td>
 <td><?php echo $ligne9["prix"]?></td>
 <td><?php echo $ligne9["quantite"]?></td>
 <td><img style='width:40px; height:40px' src="<?php echo $ligne9["photo"]?>"></td>
 <td><?php echo $ligne9["nom_mar"]?></td>
 <td><?php echo $ligne9["nom_cat"]?></td>
 <td><a id='modify' href='modify.php?id_pro=<?php echo $ligne9["id_pro"]?>' ><i class="fa-solid text-dark fa-pen"></i></a></td>
<td><a id='delete' href='delete.php?id_pro=<?php echo $ligne9["id_pro"]?>' ><i class="fa-solid text-dark fa-trash-can"></i></a></td>
</tr>
  <?php } ?>
 </tbody>

 </table>
</div>


<?php if(isset($_GET['msg'])){?>
<div class="alert alert-warning"><?php echo $_GET['msg'] ?></div>
<?php }?>

<!-- --------------------categorie-------------------------- -->
<?php 
$requete=$connexion->prepare("SELECT *
from  categorie 
order by dateCategorie ");
$requete->execute();?>

<div id='listCategories'  class='col-10'>
<table class='table  container mt-4'>

<thead>
<tr>
<th>ID Category</th>
<th>Category's name</th>
<th>Date</th>
<th>Description</th>
<th>Modify</th>
<th>Delete</th>
</tr></thead>

<tbody>		

<?php while($ligne=$requete->fetch()){?>
<tr>
<td><?php echo $ligne["id_cat"]?></td>
<td><?php echo $ligne["nom_cat"]?></td>
<td  ><?php echo $ligne["dateCategorie"]?></td>
<td <?php if(empty($ligne["descr"])){ echo 'style="background-color:lightgrey"';}?>><?php echo $ligne["descr"]?></td>
<td ><a id='modify' href='modify.php?id_cat=<?php echo $ligne["id_cat"]?>' class='text-dark'><i class="fa-solid fa-pen"></i></a></td>
<td><a href='delete.php?id_cat=<?php echo $ligne["id_cat"]?>&page=accueiL' id='delete' class='text-dark' ><i class="fa-solid  fa-trash-can"></i></a></td>
</tr>
  <?php } ?>
</tbody>

</table>

</div>

<!-- --------------------brands-------------------------- -->
<?php $requete=$connexion->prepare("SELECT *
 from marque  ");
$requete->execute();?>
<div id='listBrands' class='col-10'>
<table class='table container mt-4'>

<thead>
<tr>
<th>ID Brand</th>
<th>Brand name</th>
<th>Date</th>
<th>Description</th>
<th>Modify</th>
<th>Delete</th>
</tr></thead>

<tbody>
<?php while($ligne=$requete->fetch()){?>
<tr><td><?php echo $ligne["id_mar"]?></td>
<td><?php echo $ligne["nom_mar"]?></td>
<td><?php echo $ligne["startDate"]?></td>
<td><?php echo $ligne["descr"]?></td>
<td><a id='modify' href='modify.php?id_mar=<?php echo $ligne["id_mar"]?>&page=Addbrand' ><i class="fa-solid text-dark fa-pen"></i></a></td>
<td><a  href='delete.php?id_mar=<?php echo $ligne["id_mar"]?>&page=accueiL'  ><i class="fa-solid text-dark fa-trash-can"></i></a></td>
</tr>
  <?php } ?>
</tbody>

</table>
</div>


<div id='allFinancialdetails' class='col-10 '>
    <div class='row mt-5   ms-5'>
    <a style='text-decoration:none;font-weight:bold;' id='filter' href='#' class=' mb-3 border-bottom border-dark bg-light  text-dark'><i class="fa-solid fa-filter"></i> Filter</a>
    <form class='mb-3' action='filter.php' method='post' id='form-filter'>
      <div class='row'>
     <label for="" class="form-label col ">Start date :</label>
     <label for="" class="form-label col ">End date :</label>
     </div>
         <div class='row'>
         <input type="date"  id='datestart' name='datestart' style='width:200px' class='form-control col ms-1 me-5' name="" id="">

     <input type="date" name='dateend' id='dateend'  style='width:200px' class='form-control col  ms-3' name="" id="">
     <input type='submit' id='filterbtn' style='width:100px;margin-left:5px' class='btn btn-dark' value="Filter">
     </div>
    </form>

<div class="card col-3 mt-5" >
  <div class="card-body">
    <h4 class="card-title">Income <i class="fa-solid fa-arrow-trend-up "></i></h4>
    <?php   
	
    $Income=$connexion->prepare('SELECT sum(total * montent_total) as Income
    from commande 
    where date_com between CONCAT(YEAR(current_date()), "-01-01") AND current_date()
    '
    )
      ;
      $Income->execute();
      $In=$Income->fetch();?>
    <h5 class="card-title d-flex justify-content-end"><?php if(isset($_GET['Income'])){echo $_GET['Income']; }
      else{echo $In['Income'];}
    ?>$</h5>
  </div>
</div>
<div class="card col-3 ms-5 mt-5" >
  <div class="card-body">
    <h4 class="card-title">Costs <i class="fa-solid fa-arrow-trend-down"></i></h4>
    <?php   
    $fil=$connexion->prepare('SELECT sum(quantite * purchase_price) as cost
    from produit 
    where purchase_date between CONCAT(YEAR(current_date()), "-01-01") AND current_date()
    '
    )
      ;
      $fil->execute();
      $f=$fil->fetch();?>
    <h5 class="card-title d-flex justify-content-end" id='res'>
      <?php if(isset($_GET['cost'])){echo $_GET['cost']; }
      else{echo $f['cost'];}
    ?>$</h5>
    
  </div>
	


</div>
<div class="card col-3 ms-5 mt-5" >
  <div class="card-body">
    <?php  $Income=$connexion->prepare('SELECT sum(total * montent_total) as Income
     from commande 
     where date_com between CONCAT(YEAR(current_date()), "-01-01") AND current_date()
     '
     )
       ;
       $Income->execute();
       $fil=$connexion->prepare('SELECT sum(quantite * purchase_price) as cost
       from produit 
       where purchase_date between CONCAT(YEAR(current_date()), "-01-01") AND current_date()
       '
       )
         ;
         $fil->execute();
         $c=$fil->fetch();
         $I=$Income->fetch(); ?>
    <h4 class="card-title">Profit <?php if(($I['Income'])< floatval($c['cost'])){?> <i class="fa-solid text-danger fa-arrow-trend-down"></i>
      <?php }else{?> <i class="fa-solid text-success fa-arrow-trend-up"></i>
   <?php }?>
      </h4>
    <h5 class="card-title d-flex justify-content-end"><?php
    
    
    if(isset($_GET['Income'])&&isset($_GET['cost']) && isset($_GET['profit'])){echo ($_GET['profit']); }
    else{echo floatval($I['Income'])- floatval($c['cost']);}
    ?>$</h5>    
  </div>
</div>

<?php

$re=$connexion->prepare("SELECT *
from produit ");
$re->execute();
$alertp=$re->fetch();
?>

<div class="card mt-5" id='alertcard' >
  <div class="card-body">
    <h4 class="card-title">Running out  <i class="fa-solid text-danger fa-ban"></i></h4>
  <?php while( $alert=$re->fetch()){
    if($alert['quantite']<30){ ?>  
   <p><strong>Product ID: </strong><span><?php echo $alert['id_pro']?> </span>
   | <strong>Product name: </strong><span><?php echo $alert['nom_pro']?> </span>
   | <strong>Quantity left: </strong><span><?php echo $alert['quantite']?> </span> </p>
    <?php } }?>
  </div>
</div>

</div>


<script>
 
// document.getElementById('filterbtn').addEventListener('click',filter());

// function filter(){
//   const formdat=document.getElementById('form-filter')
//  const form=new FormData(formdat)
// console.log(form)
//  const request=new XMLHttpRequest();
//  request.open('POST','filter.php',true);
// request.send(form)


//   }
  
  $(document).ready(function(){
    $('.item1, .item2, #listCategories ,#listProducts,#listBrands,#form-filter').hide()
     $('#item1').click(function(){
         $('.item1').slideToggle()
    })
     $('#item2').click(function(){
          $('.item2').slideToggle()
   })
//-----------show product
   $('#Products').click(function(){
    $('#listProducts').toggle()
    $('#listCategories,#listBrands,#allFinancialdetails ').hide()
   })
   //-----------show categorie
   $('#Categories').click(function(){
    $('#listCategories').toggle()
    $('#listProducts,#listBrands,#allFinancialdetails').hide()

   })

    //-----------show brand
    $('#Brands').click(function(){
    $('#listBrands').toggle()
    $('#listProducts,#listCategories,#allFinancialdetails ').hide()
   

   })
   $('#filter').click(function(){
    $('#form-filter').slideToggle()
    $('#allFinancialdetails'),hide()

  })
  $('#Financialdetails').click(function(){
    $('#allFinancialdetails').toggle()
    $('.item1, .item2, #listCategories ,#listProducts,#listBrands,#form-filter').hide()

  })
  $('#alertcard').hide()
  $('#alertbtn').click(function(){
    $('#alertcard').toggle()

  })
  })
</script>

</body>
</html>