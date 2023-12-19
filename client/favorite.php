<?php 
session_start(); 
if (!isset($_SESSION["login"])) {
    header("location:logine.php");
}
    require("connexion.php");

    $favReq = $connexion -> prepare("SELECT f.id_pro, p.nom_pro,p.photo,p.prix from produit as p inner join favorite as f on p.id_pro = f.id_pro where f.user_name = ?");
    $favReq -> execute(array($_SESSION["login"]));

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
            <a href="cart_shopping.php">
                <i class="fa-solid fa-cart-shopping fa-xl">
                    <!-- numbre of product in cart-->
                    <span class="num_product"></span>
                </i>
            </a>

        </div>
        </div>
    </nav>

    <?php 
        if(isset($_GET["msg"])){
    ?>
    <div class="alert alert-muted text-warning">
        <?php echo $_GET["msg"];?>
    </div>
    <?php }?>



    <div class="container mt-5">

    <table class="table text-center font-monospace mt-5 ">
        <thead >
            <tr  class="text-center">
                <th class="taxt-secondary">PHOTO</th>
                <th class="taxt-secondary">NAME</th>
                <th class="taxt-secondary">PRICE</th>
                <th class="taxt-secondary">ACTION</th>
            </tr>
        </thead>
        <tbody class="" >
        <?php while($row=$favReq->fetch(PDO::FETCH_OBJ)){?>
                <tr >
                    <td><img src="<?php echo $row->photo?>" alt="" style="width:70px;hieght:50px;"></td>
                    <td><?php echo $row->nom_pro ?></td>
                    <td><?php echo $row->prix ?></td>
                    <td><a href="suprimerFav.php?idPro=<?php echo $row->id_pro ?>" class=" btn btn-warning fw-bold text-white " >Remove</a></td>
                </tr>
            <?php };?>
        </tbody>
    </table>


    <div class="d-flex justify-content-between">
       <a href="acceuil.php" class="text-decoration-none text-secondary border-bottom border-4 border-dark my-5">Continue shopping</a>
    </div>
    
    </div>
    
</body>
</html>