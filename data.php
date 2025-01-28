<?php
include("conection.php");


// $sql = "SELECT * FROM `menu` WHERE category='drinks';";

try {
    $ObjConnection = new conection();
    $sql = "SELECT * FROM menu";
    $items = $ObjConnection->consult($sql);
    
    
} catch (Exception $e) {
    echo "Something failed: " . $e->getMessage();
}
header('Content-Type: application/json');
$json_items = json_encode($items, JSON_UNESCAPED_UNICODE);
echo $json_items;
?>
