<?php
session_start();

include("connection.php");

if(isset($_POST["btnLogin"])) {
    
    $email = $_POST["mail"];
    $password = $_POST["pass"];

    $error=[];
    $rePass="/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($error,"Incorrect format for email");
    } 
    else if(!$email){
          array_push($error,'Email field cannot be empty');
    }

    if(!preg_match($rePass,$password)){
        array_push($error,"Incorrect format for password");
    }
    else if(!$password){
        array_push($error,'Password field cannot be empty');
    }

    if(count($error)==0){
    
    $mdPass=md5($password);
    $query = "SELECT u.* , r.name FROM user u JOIN role r ON 
     u.roleId = r.idRole WHERE u.email=:email AND u.passwordd=:pw"; 

    $stmt = $connection->prepare($query);
    
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":pw", $mdPass);

    $stmt->execute();

    if($stmt->rowCount()) { 
        
        $_SESSION["user"] = $stmt->fetch();

        if($_SESSION['user']->name == 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: articals.php");
            alert('Uspesno');
        }
    } else {
        $_SESSION["greska"] = "Wrong username or passwordd.";
        header("Location: index.php");
    }
    
}}