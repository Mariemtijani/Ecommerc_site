<?php 
require("connexion.php");
session_start(); 
if (!isset($_SESSION["login"])) {
    header("location:logine.php");
}

//select id client 
$clientReq = $connexion -> prepare("SELECT id_client from client where email=?");
$clientReq -> execute(array($_SESSION["login"]));
$id_client = $clientReq -> fetch(PDO::FETCH_OBJ); 

 //select info client  from livraison
 $selectReq = $connexion -> prepare("SELECT  c.num_tele, c.nom_client,c.prenom_client,l.* FROM livraison as l
 inner join client as c on c.id_client = l.id_client where  l.email=?");
 $selectReq -> execute(array($_SESSION["login"]));
 $clientInfo = $selectReq -> fetch(PDO::FETCH_OBJ);

  //select items  from panier
 $shoppReq = $connexion -> prepare("SELECT pa.id_pro,p.nom_pro ,p.photo ,p.prix,pa.quantite  from produit as p 
 inner join panier as pa on p.id_pro = pa.id_pro where user_name = ?");
 $shoppReq -> execute(array($_SESSION["login"]));
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/de53ea4f27.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assest/bootstrap.min.css">
    <link rel="stylesheet" href="assest/style.css">
</head>
<body>
      <!--Navigation---------------------------------->
      <nav class="">
        
        <div class="navigation">
            <!--  logo  -->
            <a href="#" class="logo"><img src="images/logo2.png" alt="""></a>
            

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

    <div class="container my-5">
         <h1 class="text-center" style="color:ef6817;">Congratulations!Your payment has been succesully processed.</h1>
         <div class='container d-flex justify-content-between my-5'>
            <div class="info-personel card  ">
            <div class="card-header"> <h4>Your information</h4>
        </div>
        <div class="card-body">
 
            <h5 class='mt-5'>First name:</h5>
                <span class='font-monospace mt-2'><?php echo $clientInfo-> prenom_client?></span>
                <h5>Last name:</h5>
                <span class='font-monospace mt-2'><?php echo $clientInfo-> nom_client?></span>
               
                <h5>Address:</h5>
                <span class='font-monospace mt-2'><?php echo $clientInfo-> adress?></span>
               
                <h5>Phone number:</h5>
                <span class='font-monospace mt-2'><?php echo $clientInfo-> num_tele?></span>
               
                <h5>Email:</h5>
                <span class='font-monospace mt-2'><?php echo $clientInfo-> email?></span>
               
            </div>
         </div>
            <div class="items card">
                <table class="table table-striped">
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Price</th>
                    </tr>
                    <?php while($row=$shoppReq->fetch()){?>
                    <tr>
                      <td><img style='width:100px' src="<?php echo $row['photo']?>" alt=""></td>
                      <td><?php echo $row['nom_pro']?></td>
                      <td><?php echo $row['prix']?></td>
                    </tr>
                    <?php }?>
                </table>
            </div>
         </div>
    </div>
    
   
</body>
</html>