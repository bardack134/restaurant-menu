<?php include("head.php"); ?>
<?php
session_start();

// ユーザーがセッションに存在しない場合、ログインページにリダイレクト
if (!isset($_SESSION['user'])) {
    header('location:login.php');
}
?>

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card my-4">
                <div class="card-header">プロジェクト情報</div>
                <div class="card-body">
                    <form action="admin.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="project_id" value="">

                        <label for="name">プロジェクト名:</label>
                        <input type="text" required class="form-control" id="name" name="name" value=""><br><br>

                        <!-- file -->
                        <label for="file">プロジェクトイメージ:</label>
                        <input type="file" class="form-control" name="file" id="file"><br><br>

                        <div class="mb-3">
                            <label for="text_area" class="form-label">説明</label>
                            <textarea required class="form-control" name="Description" id="text_area" rows="3">
                               
                            </textarea>
                        </div>

                        <label for="homepage">URL:</label>
                        <input type="url" required class="form-control" id="homepage" name="url" value="">

                        <input type="submit" class="btn btn-success my-3" value="add">
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
                            <th scope="col">説明</th>
                            <th scope="col">URL</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="select" value="">
                                    <button name="update_data" type="submit" class="btn btn-warning" value="update data">Select</button>
                                </form>
                                <a href="" class="btn btn-danger">削除❌</a>
                            </td>

                            <td><img width="100px" src="" alt=""></td>
                            <td class="text-wrap" style="max-width: 300px;"></td>

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>