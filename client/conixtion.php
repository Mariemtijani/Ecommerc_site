<?php
try {
   $con=new PDO("mysql:host=localhost;dbname=electrostore;port=3306","root","");

} catch ( Exception $e) {
   echo $e->$e->getMessage();
}
?>