<?php 
require("connexion.php");
session_start();
// $requete=$connexion->prepare("SELECT *
//  from responsable as res 
//  INNER JOIN compte as com 
//  on com.id_client=res.id_res
//   where com.login=? ");
// $requete->execute($_SESSION['login']);
// $f=$requete->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My account</title>
    <link href="bootstrap.min.css" rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<style>
   
     .logo{
        width:200px;
        height:50px;
      }
      
      .btn{
        background-color:#EB5E29;
        width:100px;
        font-weight:bold;
    }
    #return{
      text-decoration:none;
    color:white;    }
      .fa-user{
  font-size:20px;
  margin-right:20px;
}
li a:hover{background-color:#EB5E29;}
.dropdown-item:hover {
  color:#EB5E29;
  border-bottom: 1px solid #EB5E29}
.bg-orange{
  background-color:#EB5E29;
}


    .lin:hover{
        /* background-color:  rgb(238, 238, 238); */
        width: 100%;
        display: flex;
      align-items: center;
        border-left: solid 5px #ff5900;
        height: 40px;
        color:black;
    }
    .lin{
     
   
      width: 100%;
      display: flex;
      align-items: center;
      height: 40px;
      
    }
    a{
      text-decoration: none;
      margin-left: 10px;
    }
    a:hover{
      text-decoration: none;

      margin-left: 30px;
      color:black;
    }

</style>   
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)"><img class='logo' src="logo/logo2.png"></a>

    
      <div class="dropdown dropstart text-end">
      <a class="nav-link text-dark" data-bs-toggle="dropdown" href="#"><i class="fa-solid fa-user"></i></a>

  <ul class="dropdown-menu bg-light">
    <li><a class="dropdown-item bg-light " href="logout.php">Log out</a></li>
  </ul>
</div>
         </div>
  </div>
</nav>





    <?php

$_SESSION['login']='s_hatmi@gmail.com';
    if (isset($_POST["ch"])) { 
        
        $re=$connexion->prepare("UPDATE responsable SET nom_responsable=?,prenom_responsable=?,adress=?,email=?,num_tele=? ");
        $re->execute(array($_POST["nome"],$_POST["prenom"],$_POST["adrs"],$_POST["email"],$_POST["tel"]));
        // header("location:modifyaccount.php?msg=modifier valid");
           }?>
<?php
if(!isset($_SESSION['login'])){
  header('location:logine.php');
}
   $r=$connexion->prepare("SELECT * 
   from responsable 
   where email=?  ");
   $r->execute(array($_SESSION['login']));
   $d=date("h");
   if ($d<12) {
    $bonjour="Bonjour ";
   }else{
    $bonjour="Bonsoir " ;
   }
  
    ?>





<?php
$l=$r->fetch();?>

    <?php
if (isset($_GET["msg"])) {?>
<div class="alert alert-success "   id="c" > <?php echo $_GET["msg"]?></div>

<script>
  setTimeout(() => {
    document.getElementById("c").remove() 
   
  }, 2000);
</script>
  <?php 
}?>
<div class="d-flex justify-content-center container-fluid " style='margin-top:-50px;'>
    <div class="card col-8 " style="background-color: aliceblue; border-radius: 20px; margin-top: 70px;height: 500px;">
        <div class="nav justify-content-start" style="border-radius: 20px 20px 0px 0px; background-color: black;color:white">
          <h3 class="d-flex flex-wrap align-content-center" style="margin-left: 30px;color: aliceblue; font-style: italic; height: 50px;"><?php echo  $bonjour ?><?php echo $l["nom_responsable"] ?> <?php echo $l["prenom_responsable"] ?>! <br></h4> 
</h3>
</div>
        <div class="row" style="margin-left: 0.1px;">
            <div   style="border-radius: 0px px 0px 0px;background-color:black ;height:442px; width: 20.1%;"><br>
                  
                    <h5 id="nom" style="display: none;"><?php echo $l["nom_responsable"] ?> <?php echo $l["prenom_responsable"] ?></h5>
                    <span class="lin" style="background-color:; width: 100%"><a style="font-weight:bold"class='text-light' href="modifyaccount.php"  >Profile</a></span>
                    <span class="lin" style="background-color:; width: 100%"><a style="font-weight:bold" class='text-light 'href="acceuiL.php">Home</a></span>

            </div>
            <div    style="background-color:;width: 78.4%;">
            <div style="margin-left: 107px;"><br>
              <div id='info' class='mt-5'>
                <h5>Full name:</h5>
                <p class='font-monospace mt-2'><?php echo $l["nom_responsable"].' '.$l["prenom_responsable"]  ?></p>
                <h5>Address:</h5>
                <p class='font-monospace'><?php echo $l["adress"]  ?></p>
                <h5>Phone number:</h5>
                <p class='font-monospace'><?php echo  $l["num_tele"] ?></p>
                <h5>Email:</h5>
                <p class='font-monospace'><?php echo $l["email"] ?></p>
	
              </div>
               <script src="jquery-2.0.2.min.js"></script>
               <script>
                $(document).ready(function () {
                    $("#modif").click(function () {
                      $("#modif").hide();
                        $("#info").hide();
                        // $("#nom").hide();
                        $("#formiler").show();
                    })})
                
            </script>
               <center>
                <div id="info"  style="margin-left: -100px;">
               
   <input type="button" value="modifier" id="modif" class="btn"  style="color: aliceblue; background-color: #ff5900;"></div>

                </div>
               </center>
                 <div class="col-7 mt-4" id="formiler" style="display: none;margin-left:100px">
                  <form action="" method="post">
                  <label  style="color: #ff5900;" for="">First name</label> 
                    <input type="text" name="nome" value="<?php echo $l["nom_responsable"] ?>"  class="form-control" placeholder="First name" height="30px" id="">
                    <label style="color: #ff5900;"  for="">Last name</label>
                    <input type="text" name="prenom" value="<?php echo $l["prenom_responsable"] ?>"  class="form-control" placeholder="Last name" height="30px" id="">
                    <label style="color: #ff5900;" for="">Address </label>
                    <input type="text" name="adrs" value="<?php echo $l["adress"] ?>"  class="form-control" placeholder="Address" height="30px" id="">
                    <label style="color: #ff5900;" for="">EMAIL</label>
                    <input type="email" name="email" value="<?php echo $l["email"] ?>"  class="form-control" height="30px" placeholder="Email123@gmail.com" id="">
                    <label style="color: #ff5900;" for="">Phone number</label>
                    <input type="text" name="tel" value="<?php echo $l["num_tele"] ?>"  class="form-control" height="30px" placeholder="+212-6XXXXXXXX || 06-XXXXXXXX" id="">
                    <input type="submit"  name="ch" value="Modify" class="btn mt-4" onclick="return confirm('valide la modification')" style="background-color: #ff5900;">
                
                  </form>
                   </div>
            </div></div>
        </div>
    </div>
</div>

    
   </body>
</html>