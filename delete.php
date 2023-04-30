<?php
$db_connexion=new PDO("mysql:host=localhost;port=8889;dbname=societe_industrielle","root","root") ;
$id=$_GET["id"] ;
$query = "DELETE FROM employe WHERE Num_E = ? " ; 
$stmt=$db_connexion->prepare($query) ;
$stmt->execute([$id]) ;
header("location:http://localhost:8888/test/header.php") ;
?>