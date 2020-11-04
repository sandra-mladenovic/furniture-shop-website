<?php
include "../connection.php";
session_start();
if(isset($_SESSION['user'])){

    if(isset($_GET['idArtical'])){
        $proizvod=$_GET['idArtical'];
        $izbrisi="DELETE FROM cart WHERE idArtical=:izabrani";
        $stmt=$connection->prepare($izbrisi);
        $stmt->bindParam(":izabrani",$proizvod);
        $sve=$stmt->execute();
        echo json_encode($sve);

    }

    $idKupca=$_SESSION['user']->idUser;
    //var_dump($idKupca);
    $query="SELECT c.idArtical, a.src, a.title, a.price FROM
     cart c INNER JOIN artical a
     ON c.idArtical=a.idArtical
     where c.idUser=$idKupca
     ";
    $stmt=$connection->prepare($query);
    $stmt->bindParam(":id",$id);
    $sve=$stmt->execute();
    $sve=$stmt->fetchAll();
    echo json_encode($sve);

}


?>