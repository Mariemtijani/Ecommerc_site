<?php 
    session_start();
    require("connexion.php");

    //count items 
    $countReq = $connexion -> prepare("SELECT  count(*) as itemCount, sum(p.prix * pa.quantite) as totalPrix from produit as p inner join panier as pa on p.id_pro = pa.id_pro where user_name = ?");
    $countReq -> execute(array($_SESSION["login"]));
    $items = $countReq->fetch(PDO::FETCH_OBJ);

     //select id client 
     $clientReq = $connexion -> prepare("SELECT id_client from client where email=?");
     $clientReq -> execute(array($_SESSION["login"]));
     $id_client = $clientReq -> fetch(PDO::FETCH_OBJ); 

    // add to table commande
    $commandReq = $connexion -> prepare("INSERT INTO commande values(?,?,?,?,?,?)");
    $commandReq -> execute(array(null,date('Y-m-d'),$id_client -> id_client,
    $items->itemCount,$_SESSION["login"],$items->totalPrix));

   

    //select id commande
    $comReq = $connexion -> prepare("SELECT id_com, count(*) as countCommade from commande where id_client=?");
    $comReq -> execute(array($id_client -> id_client));
    $id_com = $comReq -> fetch(PDO::FETCH_OBJ); 

    //select client  from livraison
    $selectReq = $connexion -> prepare("SELECT count(*) as countClient FROM livraison where id_client=? AND email=?");
    $selectReq -> execute(array($id_client -> id_client,$_SESSION["login"]));
    $countclient = $selectReq -> fetch(PDO::FETCH_OBJ);

  
    if($countclient-> countClient==0){
            // add to table livraison
            $livrReq = $connexion -> prepare("INSERT INTO livraison values(?,?,?,?,?,?,?,?)");
            $livrReq -> execute(array($id_client -> id_client, $id_com->id_com,"2023-03-07", 
            $_GET["city"], $_GET["country"], $_GET["adr"], $_SESSION["login"],$id_com->countCommade));
        }
    else{ 
            $updatReq = $connexion -> prepare("UPDATE livraison SET total_com=total_com + 1  where id_client=?  AND email=?");
            $updatReq -> execute(array($id_client -> id_client,$_SESSION["login"]));
    }
    header("location:finalPage.php");
    

    

    
?>