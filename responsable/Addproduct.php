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
    <title>Add product</title>
    <link href="bootstrap.min.css" rel='stylesheet'>
    <link href="style.css" rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
 
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
        <input class="form-control-sm me-3 ms-3" name='Search'type="text" placeholder="Search">
        <input type="submit" value='Search'class='btn btn-dark btn-sm mb-1 me-3'>
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

 <!----------------------------------------pageaddProduct--------------------------------------->
<div class='container-fluid row ' id="pageaddProduct">
  
    <form action="ActionADD.php" method='POST' enctype='multipart/form-data' class='form ms-5 col-10'>
    <div class="row">
    <div class='col-6'>
        <label for=""class=' form-label mt-3 ms-5 '>Product's name :</label>
        <input type="text" class='form-control ms-5' name="Pname" id="">
        <label for=""class=' form-label mt-2 ms-5'>Sell Price :</label>
        <input type="text" class='form-control ms-5' name="SellPrice" id="">
        <label for=""class='form-label mt-2 ms-5'>Purchase Price :</label>
        <input type="text" class='form-control ms-5' name="PurchasePrice" id="">

        <label for=""class=' form-label mt-2 ms-5'>Quantity :</label>
        <input type="text" class='form-control ms-5' name="stock" id="">
        <label for=""class='form-label mt-3 ms-5'>Image :</label>
        <input type="file" class='form-control ms-5' name="image" >  
      </div>
        <div class='col-6'>
        <label for=""class='form-label mt-3 ms-5'>Brand :</label>
        <select name="Brand" id="" class=' form-select ms-5'>
        <?php while($ligne1=$requete1->fetch()){?>
  <option value="<?php echo $ligne1["id_mar"]?>" ><?php echo $ligne1["nom_mar"]?></option>
  <?php } ?>
        </select>
        <label for=""class='form-label mt-1 ms-5'>Category :</label>
        
        <select name="Category" id="" class='form-select ms-5'>
<?php while($ligne2=$requete->fetch()){?>
  <option value="<?php echo $ligne2["id_cat"]?>"><?php echo $ligne2["nom_cat"]?></option>
  <?php } ?>
        </select>
       
       
  <br><label class='form-label  ms-5' for="">Purchase Date :</label>
     <input type="date" name="purchasedate" id="" class="ms-5 form-control">

        <label class='form-label  ms-5' for="">Description :</label>
        <textarea class='form-control col-5  ms-5' name="descriptionproduct" id="" cols="10" rows="4"></textarea>
        </div>
   
    </div> 
    <input type="submit" class="btn mt-3 btn-dark  ms-5" value="Add product">
  </div> 
      </form>
   
    </div>




<?php if(isset($_GET['msg'])){?>
<div class="alert alert-warning"><?php echo $_GET['msg'] ?></div>

<?php }?>


</body>
</html>