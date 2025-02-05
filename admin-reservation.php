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
   
function show_all()
{
    global $items;
    $ObjConnection = new conection();
    $sql = "SELECT * FROM reservation";
    $items = $ObjConnection->consult($sql);
    return $items;
}
?>

<div class="container">
    
    <div class="col-md-12 py-4">
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Date</th>
                        <th scope="col">Number of People</th>
                        <th scope="col">Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    show_all();

                    print_r($items); //デバッグのために
                    ?>
                    <?php
                    foreach ($items as $item => $value) { 
                        ?>
                        <tr>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="selected_id" value="<?php echo "id" ?>">
                                    
                                    <button name="action" type="submit" class="btn btn-danger mt-2" value="delete">削除❌</button>
                                </form>

                            </td>
                            <td><?php echo isset($value['Name']) ?  $value['Name'] : '';  ?></td>
                            <td><?php echo isset($value['Email']) ?  $value['Email'] : '';  ?></td>
                            <td><?php echo isset($value['Phone']) ?  $value['Phone'] : '';  ?></td>
                            <td><?php echo isset($value['Date']) ?  $value['Date'] : '';  ?></td>
                            <td><?php echo isset($value['NumberOfPeople']) ?  $value['NumberOfPeople'] : '';  ?></td>
                            <td class="text-wrap" style="max-width: 300px;"><?php echo isset($value['Message'])? $value['Message']: '';  ?></td>
                            <td><?php echo "Message"; ?></td>
                        </tr>
                    <?php 
                 }
                 ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<?php include("footer.php"); ?>