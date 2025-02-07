<?php
/*
 * NOTE: このコードは、category パラメータに属するデータ、
 * データベースからを取得します、JSON形式で返す処理を行います。
 * 
 * 
 */

include("conection.php");


try {
    
    $ObjConnection = new conection();
    
    if (isset($_GET['category'])) {
        $seek = $_GET['category'];
        // 変数 $seek に保存された情報は、フロントエンドから JavaScript を使って GET メソッドで送信されることで取得します。
        $sql = "SELECT * FROM `menu` WHERE category='$seek';";
        $items = $ObjConnection->consult($sql);
    
        echo json_encode($items, JSON_UNESCAPED_UNICODE); //日本語の文字を見る必要があります
    }
    
//step1 -> 最初のステップは、自分でカテゴリーを書いて、データベースから情報を取得して、正しく取得できることを確認することでした。   


//step2 -> データをjsonの形に変更する　ー＞　json_encode

//step3 -> データを画面で表示する　→　scripts.js
           

} catch (Exception $e) {
    echo "Something failed: " . $e->getMessage();
}



?>
