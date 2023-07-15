<?php
include("database/db.php");
$title = '';
$description = '';
$image = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id=$id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $title = $row['title'];
        $descripcion = $row['descripcion'];
        $image = $row['imagen'];
    }
}

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $descripcion = $_POST['description'];

    $image = getimagesize($_FILES['image']['tmp_name']);
        if($image !== false){
            $image = $_FILES['image']['tmp_name'];
            $img_content = addslashes(file_get_contents($image));
        }else{
            $img_content = '';
        }

    $query = "UPDATE task SET title = '$title', descripcion = '$descripcion', imagen = '$img_content' WHERE id = $id";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Task Updated Successfully';
    $_SESSION['message_type'] = 'warning';
    header("Location: index.php");
    // echo $img_content;
}

include("include/header.php");
?>

<main class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?= $_GET['id']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <input type="text" name="title" class="form-control" placeholder="Task Title" value="<?=$title?>" autofocus>
                    </div>
                    <div class="form-group mb-3">
                        <textarea name="description" rows="2" class="form-control" placeholder="Task Description"><?=$descripcion?></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <input type="file" name="image" class="form-control">
                        <img src="imagen.php?id=<?=$id?>" alt="" class="w-100">
                    </div>
                    <input type="submit" name="update" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</main>
<?php include("include/footer.php") ?>