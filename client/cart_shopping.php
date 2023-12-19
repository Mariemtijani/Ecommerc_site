<?php 
session_start(); 
if (!isset($_SESSION["login"])) {
    header("location:logine.php");
}
    require("connexion.php");

    $shoppReq = $connexion -> prepare("SELECT pa.id_pro ,p.nom_pro ,p.photo ,p.prix,pa.quantite  from produit
     as p inner join panier as pa on p.id_pro = pa.id_pro where  user_name = ?");
    $shoppReq -> execute(array($_SESSION["login"]));
    

    //count items 
    $countReq = $connexion -> prepare("SELECT  count(*) as itemCount, sum(p.prix * pa.quantite) as totalPrix from produit as p inner join panier as pa on p.id_pro = pa.id_pro where user_name = ?");
    $countReq -> execute(array($_SESSION["login"]));
    $items = $countReq->fetch(PDO::FETCH_OBJ);
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
    <!--JQUERY-->
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/Jquery.js"></script>
     <!-- ajax js-->
     <script src="js/ajax.js"></script>
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

    <?php 
        if(isset($_GET["msg"])){
    ?>
    <div class="alert alert-muted text-warning">
        <?php echo $_GET["msg"];?>
    </div>
    <?php }?>



    <div class="container mt-5">
       <div class="d-flex justify-content-between">
           <div>
               <h1 class="d-inline me-5 fw-3">Your Cart</h1>
               <span><?php echo $items -> itemCount ?> items</span>
            </div>
            <div>
                <span class="me-5"> Total</span>
                <h1 class="d-inline text-muted me-5 "><span class="text-dark final-price"><?php echo $items -> totalPrix ?></span> MAD</h1>
            </div>
    </div>

    <table class="table mt-5">
        <thead>
            <tr>
                <th class="taxt-secondary">PHOTO</th>
                <th class="taxt-secondary">NAME</th>
                <th class="taxt-secondary">PRICE</th>
                <th class="taxt-secondary">QUANTITY</th>
                <th class="taxt-secondary">TOTAL</th>
                <th class="taxt-secondary">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row=$shoppReq->fetch(PDO::FETCH_OBJ)){?>
                
                <tr class="parent">
                    <td><img src="<?php echo $row->photo?>" alt="" style="width:70px;hieght:50px;"></td>
                    <!-- name -->
                    <td><?php echo $row->nom_pro ?></td>
                    <!-- price -->
                    <td class="prix"><?php echo $row->prix ?></td>
                    <!-- quantite -->
                    <td class="">
                       
                        <div class="input-group mb-3 " style="width:130px;">
                        
                            <form  method="post" id="myform<?php echo $row->id_pro ?>" class="d-flex justify-content-center">
                                <input type="hidden" id="id" name="idPro" value="<?php echo $row->id_pro ?>">
                            
                                <a  class="btn btn-light border border-0 input-group-text  decrement-btn" onclick="decrementQunti('myform<?php echo $row->id_pro?>')" >-</a>

                                <input   class="form-control text-center border border-0   input-q " style="width:50px;"  value="<?php echo $row->quantite ?>"disabled>
                                

                                <a class="btn btn-light border border-0 input-group-text  increment-btn" onclick="incrementQunti('myform<?php echo $row->id_pro?>')" >+</a>
                                </form>
                            
                        </div>
                    </td>
                    <!-- total  -->
                    <td class="total-prix"><?php echo $row->quantite * $row->prix ?></td>

                    <td><a href="suprimerPanier.php?idPro=<?php echo $row->id_pro ?>" class=" btn btn-light fw-bold text-warning ">Remove</a></td>
                </tr> 
            <?php };?>
        </tbody>
    </table>


    <div class="d-flex justify-content-between">
       <a href="acceuil.php" class="text-decoration-none text-secondary border-bottom border-4 border-dark my-5">Continue shopping</a>
       <a href="paiment.php" class="btn text-white px-3 py-2 fw-bolder my-5" style="background-color:#eb5e28;" type="submit">Go to paiment</a>
       
    </div>
    
    </div>
    <script>
        $(document).ready(function(){

           

            $(".increment-btn").click(function(){

                var quant =$(this).closest(".parent").find(".input-q").val();
                var prix =parseInt($(this).closest(".parent").find(".prix").text());
                var total =parseInt($(this).closest(".parent").find(".total-prix").text());
                var finalPrice = parseInt($(".final-price").text());
               
                
                
                quant ++;
                $(this).closest(".parent").find(".input-q").val(quant);
                $(this).closest(".parent").find(".total-prix").text(total + prix);
                $(".final-price").text(finalPrice + prix)
               
            })

            $(".decrement-btn").click(function(){

                var quant =$(this).closest(".parent").find(".input-q").val();
                var prix =parseInt($(this).closest(".parent").find(".prix").text());
                var total =parseInt($(this).closest(".parent").find(".total-prix").text());
                var finalPrice = parseInt($(".final-price").text());
               
                if(quant > 1){
                    quant --;
                   $(this).closest(".parent").find(".input-q").val(quant);
                   $(this).closest(".parent").find(".total-prix").text(total - prix);
                   $(".final-price").text(finalPrice - prix)
                }
                else{
                    quant = 1 ;
                   $(this).closest(".parent").find(".input-q").val(quant);
                   $(this).closest(".parent").find(".total-prix").text(total - prix);
                   $(".final-price").text(finalPrice - prix)
                
                }
               

                })
        })
    </script>

    
    
</body>
</html>