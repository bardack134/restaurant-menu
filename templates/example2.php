<?php include("../conection.php"); ?>

<?php
$ObjConnection = new conection();
$sql = "SELECT * FROM menu";

try {
    $items = $ObjConnection->consult($sql);
    var_dump($items);

} catch (Exception $e) {
    echo "Something failed: " . $e->getMessage();
}
?>


