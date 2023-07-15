<?php
include_once("database/db.php");
?>

<?php
include_once("include/header.php");
?>
<main class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <!-- MESSAGES -->
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php session_unset();
            } ?>
            <div class="card card-body">
                <form action="save_task.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
                    </div>
                    <div class="form-group mb-3">
                        <textarea name="description" rows="2" class="form-control" placeholder="Task Description"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <input type="submit" value="Save Task" name="save_task" class="btn btn-success w-100 btn-block">
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            Title
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Created At
                        </th>
                        <th>
                            Image
                        </th>
                        <th colspan="2" class="text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM task";
                        $result_tasks = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_assoc($result_tasks)){
                            ?>
                            <tr>
                                <td><?=$row['title'] ?></td>
                                <td><?=$row['descripcion'] ?></td>
                                <td><?=$row['create_at'] ?></td>
                                <td class="resize-image"><img src="imagen.php?id=<?=$row['id'] ?>" alt="" class="w-100"></td>
                                <td>
                                    <a href="edit.php?id=<?=$row['id'] ?>" class="btn btn-secondary rounded-circle">
                                        <ion-icon name="create"></ion-icon>
                                    </a>
                                </td>
                                <td>
                                    <a href="delete_task.php?id=<?=$row['id'] ?>" class="btn btn-danger rounded-circle">
                                        <ion-icon name="trash"></ion-icon>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php
include_once("include/footer.php");
?>