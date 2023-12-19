<?php
session_start(); 
if (isset($_SESSION["login"])) {
  header("location:acceuil.php");
}
?>
<!doctype html>
<html lang="en">

<head>
  <link rel="stylesheet" href="bootstrap.min.css">

  <title>Title</title>
  <!-- Required meta tags -->
  <!-- <link rel="stylesheet" href="page_pransip.css"> -->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <style>
         .logo{
        width:200px;
        height:50px;
      }
     
      .btn{
        background-color:#EB5E29;
        
        font-weight:bold;
    }
    #msg{
      background-color:#EB5E29;
        
        font-weight:bold;
    }

    </style>
</head>


<body >


  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

  

  <nav class="navbar navbar-expand-sm navbar-dark bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)"><img class='logo' src="logo/logo2.png"></a>

    
      <div class="dropdown dropstart text-end">
      <a class="nav-link text-dark" data-bs-toggle="dropdown" href="#"><i class="fa-solid fa-user"></i></a>

  <ul class="dropdown-menu bg-light">
    <li><a class="dropdown-item bg-light " href="modifyaccount.php">My account</a></li>
    <li><a class="dropdown-item bg-light " href="#">Log out</a></li>
  </ul>
</div>
         </div>
  </div>
</nav>

  <center class='container mt-5'>
    <div class="ce col-7 col-sm-11 col-lg-8" ><br>
    <div class="carde" id="crd">
      <h1 class="h1">log in</h1><br>
      <form action="loginaction.php" method="post">
      <div class="col-7">  
        <input type="email" name="email" id="" class="col-6 mt-2  form-control" placeholder="Email_Adress " required></div>
      <div class="col-7">  
        <input type="password" name="password" id="" required class="mt-2 col form-control" placeholder="Password"></div>
                 <input type="submit" value=" log in" class="mt-5 btn btn-dark" id="btn"><br>
        <!-- <a href="page_pransip.html" > Login</a> -->

      </form>
    </div><br>
    <?php if (isset($_GET["msg"])) {
            ?>
                          <div class="col-5"><?php echo $_GET["msg"] ;?></div><br><div class="col-3"><a href="sing.php" >create new conte</a></div>
                          <?php }
          ?>

   </center>
</body>

</html>