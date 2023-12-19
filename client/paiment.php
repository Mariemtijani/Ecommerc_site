<?php 
session_start(); 
if (!isset($_SESSION["login"])) {
    header("location:logine.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment page</title>
    <script src="https://kit.fontawesome.com/de53ea4f27.js" crossorigin="anonymous"></script>
   
    <link rel="stylesheet" href="assest/paymentStyle.css">
    <link rel="stylesheet" href="assest/bootstrap.min.css">
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
     <div class="container-box my-5">
        <div class="steps">
            <span class="circle">1</span>
            <span class="circle">2</span>
            <span class="circle">3</span>
            <div class="progress">
                <span class="ligne"></span>
            </div>
        </div>
        <div class="descr">
            <span class="circle">Delivery</span>
            <span class="circle">Payment</span>
            <span class="circle">Confirmation</span>
        </div>   
    </div> 

    
   
    <div class="container my-5">
        <h1 class="my-5 " ><span class="text-secondary border-bottom border-4 border-dark"> Payment information </span></h1>
        <form action="paymentAction.php" method="get">
            <!-- delevery section ---------------->
        <div class="delevery">
            <!-- row 1 -->
            <div class="row">
                <div class="col">
                    <label for="" class="form-label fw-bold text-muted mx-3">First Name</label>
                    <input type="text" name="fname" id="" class="form-control bg-light rounded-pill">
                </div>
                <div class="col">
                    <label for="" class="form-label fw-bold text-muted mx-3">Last Name</label>
                    <input type="text" name="lname" id="" class="form-control bg-light rounded-pill">
                </div>
            </div>

            <!-- row 2 -->
            <div class="row my-4">
                <div class="col ">
                    <label for="" class="form-label fw-bold text-muted mx-3">phone Number</label>
                    <input type="tel" name="phone" id="" class="form-control bg-light rounded-pill">
                </div>
                <div class="col">
                    <label for="" class="form-label fw-bold text-muted mx-3">Email</label>
                    <input type="email" name="email" id="" class="form-control bg-light rounded-pill">
                </div>
            </div>
             <!-- row 3 -->
             <div class="row my-4">
                <div class="col ">
                    <label for="" class="form-label fw-bold text-muted mx-3">Country</label>
                    <input type="text" name="country" id="" class="form-control bg-light rounded-pill">
                </div>
                <div class="col">
                    <label for="" class="form-label fw-bold text-muted mx-3">City</label>
                    <input type="text" name="city" id="" class="form-control bg-light rounded-pill">
                </div>
            </div>
             <!-- row 4 -->
             <div class="row my-4">
                <div class="col ">
                    <label for="" class="form-label fw-bold text-muted mx-3">Adress</label>
                    <input type="text" name="adr" id="" class="form-control bg-light rounded-pill">
                </div>
                <div class="col">
                    <label for="" class="form-label fw-bold text-muted mx-3">Code postale</label>
                    <input type="text" name="post" id="" class="form-control bg-light rounded-pill">
                </div>
            </div>
            <!-- fin section payment -->
        </div>
        <div class="payment">
            <!-- row 1 -->
            <div class="row">
                <div class="col">
                    <label for="" class="form-label fw-bold text-muted mx-3">Choose</label>
                    <select name="card" id="" class="form-control bg-light rounded-pill">
                        <option value="1">VISA</option>
                        <option value="2">PAYPAL</option>
                        <option value="3">MASTER</option>
                    </select>
                </div>
                <div class="col">
                    <label for="" class="form-label fw-bold text-muted mx-3">Card Number</label>
                    <input type="text" name="numCard" id="" class="form-control bg-light rounded-pill">
                </div>
            </div>

            <!-- row 2 -->
            <div class="row my-4">
                <div class="col ">
                    <label for="" class="form-label fw-bold text-muted mx-3">End date</label>
                    <input type="date" name="edate" id="" class="form-control bg-light rounded-pill">
                </div>
                <div class="col">
                    <label for="" class="form-label fw-bold text-muted mx-3">CVV</label>
                    <input type="text" name="cvv" id="" class="form-control bg-light rounded-pill">
                </div>
            </div>
            <!-- fin section payment -->
        </div>
        <div class=" my-4 d-flex justify-content-between">
               
                <a href="cart_shopping.php" class="btn btn-secondary text-white fw-bold">Back</a>
                 <input type="submit" value="Confirm" name="btn" id="" class="btn btn-dark text-white  rounded-pill">
                
            </div>


    </form>
    </div>
    </div>

    
</body>
</html>