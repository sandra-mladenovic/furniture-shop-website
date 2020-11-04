<?php
session_start();
include "connection.php";
//header("Content-type:application/json");
//$code=404;

if(isset($_POST['btnSignIn'])){
    $mail=$_POST['email'];
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $pass=$_POST['password'];

    $error=[];
    $reFirstName = "/^[A-Z][a-z]{2,}$/";
    $reLastName = "/^[A-Z][a-z]{2,}$/";
    $reName="/^[A-Z][a-z]{2,}(\s[A-Z][a-z]{2,})+$/";
    $rePass="/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";

    if(!preg_match($reFirstName,$firstName)){
        array_push($error,"incorrect format for name");
    }
    else if(!$reFirstName){
        array_push($error,'Ne moze biti prazno');
    }

    if(!preg_match($reLastName,$lastName)){
        array_push($error,"incorrect format for name");
    }
    else if(!$lastName){
        array_push($error,'Ne moze biti prazno');
    }

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        array_push($error,"incorrect format for email");
    } 
    else if(!$mail){
          array_push($error,'Ne moze biti prazno');
    }

    if(!preg_match($rePass,$pass)){
        array_push($error,"incorrect format for password");
    }
    else if(!$pass){
        array_push($error,'Ne moze biti prazno');
    }


    if(count($error)==0){
        echo "Sve ok";
        $sql="SELECT count(*) as redovi from user where email=?";
        $stmt=$connection->prepare($sql);
        $stmt->execute(array($mail));
        $result= $stmt->fetchObject();
        if($result->redovi == 1){
            $code=409;
                ob_start();  
                header( 'Location:index.php?alert='.
                urlencode("Email is alredy in use!")) ;
                exit();
        }
        else{

            $passmd=md5($pass);
            $upit="INSERT INTO user (firstName,lastName,passwordd,email) VALUES (:ime,:prezime,:lozinka,:mail)";
            $stmt=$connection->prepare($upit); 
            $stmt->bindParam(":ime",$firstName);
            $stmt->bindParam(":prezime",$lastName);
            $stmt->bindParam(":lozinka",$passmd);
            $stmt->bindParam(":mail",$mail);
            try{
                $code=$stmt->execute();
                ob_start();  
                header( 'Location:login.php?alert='.
                urlencode("Registrated successfully!")) ;
                exit();
                //header("Location: index.php");
            }
            catch(PDOException $e){
                $code=409;
            }

        }

       
    }else{
        $code=422;
       
    }   
}

http_response_code($code);

?>