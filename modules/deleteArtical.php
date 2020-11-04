<?php

include "../connection.php";

$statusCode=404;
if($_SERVER['REQUESTED_METHOD']!="POST"){
    echo "You can't accesss this page";
}

if(isset($_POST['id'])){
    $id=$_POST['id'];
    $queryDelete="DELETE FROM artical WHERE idArtical=:id";
    $stmt=$connection->prepare($queryDelete);
    $stmt->bindParam(":id",$id);
    try{
        $result=$stmt->execute();
        if($result){
            $statusCode=204;
            
        }else{
            $statusCode=500;
        }
    }
    catch(PDOException $e){
        $statusCode=500;
    }
}

http_response_code($statusCode);

?>