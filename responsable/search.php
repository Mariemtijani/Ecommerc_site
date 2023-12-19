
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search's results</title>
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
    <li><a class="dropdown-item bg-light " href="#">Log out <i class="ms-5 fa-solid fa-right-from-bracket"></i></a></li>
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
<h3 class='h3 mt-5 p-2 border-bottom border-top text-center bg-light'>ALL RESULTS:</h3>

<?php
require('connexion.php');
$donne=FALSE;
//------------------searh in products----------------------------

if(strlen($_GET['Search'])>2){
  ucwords($_GET['Search']);
    $s='%'.$_GET['Search'].'%';
   
$searchproduct=$connexion->prepare('SELECT * 
from produit 
where nom_pro like ? ');
$searchproduct->execute(array($s));
$product=$searchproduct->fetch();
if(!empty($product)){
    $donne=TRUE;
?>

 <table class='table container mt-5'>

 <thead class='bg-dark text-light mt-4' >
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
<?php
$product=$connexion->prepare('SELECT * 
from produit as p
left join categorie as c
on c.id_cat =p.id_cat
left join marque as m
on m.id_mar =p.id_mar
where p.nom_pro like ? ');
$product->execute(array($s));
?>
 <tbody>
 <?php while($ligne1=$product->fetch()){?>
 <tr><td><?php echo $ligne1["id_pro"]?></td>
 <td><?php echo $ligne1["nom_pro"]?> </td>
 <td><?php echo $ligne1["prix"]?></td>
 <td><?php echo $ligne1["quantite"]?></td>
 <td><img style='width:40px; height:40px' src="<?php echo $ligne1["photo"]?>"></td>
 <td><?php echo $ligne1["nom_mar"]?></td>
 <td><?php echo $ligne1["nom_cat"]?></td>
 <td><a id='modify' href='modify.php?id_pro=<?php echo $ligne1["id_pro"]?>' ><i class="fa-solid text-dark fa-pen"></i></a></td>
<td><a id='delete' href='delete.php?id_pro=<?php echo $ligne1["id_pro"]?>' ><i class="fa-solid text-dark fa-trash-can"></i></a></td>
</tr>
  <?php } ?>
 </tbody>

 </table>


<?php

}

//------------------searh in categorie----------------------------
$searchcategorie=$connexion->prepare('SELECT *
FROM categorie 
WHERE nom_cat LIKE ? ');
$searchcategorie->execute(array($s));
$categorie=$searchcategorie->fetch();
 if(!empty($categorie)){
    $donne=TRUE;
    ?>
    <table class='table  container mt-4'>

<thead>
<tr>

<th>Category's name</th>
<th>Date</th>
<th>Description</th>
<th>Modify</th>
<th>Delete</th>
</tr>

</thead>

<tbody>		

<?php
$searchcategorie=$connexion->prepare('SELECT distinct c.*
FROM categorie as c
left join produit as p
on c.id_cat =p.id_cat
left join marque as m
on m.id_mar =p.id_mar
WHERE c.nom_cat LIKE ?
');
$searchcategorie->execute(array($s)); 
 while($ligne2=$searchcategorie->fetch()){?>
<tr>

<td><?php echo $ligne2["nom_cat"]?></td>
<td ><?php echo $ligne2["dateCategorie"]?></td>
<td <?php if(empty($ligne2["descr"])){ echo 'style="background-color:lightgrey"';}?>><?php echo $ligne2["descr"]?></td>
<td ><a id='modify' href='modify.php?id_cat=<?php echo $ligne2["id_cat"]?>' class='text-dark'><i class="fa-solid fa-pen"></i></a></td>
<td><a href='delete.php?id_cat=<?php echo $ligne2["id_cat"]?>&page=AddCategory' id='delete' class='text-dark' ><i class="fa-solid  fa-trash-can"></i></a></td>
</tr>


  <?php } ?>
</tbody>

</table>




    <?php

}
 //------------------searh in brand----------------------------
 $searchmarque=$connexion->prepare('SELECT *
 from marque 
 where nom_mar like ? ');
$searchmarque->execute(array($s));
$marque=$searchmarque->fetch();

 if(!empty($marque)){
    $donne=TRUE;
    ?>
    <table class='table  container mt-4'>

<thead class='bg-dark text-light'>
<tr>
<th>ID Brand</th>
<th>Brand name</th>
<th>Date</th>
<th>Description</th>
<th>Modify</th>
<th>Delete</th>
</tr></thead>

<tbody>
<?php
 $mar=$connexion->prepare('SELECT distinct  m.*
 from marque as m
 left join produit as p
 on p.id_mar = m.id_mar
 left join categorie as c
 on c.id_cat =p.id_cat
 where m.nom_mar like ?  
  ');
$mar->execute(array($s));
 while($ligne3=$mar->fetch()){?>
<tr>
<td><?php echo $ligne3["id_mar"]?></td>
<td><?php echo $ligne3["nom_mar"]?></td>
<td><?php echo $ligne3["startDate"]?></td>
<td><?php echo $ligne3["descr"]?></td>
<td><a id='modify' href='modify.php?id_mar=<?php echo $ligne3["id_mar"]?>&page=search' ><i class="fa-solid  text-dark fa-pen"></i></a></td>
<td><a  href='delete.php?id_mar=<?php echo $ligne3["id_mar"]?>&page=search'  ><i class="fa-solid text-dark fa-trash-can"></i></a></td>
</tr>
  <?php } ?>
</tbody>

</table>
    <?php
 }



}
if($donne==FALSE or strlen($_GET['Search'])<3){ ?>
    <div class="alert alert-warning text-center h5 mt-3 ">
    No item found !!! , Be more specific in your search to get better results . <i class="fa-solid fa-magnifying-glass-minus"></i>
    </div>
     <?php
    }

?>
</body>
</html>