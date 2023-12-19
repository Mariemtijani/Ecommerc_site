<?php
session_start(); 
if (isset($_SESSION["login"])) {
    header("location:acceuil.php");
}

    require("connexion.php");

    $phoneReq = $connexion -> prepare("SELECT * FROM produit WHERE id_cat=?");
    $phoneReq -> execute(array(1));

    $tabletReq = $connexion -> prepare("SELECT * FROM produit WHERE id_cat=?");
    $tabletReq -> execute(array(2));

    $laptobReq = $connexion -> prepare("SELECT * FROM produit WHERE id_cat=?");
    $laptobReq -> execute(array(3));

    $watchReq = $connexion -> prepare("SELECT * FROM produit WHERE id_cat=?");
    $watchReq -> execute(array(4));

    $headReq = $connexion -> prepare("SELECT * FROM produit WHERE id_cat=?");
    $headReq -> execute(array(5));

    // $cartNumber = $connexion -> prepare("SELECT count(*) as nomber from panier where user_name=?");
    // $cartNumber -> execute(array($_SESSION["login"]));
    // $donnee = $cartNumber -> fetch(PDO::FETCH_OBJ);
    // $nomber = $donnee -> nomber;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronic web site</title>

    <!--stylesheet-->
    <link rel="stylesheet" href="assest/bootstrap.min.css">
    <link rel="stylesheet" href="assest/style.css">
    <!--Light slider css-->
    <link rel="stylesheet" href="assest/lightslider.css">
    <!--icon-->
    <script src="https://kit.fontawesome.com/de53ea4f27.js" crossorigin="anonymous"></script>
    <!--JQUERY-->
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/Jquery.js"></script>
    <!--light slider js-->
    <script src="js/lightslider.js"></script>
    <!-- ajax js-->
    <script src="js/ajax.js"></script>
</head>

<body>
    <!--Navigation---------------------------------->
    <nav class="">
        <!--social link and phone number-->
        <div class="social-links">
            <div class="social">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </div>
            <div class="phone">
                <span>Call +212602020210</span>
            </div>
        </div>
        <div class="navigation">
            <!--  logo  -->
            <a href="#" class="logo"><img src="images/logo2.png" alt=""></a>
            

            <!-- Search bar -->
            <div class=" search_bar">
                <script>
                    $(document).ready(function () {
                        $("#inputsearch").focus(function () {
                            $("#search").show().css({
                        width: "100px",
                        background: "#ef6817",
                        color:"#ffffff"

                    }) ;
                         
                        });
                       
                    })
                </script>
                 <script>
                    $(document).ready(function () {
                        $("#search").click(function () {
                            var c=$("#shir").val();
                            $("#search").val(c);
                            $("#group_simple").toggle();
                            $("#group_sorche").toggle();
                        })})
                    
                </script>
             
             <form action="" method="post">
             <table class="col-6">
                <tr><input type="hidden" name="show" value="">
                <input type="hidden" name="hide" value="">
                    <td class="col-6"><input type="text" name="shir" id="inputsearch" placeholder="Search for products ...." class="form-control" style="width: 400px; margin-right:0px"></td>
                    <td class="col-1"><input type="submit" value="Search" id="search" style="display: none;margin-right:200px" class="btn " ></td></tr>
             </table>
             </form>
        </div>

        <!-- Menu -->
        <div class="menu">

            <!-- Home -->
            <a href="#">
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
                    
                </i>
            </a>

        </div>
        </div>
    </nav>

    <!--************* Slider section ********************-->

    <ul id="adaptive" class="cs-hidden">
        <!-- Box 1 -->
        <li class="item-a">
            <div class="slider-box ">
                <!--slider text-->
                <div class="slider-text">
                    <span class="">Limited offer</span>
                    <strong>30% off <br> with<font> promo code</font></strong>
                    <a href="#" class="slider-btn">Shop Now</a>
                </div>
                <div class="slide-img">
                    <img src="images/iphon.jpg" alt="">
                </div>
            </div>
        </li>
        <!-- Box 2 -->
        <li class="item-b">
            <div class="slider-box ">
                <!--slider text-->
                <div class="slider-text">
                    <span class="">Limited offer</span>
                    <strong>30% off <br> with<font> promo code</font></strong>
                    <a href="#" class="slider-btn">Shop Now</a>
                </div>
                <div class="slide-img">
                    <img src="images/lenovo1.png" alt="">
                </div>
            </div>
        </li>
        <!-- Box 3 -->
        <li class="item-b">
            <div class="slider-box ">
                <!--slider text-->
                <div class="slider-text">
                    <span class="">Limited offer</span>
                    <strong>30% off <br> with<font> promo code</font></strong>
                    <a href="#" class="slider-btn">Shop Now</a>
                </div>
                <div class="slide-img">
                    <img src="images/apple.png" alt="">
                </div>
            </div>
        </li>
    </ul>
    <div id="group_simple" style="display: <?php if (isset($_POST["show"])) {
   echo "none;";
}else{
    echo ";";
}?>">

    
    <!--Categorie************************-->

    <div class="categorie-header">
        <h2><span>Featured categories</span></h2>
    </div>

    <ul id="cat">
        <!-- All *****************-->
         <li class="item" id="allitem">
            <div class="categorie-box">
                <a href="#">
                    <i class="fa-solid fa-border-all fa-2xl" style=" color: #ef6817;"></i>
                </a>

            </div>
            <!--Text------------------->
            <span>All Product</span>
        </li>
        <!--1**********************-->
        <li class="item" data-category="phone">
            <div class="categorie-box">
                <a href="#">
                    <i class="fa-solid fa-mobile fa-2xl" style=" color: #ef6817;"></i>
                </a>

            </div>
            <!--Text------------------->
            <span>Phone</span>
        </li>

        <!--******** 2 **********************-->
        <li class="item" data-category="laptob">
            <div class="categorie-box">
                <a href="#">
                    <i class="fa-solid fa-computer fa-2xl" style=" color: #ef6817;"></i>
                </a>

            </div>
            <!--Text------------------->
            <span>Labtop</span>
        </li>

        <!-- ************** 3 **********************-->
        <li class="item" data-category="tablet">
            <div class="categorie-box">
                <a href="#">
                    <i class="fa-solid fa-tablet-screen-button fa-2xl " style=" color: #ef6817;"></i>
                </a>

            </div>
            <!--Text------------------->
            <span>Tablet</span>
        </li>

        <!--************ 4 **********************-->
        <li class="item" data-category="watch">
            <div class="categorie-box">
                <a href="#">
                    <i class="fa-solid  fa-watch-apple fa-2xl" style=" color: #ef6817;"></i>
                </a>

            </div>
            <!--Text------------------->
            <span>Watches</span>
        </li>

        <!--************ 5 **********************-->
        <li class="item" data-category="headphone">
            <div class="categorie-box" data-tab="cat5">
                <a href="#">
                    <i class="fa-solid fa-headphones fa-2xl" style=" color: #ef6817;"></i>
                </a>

            </div>
            <!--Text------------------->
            <span>Head Phones</span>
        </li>
    </ul>
   
    <!--********* Products ***************-->

    <div class="products-container">
        <!--Categorie 1 ----------------------->

        <div class="cat-content" data-category="phone">
            <!--Product box  -->
            <?php while($rowP=$phoneReq->fetch(PDO::FETCH_OBJ)){?>
            <div class=" product-box">
                <!-- image ----------->
                <div class="product-img">
                    <!--add Cart------------->

                    <form action="" method="post" id="formP">

                        <input type="hidden" name="idPro" id="idPro" value="<?php echo $rowP -> id_pro?>">
                        <a class="add-cart" onclick="submitForm('formP')">
                           <i class="fa-solid fa-cart-shopping "></i>
                        </a>
                    </form>

                    <!--add to favorite------------->

                     <form action="" method="post" id="formP">

                        <input type="hidden" name="idPro" id="idPro" value="<?php echo $rowP -> id_pro?>">
                        <a  class="add-fav" onclick="favSubmit('formP')"><i class="fa-solid fa-heart "></i></a>
                    </form>

                    
                    <img src="<?php echo $rowP -> photo?>" alt="">
                </div>

                <!--details-->
                <div class="product-detail">
                    <a href="#" class="name"><?php echo $rowP -> nom_pro?></a>
                    <span class="price">$<?php echo $rowP -> prix ?> </span>
                </div>
            </div>
            <?php }; ?>
        </div>

        <!--Categorie 2 ----------------------->

        <div class="cat-content" data-category="laptob">
            <!--Product box  -->
            <?php while($rowL=$laptobReq->fetch(PDO::FETCH_OBJ)){ ?>
            <div class=" product-box">
                <!-- image ----------->
                <div class="product-img">
                    <!--add Cart------------->
                     <form action="" method="post" id="formL">

                        <input type="hidden" name="idPro" id="idPro" value="<?php echo $rowL -> id_pro?>">
                        <a class="add-cart" onclick="submitForm('formL')">
                           <i class="fa-solid fa-cart-shopping "></i>
                        </a>
                    </form>
                    
                    <!--add to favorite------------->
                     <form action="" method="post" id="formL">

                        <input type="hidden" name="idPro" id="idPro" value="<?php echo $rowP -> id_pro?>">
                        <a  class="add-fav" onclick="favSubmit('formL')"><i class="fa-solid fa-heart "></i></a>
                    </form>
                    <img src="<?php echo $rowL -> photo?>" alt="">
                </div>

                <!--details-->
                <div class="product-detail">
                    <a href="#" class="name"><?php echo $rowL -> nom_pro?></a>
                    <span class="price">$<?php echo $rowL -> prix?></span>
                </div>
            </div>
            <?php }?>
        </div>

        <!--Categorie 3----------------------->

        <div class="cat-content" data-category="tablet">
            <!--Product box  -->
            <?php while($rowT=$tabletReq->fetch(PDO::FETCH_OBJ)){ ?>
            <div class=" product-box">
                <!-- image ----------->
                <div class="product-img">
                    <!--add Cart------------->
                     <form action="" method="post" id="formT">

                        <input type="hidden" name="idPro" id="idPro" value="<?php echo $rowT -> id_pro?>">
                        <a class="add-cart" onclick="submitForm('formT')">
                           <i class="fa-solid fa-cart-shopping "></i>
                        </a>
                    </form>
                    <!--add to favorite------------->
                   <form action="" method="post" id="formT">

                        <input type="hidden" name="idPro" id="idPro" value="<?php echo $rowT -> id_pro?>">
                        <a  class="add-fav" onclick="favSubmit('formT')"><i class="fa-solid fa-heart "></i></a>
                    </form>
                    <img src="<?php echo $rowT -> photo?>" alt="">
                </div>

                <!--details-->
                <div class="product-detail">
                    <a href="#" class="name"><?php echo $rowT -> nom_pro?></a>
                    <span class="price">$<?php echo $rowT -> prix?></span>
                </div>
            </div>
            <?php }?>
        </div>
        <!--Categorie 4----------------------->

        <div class="cat-content" data-category="watch">
            <!--Product box  -->
            <?php while($rowW=$watchReq->fetch(PDO::FETCH_OBJ)){ ?>
            <div class=" product-box">
                <!-- image ----------->
                <div class="product-img">
                    <!--add Cart------------->
                     <form action="" method="post" id="formW">

                        <input type="hidden" name="idPro" id="idPro" value="<?php echo $rowW -> id_pro?>">
                        <a class="add-cart" onclick="submitForm('formW')">
                           <i class="fa-solid fa-cart-shopping "></i>
                        </a>
                    </form>
                    <!--add to favorite------------->
                    <form action="" method="post" id="formW">

                        <input type="hidden" name="idPro" id="idPro" value="<?php echo $rowP -> id_pro?>">
                        <a  class="add-fav" onclick="favSubmit('formW')"><i class="fa-solid fa-heart "></i></a>
                    </form>
                    <img src="<?php echo $rowW -> photo?>" alt="">
                </div>

                <!--details-->
                <div class="product-detail">
                    <a href="#" class="name"><?php echo $rowW -> nom_pro?></a>
                    <span class="price">$<?php echo $rowW -> prix?></span>
                </div>
            </div>
            <?php }?>
        </div>
        <!--Categorie 5----------------------->

        <div class="cat-content" data-category="headphone">
        <?php while($rowH=$headReq->fetch(PDO::FETCH_OBJ)){ ?>
            <!--Product box  -->
            <div class=" product-box">
                <!-- image ----------->
                <div class="product-img">
                    <!--add Cart------------->
                     <form action="" method="post" id="formH">

                        <input type="hidden" name="id" id="idPro" value="<?php echo $rowH -> id_pro?>">
                        <a class="add-cart" onclick="submitForm('formH')">
                           <i class="fa-solid fa-cart-shopping "></i>
                        </a>
                    </form>
                    <!--add to favorite------------->
                    <form action="" method="post" id="formH">

                        <input type="hidden" name="idPro" id="idPro" value="<?php echo $rowP -> id_pro?>">
                        <a  class="add-fav" onclick="favSubmit('formH')"><i class="fa-solid fa-heart "></i></a>
                    </form>
                    <img src="<?php echo $rowH -> photo?>" alt="">
                </div>

                <!--details-->
                <div class="product-detail">
                    <a href="#" class="name"><?php echo $rowH -> nom_pro?></a>
                    <span class="price">$<?php echo $rowH -> prix?></span>
                </div>
            </div>
            <?php };?>
        </div>
        
    </div>

   


    <!--Footer------------------------->
    <footer class="footer">
        <div class="container-fluid py-4">
            <div class=" ">
                <h5 class="text-secondary footer-text text-center " >Be Future-Ready</h5>
                <p class="fw-normal text-muted  text-center " >Get Exclusive Electronic products updates<br> straight to your inbox
                </p>
                <form action="" class=" " >
                    <input type="text" name="email" id="" class="form-control rounded-pill sub-input mx-auto"
                        placeholder="Enter your email ">
                    <input type="submit" value="Subscribe" class="btn text-white rounded-pill my-3 "
                        style="background-color: #ef6817; font-weight: 200; width: 300px; margin-left: 463px;">

                </form>
            </div>
            <div class="d-flex justify-content-center">
                <a href="#" class="text-muted mx-3"><i class="fa-brands fa-facebook "></i></a>
                <a href="#" class="text-muted mx-3"><i class="fa-brands fa-twitter "></i></a>
                <a href="#" class="text-muted mx-3"><i class="fa-brands fa-instagram "></i></a>
                <a href="#" class="text-muted mx-3"><i class="fa-brands fa-youtube "></i></a>
            </div>
        </div>

    </footer>




    <script>
        /*slider script --------------------*/
        $(document).ready(function () {
            $("#adaptive").lightSlider({
                adaptiveHeight: true,
                auto: true,
                item: 1,
                slideMargin: 0,
                loop: true
            });
        });

        /*Afficher par categorie----------------*/
        $(document).ready(function () {
            $(".item").click(function () {
                var category = $(this).data("category");
                $(".products-container .cat-content").hide();
                $(".products-container .cat-content[data-category='" + category + "']").show();
            });
        });

        /*Afficher all product ----------------*/
        $(document).ready(function () {
            $("#allitem").click(function () {
                $(".products-container div").show();
            });
        });

        
        

    </script>
    <script>
        $(document).ready(function(){
            $(".add-cart").click(function(){
                var number = $(".num_product").text();
                number ++;
                $(".num_product").text(number);
            });
        });
    </script>
  
</div>
<div id="group_sorche" style="display: <?php if (isset($_POST["show"])) {
   echo ";";
}else{
    echo "none;";
}?> ">

<?php

if (isset($_POST["show"])) {
    $sorche = $connexion -> prepare("SELECT * FROM `marque` as m INNER JOIN produit as p on m.id_mar=p.id_mar WHERE p.nom_pro=? or m.nom_mar=?");
    $sorche -> execute(array($_POST["shir"],$_POST["shir"])); 
    ?>
 <div class="cat-content" data-category="tablet">
            <!--Product box  --><div class="row d-flex align-items-center justify-content-center">
            <?php while($r=$sorche->fetch(PDO::FETCH_OBJ)){ ?>
                <div class="col-3">
            <div class=" product-box">
                <!-- image ----------->
                <div class="product-img">
                    <!--add Cart------------->
                     <form action="" method="post" id="formT">

                        <input type="hidden" name="idPro" id="idPro" value="<?php echo $r -> id_pro?>">
                        <a class="add-cart" onclick="submitForm('formT')">
                           <i class="fa-solid fa-cart-shopping "></i>
                        </a>
                    </form>
                    <!--add to favorite------------->
                   <form action="" method="post" id="formT">

                        <input type="hidden" name="idPro" id="idPro" value="<?php echo $r -> id_pro?>">
                        <a  class="add-fav" onclick="favSubmit('formT')"><i class="fa-solid fa-heart "></i></a>
                    </form>
                    <img src="<?php echo $r -> photo?>" alt="">
                </div>

                <!--details-->
                <div class="product-detail">
                    <a href="#" class="name"><?php echo $r -> nom_pro?></a>
                    <span class="price">$<?php echo $r -> prix?></span>
                </div>
            </div>
            </div><?php }?></div>
        </div>
        
 <!--Footer------------------------->
 <footer class="footer">
        <div class="container-fluid py-4">
            <div class=" ">
                <h5 class="text-secondary footer-text text-center " >Be Future-Ready</h5>
                <p class="fw-normal text-muted  text-center " >Get Exclusive Electronic products updates<br> straight to your inbox
                </p>
                <form action="" class=" " >
                    <input type="text" name="email" id="" class="form-control rounded-pill sub-input mx-auto"
                        placeholder="Enter your email ">
                    <input type="submit" value="Subscribe" class="btn text-white rounded-pill my-3 "
                        style="background-color: #ef6817; font-weight: 200; width: 300px; margin-left: 463px;">

                </form>
            </div>
            <div class="d-flex justify-content-center">
                <a href="#" class="text-muted mx-3"><i class="fa-brands fa-facebook "></i></a>
                <a href="#" class="text-muted mx-3"><i class="fa-brands fa-twitter "></i></a>
                <a href="#" class="text-muted mx-3"><i class="fa-brands fa-instagram "></i></a>
                <a href="#" class="text-muted mx-3"><i class="fa-brands fa-youtube "></i></a>
            </div>
        </div>

    </footer>

 <?php  }
?>

</div> 

</body>
</html>