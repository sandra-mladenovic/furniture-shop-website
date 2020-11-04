<?php
include "connection.php";
$code=500;
if(isset($_POST['btnContact'])){
    $subject=$_POST['subject'];
    $message=$_POST['contactTextarea'];
    $odKoga=$_POST['contactEmail'];

    $error=[];

    $reName="/^[A-Z][a-z]{2,}(\s[A-Z][a-z]{1,})*$/";
   

    $error=[];
    if(!preg_match($reName,$subject)){
        array_push($error,"Name in incorretc format");
    }


    if (!filter_var($odKoga, FILTER_VALIDATE_EMAIL)) {
        array_push($error,"Incorrect format for email");
    } 

    if(strlen($message)<0){
        array_push($error,"Messagebox can't be empty");
    }

    if(count($error)==0){
        $to= 'mladenovicsandraa@gmail.com';
        $headers = 'From: webmaster@example.com' . "\r\n" .
            'Reply-To: webmaster@example.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();
        
         mail($to, $subject, $message, $headers);
         $code=422;
         ob_start();  
         header( 'Location:contact.php?alert='.
         urlencode("Message sent!")) ;
         exit();
    }else{
        $code=500;
    }
}

http_response_code($code);
?>

