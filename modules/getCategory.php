<?php
include "../connection.php";

$queryCat="SELECT * FROM category";
$rez=$connection->query($queryCat)->fetchAll();
echo json_encode($rez);
?>