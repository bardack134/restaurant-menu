<?php
// NOTE: このPHPファイルは、$items配列をJSON形式で返します ****
include("conection.php");

try {
    // Fetch APIを使ってJSONファイルからデータを取得する方法
    $ObjConnection = new conection();
    
    if (isset($_GET['category'])) {
        $seek = $_GET['category'];
        $sql = "SELECT * FROM `menu` WHERE category='$seek';";
        $items = $ObjConnection->consult($sql);
    
        echo json_encode($items, JSON_UNESCAPED_UNICODE); //日本語の文字を見る必要があります
    }
    
    
} catch (Exception $e) {
    echo "Something failed: " . $e->getMessage();
}



?>
