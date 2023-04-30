<?php
$id=@$_GET["id"] ;
$db_connexion=new PDO("mysql:host=localhost;port=8889;dbname=societe_industrielle","root","root") ;
$query="UPDATE employe SET CIN=?,Nom=?,Prenom=?,Date_de_naissance=?,Grade=? WHERE Num_E=? " ; 
$stmt=$db_connexion->prepare($query) ;
if(!empty ($_POST)){
$stmt->execute([ $_POST["CIN"] ,$_POST["Nom"] ,$_POST["Prenom"] , $_POST["Date"] ,$_POST["grade"] , $id  ])  ;
header("location:http://localhost:8888/test/header.php") ;
}
?>
<?php
$db_connexion =new PDO('mysql:host=localhost;port=8889;dbname=societe_industrielle','root','root')  ;
$query="SELECT * FROM employe" ;
$stmt=$db_connexion->query($query) ;
$data=$stmt->fetchall() ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>edit</title>
</head>
<body>
    <form method="POST">
        <?php 
        foreach($data as $it){
            if($it["Num_E"]==$id){
                echo("
                <input type='"."number"."'name='"."CIN". "'placeholder="." 'ecrire le CIN' "."value='".$it["CIN"]."'>
                <input type="."'text'". "name="."'Nom'"."placeholder="."'ecrire le nom' ". "value='".$it["Nom"] ."'>
                <input type="."'text'". "name ="."'Prenom'"."placeholder="."'ecrire le Prenom'". "value='".$it["Prenom"] ."'>
                <input type="."'date'". "name ="."'Date'"."placeholder="."'ecrire le date'". "value='".$it["Date_de_naissance"] ."'>
                <input type="."'text'". "name ="."'grade'"."placeholder="."'ecrire le grade'". "value='".$it["Grade"] ."'>
                <button>Submit </button> ") ;
            }
        }
        ?>
    </form>
    
</body>
</html>