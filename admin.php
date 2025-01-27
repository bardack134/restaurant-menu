<?php include("head.php"); ?>
<?php include("conection.php"); ?>
<?php
session_start();


// ユーザーがセッションに存在しない場合、ログインページにリダイレクト
if (!isset($_SESSION['user'])) {
    header('location:login.php');
}

function adding()
{
    echo 'I am adding';
    $ObjConnection = new conection();
    // print_r($_POST);
    $name = $_POST['name'];
    $description = $_POST['description'];
    $category = $_POST['category'];

    print_r($name);
    print_r($description);
    print_r($category);
    // TODO; price column, prince input


}

function update()
{
    return 'I am updating';
}

function delete()
{
    return 'I am deleting';
}

if (isset($_POST['action'])) {
    // var_dump($_POST['action']); //for debug

    $option = $_POST['action'];

    $return_value = match ($option) {
        'add' => adding(),
        'update' => update(),
        'delete' => delete(),
    };

    var_dump($return_value);
} else {
    echo 'アクションが提供されていません';
}


?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card my-4">
                <div class="card-header">プロジェクト情報</div>
                <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="project_id" value="">

                        <label for="name">プロジェクト名:</label>
                        <input type="text" required class="form-control" id="name" name="name" value=""><br><br>

                        <!-- file -->
                        <label for="file">プロジェクトイメージ:</label>
                        <input type="file" class="form-control" name="file" id="file"><br><br>

                        <label for="category">カテゴリ:</label>
                        <select name="category" id="category" class="form-control" >
                            <option value="">オプションをお選び下さい</option>
                            <option value="main">メイン</option>
                            <option value="dessert">デザート</option>
                            <option value="drinks">ドリンク</option>
                        </select>

                        <div class="mb-3">
                            <label for="text_area" class="form-label">説明</label>
                            <textarea required class="form-control" name="description" id="text_area" rows="3">

                            </textarea>
                        </div>

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
                            <th scope="col">name名</th>
                            <th scope="col">イメージ</th>
                            <th scope="col">カテゴリ</th>
                            <th scope="col">説明</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ObjConnection = new conection();
                        $sql = "SELECT * FROM menu";
                        $items = $ObjConnection->consult($sql);
                        print_r($items);
                        ?>
                        <?php foreach ($items as $item => $value) { ?>
                            <tr>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="select" value="">
                                        <button name="update_data" type="submit" class="btn btn-warning" value="update data">Select</button>
                                    </form>
                                    <a href="" class="btn btn-danger">削除❌</a>
                                </td>
                                <td>"<?php echo $value['id']; ?>"</td>
                                <td>"<?php echo $value['name']; ?>"</td>
                                <td><img width="100px" src="" alt=""></td>
                                <td>"<?php echo $value['category']; ?>"</td>
                                <td class="text-wrap" style="max-width: 300px;">"<?php echo $value['description']; ?>"</td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>