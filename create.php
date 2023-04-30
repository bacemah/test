<?php 
$db_connexion=new PDO("mysql:host=localhost;port=8889;dbname=societe_industrielle","root" ,"root") ;
$query="INSERT INTO employe VALUES (? , ? , ? , ?  , ? ,? , ? )" ;
$stmnt=$db_connexion->prepare($query) ;
if(!empty($_POST)){
$name=$_FILES["image"]["name"];
$temp=$_FILES["image"]["tmp_name"] ;
move_uploaded_file($temp ,"/Applications/MAMP/htdocs/test/img//".$name) ;
$tab=[$_POST["id"] , $_POST["CIN"] , $_POST["nom"] ,$_POST["prenom"] , $_POST["date"] , $_POST["grade"] , $name] ;
$stmnt->execute($tab) ;
header("location:http://localhost:8888/test/header.php")  ;
}
 
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <form method="post" enctype="multipart/form-data">
            <input type="number" name="id" placeholder="donner un identifiant">
            <input type="number" name ="CIN" placeholder="ecrire le CIN " >
            <input type="text" name ="nom" placeholder="ecrire le nom" >
            <input type="text" name ="prenom" placeholder="ecrire le prenom " >
            <input type="date" name ="date" placeholder="ecrire date de naissance " >
            <input type="text" name ="grade" placeholder="ecrire le grade " >
            <input type="file" name="image" placeholder="enregistre votre image" >
            <button>Submit</button>

        </form>
