<?php

class conection{
    /*サーバーネーム, データベース名, ユーザー名, パスワード, 接続オブジェクト*/
    private $servername='localhost'; // 
    private $db_name="restaurant"; // 
    private $username= 'root'; // 
    private $password = ""; // 
    private $connection; // 

    public function __construct()
    {
        try {
            // PDOオブジェクトを作成し、データベースに接続
            $this->connection= new PDO("mysql:host=$this->servername; dbname=$this->db_name; charset=utf8mb4", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            // echo "Connected successfully"; // 接続成功メッセージ

        } catch (PDOException $error) {
            // 接続失敗したら、メッセージを表示
            echo "Connection failed: " . $error->getMessage();
            // echo "Connection failed: " . $error;
        }
    }

    /* 
     *delete-SQL文を実行するメソッド
     */
    public function delete($sql){
        $sql_statement = $this->connection->prepare($sql); // SQLステートメントを準備
        $sql_statement->execute(); // SQLステートメントを実行
        
    }

    /* 
     *SQL文を実行するメソッドです、結果を取得するメソッド　
     */
    public function consult($sql){
        $sql_statement = $this->connection->prepare($sql); // SQLステートメントを準備
        $sql_statement->execute(); // SQLステートメントを実行
        return $sql_statement->fetchAll(PDO::FETCH_ASSOC); // 結果をすべて取得して返す
    }

    /*
     * このメソッドは、データベースのデータを追加または更新したい場合に使用されます。
     */
    public function execute_sql($sql, $name, $image_name, $description, $price, $category, $return_id=null){
        $sql_statement = $this->connection->prepare($sql); // SQLステートメントを準備
        $sql_statement->bindParam(1, $name, PDO::PARAM_STR);
        $sql_statement->bindParam(2, $category, PDO::PARAM_STR);
        $sql_statement->bindParam(3, $price, PDO::PARAM_INT);
        $sql_statement->bindParam(4, $description, PDO::PARAM_STR);
        $sql_statement->bindParam(5, $image_name, PDO::PARAM_STR);
        if ($return_id != null) {
            $sql_statement->bindParam(6, $return_id, PDO::PARAM_INT);
        }
        
        $sql_statement->execute();
    }

    public function reservation_form($sql, $name, $email,  $phone, $time, $numberOfPeople, $message){
        $sql_statement = $this->connection->prepare($sql); // SQLステートメントを準備
        $sql_statement->bindParam(1, $name, PDO::PARAM_STR);
        $sql_statement->bindParam(2, $email, PDO::PARAM_STR);
        $sql_statement->bindParam(3, $phone, PDO::PARAM_INT);
        $sql_statement->bindParam(4, $time, PDO::PARAM_STR);
        $sql_statement->bindParam(5, $numberOfPeople, PDO::PARAM_INT);
        $sql_statement->bindParam(6, $message, PDO::PARAM_STR);
        if ($message != null) {
            $sql_statement->bindParam(6, $message, PDO::PARAM_STR);
        }
        
        $sql_statement->execute();
    }
}
?>
