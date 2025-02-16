<?php include("head.php"); ?>
<?php include("conection.php"); ?>
<?php
session_start();
// $_FILES= https://www.php.net/manual/en/function.move-uploaded-file.php


// STEP1 ->userがloginをしたかどうかを確認します。
if (!isset($_SESSION['user'])) {
    header('location:login.php');
}




function send_image_to_folder($file)
{
    /*10. この関数はユーザーがアップロードした写真をfood-imgsフォルダに保存します、
     *その画像のファイル名をデータベースに保存するための関数です。
     */

    $image_name =  time() . basename($_FILES['file']['name']);
    // もし保存したい写真の名前がfood-imgsフォルダに他の写真の名前と同じであれば、その場合、food-imgsフォルダにある写真が上書きされます、エラーが発生します。だから　Time()関数を使います
    $to_directory = 'templates/food-imgs/' . $image_name;
    $from = $_FILES['file']['tmp_name'];
    move_uploaded_file($from, $to_directory);
    return $image_name;
}

/* 
 *データベースに新しいデータを追加するためにSQLを実行する関数 
 */
function adding()
{
    $return_id = $_POST['food_id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $ObjConnection = new conection();

    // step　10 ユーザーがアップロードした写真をfood-imgsフォルダに保存します, その写真の名前だけをデータベースに保存します。
    $file = $_FILES['file'];
    $image_name = send_image_to_folder($file);

    $sql = "INSERT INTO menu (name, category, price, description, imagen) VALUES (?, ?, ?, ?,?)";
    // ユーザーが入力したデータを取得し、SQLコードを実行する関数です
    $ObjConnection = new conection();
    $ObjConnection->execute_sql($sql, $name, $image_name,  $description, $price, $category, $return_id);
    header('Location:admin.php');
}

function update()
{
    $return_id = $_POST['food_id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    //   9. この関数は、フォームから送信されたファイルがあるかどうか確認します

    if ($_FILES['file']['name']) { //もしあれば以下の処理を行います
        echo "ファイルは送信された";

        // --------------------1.まず古いイメージファイルを削除する-----------
        $return_id = $_POST['food_id'];
        $search_image_name = "SELECT imagen FROM `menu` WHERE id=$return_id";
        $ObjConnection = new conection();
        $sql_answer = $ObjConnection->consult($search_image_name);
        $oldImage = $sql_answer[0]["imagen"];

        if (file_exists("./templates/food-imgs/" . $oldImage)) {
            unlink("./templates/food-imgs/" . $oldImage); // https://www.php.net/manual/en/function.unlink.php
        }
        // -------------------新しいイメージ-------------------------
        // 2. 送信された新しい画像ファイルをサーバーに保存します。
        $file = $_FILES['file'];
        $image_name = send_image_to_folder($file);

        // -----------------------send sql--------------------
        
        $sql = "UPDATE menu SET name = ?, category=?, price = ?, description = ?, imagen=?  WHERE id = ?";

        
        $ObjConnection = new conection();
        
        // 3. 新しいデータ（名前、カテゴリ、価格、説明、画像）データで変更します。
        $ObjConnection->execute_sql($sql, $name, $image_name,  $description, $price, $category, $return_id);
        header('Location:admin.php');
    } else {
        // print_r($_POST);
        $return_id = $_POST['food_id'];
        $name = $_POST['name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        $return_id = $_POST['food_id'];

        $ObjConnection = new conection();


        $sql = "UPDATE menu SET name = ?, category=?, price = ?, description = ?  WHERE id = ?";

        $ObjConnection = new conection();
        $ObjConnection->execute_no_img($sql, $name,  $description, $price, $category, $return_id);
        header('Location:admin.php');
    }
    header('Location:admin.php');
}

function delete()
/* POSTで送信されたIDを取得ー＞
 * $id変数に代入し　→
 * そのIDに関連するデータ削除しますー＞管理ページにリダイレクトします
*/
{
    $ObjConnection = new conection();
    $id = $_POST['selected_id'];

    //step 11 -> $idを使って、menuテーブルから対応する写真ファイル名を検索します。
    $search_image_name = "SELECT imagen FROM `menu` WHERE id=$id";
    $sql_answer = $ObjConnection->consult($search_image_name);

    /* 
     *https://www.php.net/manual/en/function.unlink.php
     */

    // step 12 (last) ->unlink()関数を使って、food-imgsフォルダーにある写真を削除します。
    unlink("./templates/food-imgs/" . $sql_answer[0]["imagen"]);

    $sql = "DELETE  FROM menu WHERE id=$id";
    $ObjConnection->delete($sql);

    header('Location:admin.php');
}

// STEP2 ->データベースを作成した、テストを行うためにデータを直接追加しました。
function show_all()
{
    // step3 -> データベースにあるすべてのデータを取得する関数を作成しました。
    global $items;
    $ObjConnection = new conection();
    $sql = "SELECT * FROM menu";
    $items = $ObjConnection->consult($sql);
    return $items;
}

function returnData()
{
    // 8.指定されたIDに基づいてデータベースからデータを取得します
    global $name, $category, $price, $description, $return_id;
    $ObjConnection = new conection();

    //8.そのデータをグローバル変数に格納します。
    $id = $_POST['selected_id'];

    // 8.selected_idはSQLクエリでそのIDに関連するデータを取得します。
    $sql = "SELECT * FROM menu WHERE id=$id";
    $data = $ObjConnection->consult($sql);

    // 8.その後、取得したデータから名前、カテゴリ、価格、説明をグローバル変数に代入します。
    $return_id = $data[0]['id'];
    $name = $data[0]['name'];
    $category = $data[0]['category'];
    $price = $data[0]['price'];
    $description = $data[0]['description'];
}
// step　6 ユーザーがフォームを送信したか確認する, add関数を作る-> 
if (isset($_POST['action'])) {
    // var_dump($_POST); //for debug

    $option = $_POST['action'];

    $return_value = match ($option) {
        'add' => adding(),
        //step 9 -> 更新したいデータを選択しました、これから変更してupdateする
        'update' => update(),
        // step 7 ー＞delete関数を作りました
        'delete' => delete(),
        // step 8 ->要素のデータを更新するためには、まずその要素を選択し、要素のデータを取得します
        'select' => returnData(),
    };
} elseif (isset($_POST['action'])) {
    echo "<div class='container'><h3>フォームのすべての要素を入力してください</h3></div>";
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-12
            <div class=" card my-4">
            <div class="card-header">メニュー情報</div>
            <div class="card-body">
                <!-- step5->データベースに新しいデータを追加するためにフォームを作成しました。 -->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <!-- グローバル変数に保存されたデータは、echo を使用して画面に表示されます。 -->
                    <input type="hidden" name="food_id" value="<?php echo isset($return_id) ? $return_id : ''; ?>">

                    <label for="name" class="fw-bold">皿名:</label>
                    <input type="text" required class="form-control" id="name" name="name" value="<?php echo isset($name) ?  htmlspecialchars($name) : ''; ?>"><br><br>

                    <!-- file -->
                    <label for="file" class="fw-bold">料理イメージ:</label>
                    <input type="file" class="form-control" name="file" id="file"><br><br>

                    <label for="category" class="fw-bold">カテゴリ:</label>
                    <select required name="category" id="category" class="form-control">
                        <!-- <option value="" >オプションをお選び下さい</option> -->
                        <option value="">---</option>
                        <option value="main">メイン</option>
                        <option value="dessert">デザート</option>
                        <option value="drinks">ドリンク</option>
                    </select>

                    <div class="mb-3">
                        <label for="text_area" class="form-label fw-bold">説明</label>

                        <textarea required class="form-control" name="description" id="text_area" rows="3"><?php echo isset($description) ? htmlspecialchars($description) : ''; ?></textarea>
                    </div>
                    <label for="price " class="fw-bold">値段:</label>
                    <input type="number" required class="form-control" id="price" name="price" value="<?php echo isset($price) ?  htmlspecialchars($price) : ''; ?>"><br><br>

                    <input type="submit" class="btn btn-success my-3" name="action" value="add">
                    <input type="submit" class="btn btn-warning my-3" name="action" value="update">
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12 py-4">
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col">ID</th>
                        <th scope="col">イメージ</th>
                        <th scope="col">name名</th>
                        <th scope="col">カテゴリ</th>
                        <th scope="col">説明</th>
                        <th scope="col">値段</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // step4 ->データベースにあるのすべてのデータを取る関数を呼び出します,
                    //データベースから取得したデータをテーブルで表示するためにforeachを実行します
                    show_all();

                    // print_r($items); デバッグのために
                    ?>
                    <?php foreach ($items as $item => $value) { ?>
                        <tr>
                            <td>

                                <!-- DELETE:フォームはPOSTメソッドを使って項目のidを送ります -->
                                <form action="" method="post">
                                    <input type="hidden" name="selected_id" value="<?php echo $value['id']; ?>">
                                    <!-- 8. delete 関数と同様に、ユーザーが「選択」ボタンをクリックすると、アイテムのIDがPOSTメソッドを通じて送信されます。 -->
                                    <button name="action" type="submit" class="btn btn-warning" value="select">Select</button><br>
                                    <button name="action" type="submit" class="btn btn-danger mt-2" value="delete">削除❌</button>
                                </form>

                            </td>
                            <td><?php echo $value['id']; ?></td>
                            <td><img src="./templates/food-imgs/<?php echo $value['imagen']; ?>" alt="" width="50px"></td>
                            <td><?php echo $value['name']; ?></td>
                            <td><?php echo $value['category']; ?></td>
                            <td class="text-wrap" style="max-width: 300px;"><?php echo $value['description']; ?></td>
                            <td><?php echo $value['price']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<?php include("footer.php"); ?>