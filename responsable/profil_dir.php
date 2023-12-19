<?php
require("connexion.php");
session_start();
$_SESSION['login']='s_hatmi@gmail.com';
    if (isset($_POST["ch"])) { 
        
        $re=$connexion->prepare("UPDATE responsable SET nom_responsable=?,prenom_responsable=?,adress=?,email=?,num_tele=? ");
        $re->execute(array($_POST["nome"],$_POST["prenom"],$_POST["adrs"],$_POST["email"],$_POST["tel"]));
        header("location:profil.php?msg=modifier valid");
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
<!doctype html>
<html lang="en">

<head>
  <title>Profile de responsable</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <link rel="stylesheet" href="bootstrap.min.css">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
        <script src="https://kit.fontawesome.com/de53ea4f27.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style2.css">
    <!--JQUERY-->
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/Jquery.js"></script>
     <!-- ajax js-->
     <script src="js/ajax.js"></script>
<style>
    .lin:hover{
        background-color:  rgb(238, 238, 238);
        width: 100%;
        display: flex;
      align-items: center;
        border-left: solid 5px #ff5900;
        height: 40px;
    }
    .lin{
     
      
      width: 100%;
      display: flex;
      align-items: center;
      height: 40px;
      
    }
    a{
      text-decoration: none;
      color: rgb(58, 58, 58);
      margin-left: 10px;
    }
    a:hover{
      text-decoration: none;
      color: rgb(58, 58, 58);
      margin-left: 10px;
    }
</style>
</head>

<body>


<?php
$l=$r->fetch();?>
     <nav class="">
        
        <div class="navigation">
            <!--  logo  -->
            <a href="#" class="logo"><img src="logo/logo2.png" alt="""></a>
            

        <!-- Menu -->
        <div class="menu">

            <!-- Home -->
            <a href="acceuil.php">
                <i class="fa-solid fa-house fa-xl"></i>
            </a>
            <!-- user -->
            <a href="logine.php">
                <i class="fa-solid fa-circle-user fa-xl"></i>
            </a>
            <!-- favorite -->
            <a href="favorite.php">
                <i class="fa-solid fa-heart fa-xl"></i>
            </a>
            <!-- cart -->
            <a href="#">
                <i class="fa-solid fa-cart-shopping fa-xl">
                </i>
            </a>

        </div>
        </div>
    </nav>
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
    <div class="card col-8 " style="background-color: aliceblue; border-radius: 20px; margin-top: 100px;height: 710px;">
        <div class="nav justify-content-start" style="border-radius: 20px 20px 0px 0px; background: #ff5900;">
          <h3 class="d-flex flex-wrap align-content-center" style="margin-left: 30px;color: aliceblue; font-style: italic; height: 50px;"><?php echo  $bonjour ?><?php echo $l["nom_responsable"] ?> <?php echo $l["prenom_responsable"] ?>! <br></h4> 
!</h3>
</div>
        <div class="row" style="margin-left: 1px;">
            <div   style="border-radius: 0px px 0px 0px;background-color: rgb(255, 247, 247);height: 636px; width: 20.1%;"><br>
                <!-- <center> <img  src="<?php echo $l["photo"] ?>" height="120px" width="120px" class="rounded-circle " alt="Cinque Terre"></center> -->
                <div style="margin-left: 7px;"><br>
                    <h5 id="nom" style="display: none;"><?php echo $l["nom_responsable"] ?> <?php echo $l["prenom_responsable"] ?></h5><br><br><br>
                    <div class="lin" style="background-color:rgb(191, 191, 191) width: 100%"><a href="acceuil.php"  >home</a></div><br>
                    <div class="lin" style="background-color:rgb(191, 191, 191) width: 100%"><a href="favorite.php" >favorite</a></div><br>
                    <div class="lin" style="background-color:rgb(191, 191, 191) width: 100%"><a href="acceuil.php">home</a></div><br>

                </div>
            </div>
            <div    style="background-color: rgb(247, 247, 247);width: 78.4%;">
            <div style="margin-left: 107px;"><br>
              <div id='info'>
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
                 <div class="col-7" id="formiler" style="display: none;">
                  <form action="" method="post">
                  <label  style="color: #ff5900;" for="">First name</label><br>
                    <input type="text" name="nome" value="<?php echo $l["nom_client"] ?>"  class="form-control" placeholder="First name" height="30px" id=""><br>
                    <label style="color: #ff5900;"  for="">Last name</label><br>
                    <input type="text" name="prenom" value="<?php echo $l["prenom_client"] ?>"  class="form-control" placeholder="Last name" height="30px" id=""><br>
                    <label style="color: #ff5900;" for="">Address </label><br>
                    <input type="text" name="adrs" value="<?php echo $l["adr_client"] ?>"  class="form-control" placeholder="Address" height="30px" id=""><br>
                    <label style="color: #ff5900;" for="">EMAIL</label><br>
                    <input type="email" name="email" value="<?php echo $l["email"] ?>"  class="form-control" height="30px" placeholder="Email123@gmail.com" id=""><br>
                    <label style="color: #ff5900;" for="">Phone number</label><br>
                    <input type="text" name="tel" value="<?php echo $l["num_tele"] ?>"  class="form-control" height="30px" placeholder="+212-6XXXXXXXX || 06-XXXXXXXX" id=""><br>
                    <input type="submit"  name="ch" value="MODIFIER" class="btn" onclick="return confirm('valide la modification')" style="background-color: #ff5900;">
                
                  </form>
                   </div>
            </div></div>
        </div>
    </div>
</div>
   



















</body>

</html>