<?php 
require("connexion.php");
session_start();
$requete=$connexion->prepare("SELECT *
 from  categorie 
 order by dateCategorie ");
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
        <input class="form-control-sm me-3 ms-3" type="text" placeholder="Search">
        <input type="submit" name='Search' value='Search'class='btn btn-dark btn-sm mb-1 me-3'>
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

<!----------------------------------------pageaddCategorie--------------------------------------->


<div class='container-fluid row ' id="pageaddCategorie">
  
    <form action="ActionADD.php" class='form ms-5 col-10'>
      
        <label for=""class='form-label mt-5 ms-5 '>Categorie :</label>
        <input type="text" class='form-control ms-5' name="Categorie" id="">
        <label for=""class='form-label mt-2 ms-5 '>Date :</label>
        <input type="date" class='form-control ms-5' name="DateCategorie" id="">
        <label class='form-label mt-2 ms-5' for="">Description :</label>
        <textarea class='form-control mb-3 ms-5' name="descriptionCategorie" id="" cols="10" rows="5"></textarea>
        <input type="submit" class="btn btn-dark ms-5 mb-5 mt-1" value="Add Categorie">
   
      </form>
     
   
    </div>
    <button class="btn btn-dark ms-5 mb-5 mt-4" id='ShowCategory'>Show Category</button>
    <!-- ------------------ alert  ----------------- -->
    <?php if(isset($_GET['msgok'])||isset($_GET['msgerror'])){?>
<div <?php if(isset($_GET['msgok'])){echo  'class="alert alert-success alert-dismissible fade show"';}
else{echo  'class="alert alert-danger alert-dismissible fade show"';} ?>>
<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
<?php if(isset($_GET['msgok'])){ echo $_GET['msgok'] ;}
else{ echo $_GET['msgerror'];}?></div>
<?php }?>


<!--------------------list of Category ------------------->
<div id='lisCategory'>
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
<td><a href='delete.php?id_cat=<?php echo $ligne["id_cat"]?>&page=AddCategory' id='delete' class='text-dark' ><i class="fa-solid  fa-trash-can"></i></a></td>
</tr>
  <?php } ?>
</tbody>

</table>

</div>





<script>
  $(document).ready(function(){
    $('#delete').click(function(){
      var conf=confirm('Do you want to remove this item ?');
      if(conf){
 $('#delete').attr('href','removeitem.php?idcat=<?php $ligne["id_cat"]?>')
      }
    })


  })
</script>


    <script>
    $(document).ready(function(){
    $("#ShowCategory").click(function(){
    $("#lisCategory").fadeToggle();
    $("form").slideToggle();
  })});
 </script>



</body>
</html>