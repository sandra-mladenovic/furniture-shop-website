<?php

include "../connection.php";
header('Access-Control-Allow-Origin: *');
if(isset($_GET['idCat'])){
    $id=$_GET['idCat'];
    $query="SELECT * FROM artical where idCat=:id";
    $stmt=$connection->prepare($query);
    $stmt->bindParam(":id",$id);
    $sve=$stmt->execute();
    $sve=$stmt->fetchAll();
    echo json_encode($sve);
    
}
else{
    
    $query="SELECT a.idArtical, a.title, a.price, a.src, c.catName
    FROM artical a INNER JOIN category c 
    ON a.idCat=c.idCat ";
    $sve=$connection->query($query)->fetchAll();
    shuffle($sve);
    //$output = array_slice($sve,0,6);
    echo json_encode($sve);
}

?>