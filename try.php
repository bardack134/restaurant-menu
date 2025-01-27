<?php include("cabecera.php"); ?>
<?php include("conexion.php"); ?>
<?php
#TODO: analizar codgo y leer chat de chatgpt
#TODO: agregar funcion borrar imagen si se esta agregando una nueva imagen 

if ($_POST) {
    print_r($_POST); //for debugging
    
    if (isset($_POST['select'])) {

        // Obtener datos del proyecto seleccionado para actualizarlo
        $ObjConnection = new conexion();
        $id = $_POST['select'];
        $sql = "SELECT * FROM projects WHERE id=$id";
        $data = $ObjConnection->consult($sql);

        // Llenar el formulario con los datos recuperados
        $name = $data[0]['name'];
        $description = $data[0]['description'];
        $url = $data[0]['url'];
        
    } else {
        if (isset($_POST['action']) && $_POST['action'] === 'update') {
            // Actualizar proyecto existente
            echo "i am updating";
            
            $ObjConnection = new conexion();
            $id = $_POST['project_id']; // El ID del proyecto a actualizar

            // Obtener datos actuales del proyecto para eliminar la imagen anterior
            $sql = "SELECT image FROM projects WHERE id=$id";
            $currentData = $ObjConnection->consult($sql);
            $oldImage = $currentData[0]['image'];

            // estos son los nuevos datos actualizados, enviados por el formulario kun
            $name = $_POST['name'];
            $description = $_POST['Description'];
            $url = $_POST['url'];

            if ($_FILES['file']['name']) {
                // Si se sube una nueva imagen, actualizamos la imagen también
                $date = new DateTime();
                $imagen_name = $date->getTimestamp() . "-" . $_FILES['file']['name'];
                $temporal_place = $_FILES['file']['tmp_name'];
                $send_to = "imagenes/" . $imagen_name;
                move_uploaded_file($temporal_place, $send_to);

                 // Eliminamos la imagen anterior kun
                if (file_exists("imagenes/" . $oldImage)) {
                    unlink("imagenes/" . $oldImage);
                }

                $sql = "UPDATE projects SET name = '$name', image = '$imagen_name', description = '$description', url = '$url' WHERE id = $id";
            } else {
                // Si no se sube una nueva imagen, solo actualizamos los demás campos
                $sql = "UPDATE projects SET name = '$name', description = '$description', url = '$url' WHERE id = $id";
            }

            $ObjConnection->execute_sql($sql);
            header('Location:admin.php');
        } else {
            // Agregar un nuevo proyecto
            echo "i am adding";

            $date = new DateTime();
            $ObjConnection = new conexion();

            $name = $_POST['name'];
            $description = $_POST['Description'];
            $imagen_name = $date->getTimestamp() . "-" . $_FILES['file']['name'];
            $url = $_POST['url'];

            $temporal_place = $_FILES['file']['tmp_name'];
            $send_to = "imagenes/" . $imagen_name;
            move_uploaded_file($temporal_place, $send_to);

            $sql = "INSERT INTO projects (name, image, description, url) VALUES ('$name', '$imagen_name', '$description', '$url')";
            $ObjConnection->execute_sql($sql);

            header('Location:admin.php');
        }
    }
}

if ($_GET) {
    $ObjConnection = new conexion();
    $sql_1 = "SELECT image FROM projects WHERE id=" . $_GET['delete_id'];
    $projects = $ObjConnection->consult($sql_1);
    unlink("imagenes/" . $projects[0]['image']); // Borrar la imagen del proyecto

    $sql_2 = "DELETE FROM `projects` WHERE `projects`.`id` =" . $_GET['delete_id'];
    $ObjConnection->execute_sql($sql_2);

    header('Location:admin.php');
}

$ObjConnection = new conexion();
$sql = "SELECT * FROM projects";
$projects = $ObjConnection->consult($sql);

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card my-4">
                <div class="card-header">プロジェクト情報</div>
                <div class="card-body">
                    <form action="admin.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="project_id" value="<?php echo isset($id) ? $id : ''; ?>">
                        
                        <label for="name">プロジェクト名:</label>
                        <input type="text" required class="form-control" id="name" name="name" value="<?php echo isset($name) ? $name : ''; ?>"><br><br>
                        
                        <!-- file -->
                        <label for="file">プロジェクトイメージ:</label>
                        <input type="file" class="form-control" name="file" id="file"><br><br>
                        
                        <div class="mb-3">
                            <label for="text_area" class="form-label">説明</label>
                            <textarea required class="form-control" name="Description" id="text_area" rows="3">
                                <?php echo isset($description) ? $description : ''; ?>
                            </textarea>
                        </div>
                        
                        <label for="homepage">URL:</label>
                        <input type="url" required class="form-control" id="homepage" name="url" value="<?php echo isset($url) ? $url : ''; ?>">

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
                        <?php foreach ($projects as $project) { ?>
                            <tr>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="select" value="<?php echo $project['id']; ?>">
                                        <button name="update_data" type="submit" class="btn btn-warning" value="update data">Select</button>
                                    </form>
                                    <a href="?delete_id=<?php echo $project['id']; ?>" class="btn btn-danger">削除❌</a>
                                </td>
                                <td><?php echo $project['id']; ?></td>
                                <td><?php echo $project['name']; ?></td>
                                <td><img width="100px" src="imagenes/<?php echo $project['image']; ?>" alt=""></td>
                                <td class="text-wrap" style="max-width: 300px;"><?php echo $project['description']; ?></td>
                                <td><?php echo $project['url']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include("pie.php"); ?>