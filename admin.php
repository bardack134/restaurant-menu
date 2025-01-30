<?php include("head.php"); ?>
<?php include("conection.php"); ?>
<?php
session_start();
// $_FILES= https://www.php.net/manual/en/function.move-uploaded-file.php


// ユーザーがセッションに存在しない場合、ログインページにリダイレクト
// var_dump($_FILES);
if (!isset($_SESSION['user'])) {
    header('location:login.php');
}

function adding()
{
    // print_r($_POST);
    $return_id = $_POST['food_id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];  //NOTE: LO PARE MIENTRAS HAGO PRUEBAS CON $_FILES
    // ----------------------------------------------------------
    $image_name =  time() . basename($_FILES['file']['name']);
    $to_directory = 'templates/food-imgs/' . $image_name;
    $from = $_FILES['file']['tmp_name'];
    move_uploaded_file($from, $to_directory);
    // ----------------------------------------------------------
    $sql = "INSERT INTO menu (name, category, price, description, imagen) VALUES (?, ?, ?, ?,?)";
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
    $ObjConnection = new conection();
    if ($_FILES['file']['name']) {
        echo "ファイルは送信された";

        // --------------------delete before file-----------
        $search_image_name = "SELECT imagen FROM `menu` WHERE id=$id";
        $sql_answer = $ObjConnection->consult($search_image_name);
        $oldImage =$sql_answer[0]["imagen"];

        if (file_exists("./templates/food-imgs/" . $oldImage)) {
            unlink("./templates/food-imgs/" . $oldImage); // https://www.php.net/manual/en/function.unlink.php
        }
        // -------------------------------------------------

        $sql = "UPDATE menu SET name = ?, description = ?, price = ?, category=? WHERE id = ?";

        $ObjConnection->execute_sql($sql, $name,  $description, $price, $category, $return_id);
        header('Location:admin.php');
    } else {
        echo "ファイルは送信されませんでした";

        $sql = "UPDATE menu SET name = ?, description = ?, price = ?, category=? WHERE id = ?";

        $ObjConnection->execute_sql($sql, $name,  $description, $price, $category, $return_id);
        header('Location:admin.php');
    }
}

function delete()
{
    $ObjConnection = new conection();
    $id = $_POST['selected_id'];
    $search_image_name = "SELECT imagen FROM `menu` WHERE id=$id";
    $sql_answer = $ObjConnection->consult($search_image_name);
    // var_dump($sql_answer[0]["imagen"]); DEBUG
    // https://www.php.net/manual/en/function.unlink.php
    unlink("./templates/food-imgs/" . $sql_answer[0]["imagen"]);

    $sql = "DELETE  FROM menu WHERE id=$id";
    $ObjConnection->delete($sql);

    header('Location:admin.php');
}

function show_all()
{
    global $items;
    $ObjConnection = new conection();
    $sql = "SELECT * FROM menu";
    $items = $ObjConnection->consult($sql);
    return $items;
}

function returnData()
{
    global $name, $category, $price, $description, $return_id;
    $ObjConnection = new conection();
    $id = $_POST['selected_id'];
    $sql = "SELECT * FROM menu WHERE id=$id";
    $data = $ObjConnection->consult($sql);
    // print_r($data);
    $return_id = $data[0]['id'];
    $name = $data[0]['name'];
    $category = $data[0]['category'];
    $price = $data[0]['price'];
    $description = $data[0]['description'];
}

// print_r($_POST);
if (isset($_POST['action'])) {
    // var_dump($_POST['action']); //for debug

    $option = $_POST['action'];

    $return_value = match ($option) {
        'add' => adding(),
        'update' => update(),
        'delete' => delete(),
        'select' => returnData(),
    };
} //  else {
//     echo 'アクションが提供されていません';
// }


?>
<div class="container">
    <div class="row">
        <div class="col-md-12
            <div class=" card my-4">
            <div class="card-header">メニュー情報</div>
            <div class="card-body">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="food_id" value="<?php echo isset($return_id) ? $return_id : ''; ?>">

                    <label for="name" class="fw-bold">皿名:</label>
                    <input type="text" required class="form-control" id="name" name="name" value="<?php echo isset($name) ? $name : ''; ?>"><br><br>

                    <!-- file -->
                    <label for="file" class="fw-bold">料理イメージ:</label>
                    <input type="file" class="form-control" name="file" id="file"><br><br>

                    <label for="category" class="fw-bold">カテゴリ:</label>
                    <select name="category" id="category" class="form-control">
                        <!-- <option value="" >オプションをお選び下さい</option> -->
                        <option value="">---</option>
                        <option value="main">メイン</option>
                        <option value="dessert">デザート</option>
                        <option value="drinks">ドリンク</option>
                    </select>

                    <div class="mb-3">
                        <label for="text_area" class="form-label fw-bold">説明</label>
                        <textarea required class="form-control" name="description" id="text_area" rows="3">
                                <?php echo isset($description) ? $description : ''; ?>
                            </textarea>
                    </div>
                    <label for="price " class="fw-bold">値段:</label>
                    <input type="text" required class="form-control" id="price" name="price" value="<?php echo isset($price) ? $price : ''; ?>"><br><br>

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
                    show_all();

                    // print_r($items); デバッグのために
                    ?>
                    <?php foreach ($items as $item => $value) { ?>
                        <tr>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="selected_id" value="<?php echo $value['id']; ?>">
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