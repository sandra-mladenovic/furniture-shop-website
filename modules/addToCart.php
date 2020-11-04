<?php
include "../connection.php";
session_start();
 //if(isset($_SESSION["user"])->name == "user"){
     if(isset($_GET["idArtical"])){
         if(isset($_SESSION['user'])){
        $idKupac=$_SESSION['user']->idUser;
        $id=$_GET["idArtical"];
        $stmt=$connection->prepare("INSERT INTO cart (idArtical,idUser) VALUES (:idArtical,:kupac)");
        $stmt->bindParam(":idArtical", $id);
        $stmt->bindParam(":kupac",$idKupac);
        $rows=$stmt->execute();

        $message="Uspesno dodat";
        ///return $message;
        echo json_encode($message);

         }
         else{
            $message="Morate se ulogovati";
            echo json_encode($message);
        }
}
?>