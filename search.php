<?php
$db_connexion =new PDO('mysql:host=localhost;port=8889;dbname=societe_industrielle','root','root')  ;
if(!empty($_GET)){
    $VAL=$_GET["ser"] ;
}
else{
    $VAL="";
};
$query="SELECT * FROM employe WHERE Nom LIKE '".$VAL."%' ORDER BY Num_E ";
$stmt=$db_connexion->query($query) ;
$data=$stmt->fetchall() ;

?>
<table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">CIN</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Date</th>
                            <th scope="col">grade</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php 
                        foreach ($data as $item){
                            echo ( "<tr>
                                        <th scope='row'>".$item["Num_E"] ."</th>
                                        <td>".$item["CIN"] ."</td>
                                        <td>".$item["Nom"]."</td>
                                        <td>".$item["Prenom"]."</td>
                                        <td>".$item["Date_de_naissance"]."</td>
                                        <td>".$item["Grade"]."</td>
                                        <td><img src='img/".$item["photo"]."' width='50px' height='50px'></td>
                                        <td><a href="."delete.php/?id=".$item["Num_E"].">Delete<a></td>
                                        <td><a href="."edit.php/?id=".$item["Num_E"].">edit<a></td>
                                    </tr> "
                        ) ; }
                        ?>
                    </tbody>
                </table>