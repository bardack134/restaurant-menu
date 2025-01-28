<?php
class conection{
    private $servername='localhost'; // サーバーネーム
    private $db_name="restaurant"; // データベース名
    private $username= 'root'; // ユーザー名
    private $password = ""; // パスワード
    private $connection; // 接続オブジェクト

    public function __construct()
    {
        try {
            // PDOオブジェクトを作成し、データベースに接続
            $this->connection= new PDO("mysql:host=$this->servername; dbname=$this->db_name; charset=utf8mb4", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            echo "Connected successfully"; // 接続成功メッセージ

        } catch (PDOException $error) {
            // 接続失敗時のメッセージ
            echo "Connection failed: " . $error->getMessage();
            // echo "Connection failed: " . $error;
        }
    }

    // SQL文を実行するメソッド
    public function delete($sql){
        $sql_statement = $this->connection->prepare($sql); // SQLステートメントを準備
        $sql_statement->execute(); // SQLステートメントを実行
        
    }

    // SQL文を実行し、結果を取得するメソッド
    public function consult($sql){
        $sql_statement = $this->connection->prepare($sql); // SQLステートメントを準備
        $sql_statement->execute(); // SQLステートメントを実行
        return $sql_statement->fetchAll(PDO::FETCH_ASSOC); // 結果をすべて取得して返す
    }

    public function execute_sql($sql, $name,  $description, $price, $category, $return_id=null){
        $sql_statement = $this->connection->prepare($sql); // SQLステートメントを準備
        $sql_statement->bindParam(1, $name, PDO::PARAM_STR);
        $sql_statement->bindParam(2, $description, PDO::PARAM_STR);
        $sql_statement->bindParam(3, $price, PDO::PARAM_INT);
        $sql_statement->bindParam(4, $category, PDO::PARAM_STR);
        if ($return_id != null) {
            $sql_statement->bindParam(5, $return_id, PDO::PARAM_INT);
        }
        
        $sql_statement->execute();
    }
}
?>
