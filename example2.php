<?php include("conection.php"); ?>

<?php
$ObjConnection = new conection();
$sql = "SELECT * FROM menu";
$items = $ObjConnection->consult($sql);


var_dump($items);
?>