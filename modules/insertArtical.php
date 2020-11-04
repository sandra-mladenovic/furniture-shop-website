<?php
include "../connection.php";
session_start();

if (isset($_POST['btnInsert'])){
    $name=$_POST['newName'];
    $cat=$_POST['newDdlCat'];
    $price=$_POST['newPrice'];
    // $idArtical=$_POST['idProduct'];
    $file=$_FILES['newPic'];
    $fileName=$file['name'];
    $size=$file['size'];
    $type=$file['type'];
    $tmpPutannja=$file['tmp_name'];

    $allowedFormat=array("image/jpg","image/jpeg","image/png","image/gif");
    if(!in_array($type,$allowedFormat)){
        $error[]="You can uploda just image";
    }

    if($size>3000000){
        $error[]="Image must be less then 3MB";
    }
    
    $newName=time().$fileName;
    $newPath="../assets/img/".$newName;

    if(!$file['name']){
        $error[]="You must upload a photoo";
    }


    $reName="/^[A-Z][a-z]{2,}(\s[A-Z][a-z]{1,})*$/";
    $rePrice="/^[1-9][0-9]*$/";

    $error=[];
    if(!preg_match($reName,$name)){
        $error[]="Name of a product in incorretc format";
    }
    if(!preg_match($rePrice,$price)){
        $error[]="Ptice can't be cero or less";
    }
    if($cat=="Select"){
        $error[]="Please select one category";
    }
    $code=500;
    if(count($error)==0){
        
        $uspeh = move_uploaded_file($tmpPutannja, $newPath);
        $queryUpdate="INSERT INTO artical (title, price, src, idCat) VALUES (:ime,:cena,:slika,:kategorija) ";
        $stmt=$connection->prepare($queryUpdate); 
        $stmt->bindParam(":ime",$name);
        //$stmt->bindParam(":id",$idArtical);
        $stmt->bindParam(":cena",$price);
        $stmt->bindParam(":slika",$newName);
        $stmt->bindParam(":kategorija",$cat);
        if($stmt->execute()){
            $code=201;
            ob_start();
            
            header( 'Location:../admin.php?alert='.
                urlencode("Added successfully!")) ;
            exit();
        }
        else{
           $code=500;
        }
    }
        
        
}

http_response_code($code);
?>