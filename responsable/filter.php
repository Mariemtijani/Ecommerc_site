<?php
require('connexion.php');

if(isset($_POST['datestart']) && isset($_POST['dateend'])){
$cost=$connexion->prepare('SELECT sum(quantite * purchase_price) as cost
from produit 
where purchase_date between ? and ?
'
);
$cost->execute(array($_POST['datestart'],$_POST['dateend']))
;
$c=$cost->fetch();
$resultcost = $c['cost'];

$Income=$connexion->prepare('SELECT sum(total * montant_total) as Income
from commande 
where date_com between ? and ?
'
);
$Income->execute(array($_POST['datestart'],$_POST['dateend']))
;
$IN=$Income->fetch();
$resultincome = $IN['Income'];
}

;


// header("content-type : application/json");

$profit=$resultincome-$resultcost;
header("location:accueiL.php?cost=$resultcost&Income=$resultincome&profit=$profit")
?>



    




    