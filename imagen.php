<?php
    include('database/db.php');
    $query = "SELECT imagen FROM task WHERE id = 1";
    $result = mysqli_query($conn, $query);
    $imgData = mysqli_fetch_assoc($result);
    header("Content-type: image/jpg"); 
    echo $imgData['imagen']; 
?>