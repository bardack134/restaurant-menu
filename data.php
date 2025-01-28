<?php
include("../conection.php");
$ObjConnection = new conection();
$sql = "SELECT * FROM menu";
// $sql = "SELECT * FROM `menu` WHERE category='drinks';";


try {
    $items = $ObjConnection->consult($sql);
    var_dump($items);
} catch (Exception $e) {
    echo "Something failed: " . $e->getMessage();
}
?>