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

        </div>
    </div>
</main>
<?php
include_once("include/footer.php");
?>