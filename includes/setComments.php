<?php

require "db.php";
if (isset($_POST["submit"])) {

    if (!empty($_POST["message"])) {
        $message = mysqli_real_escape_string($conn, nl2br($_POST["message"]));
        $id = $_POST["id"];

        $sql = "INSERT INTO images (message) VALUES (?)";
        $stmt = mysqli_stmt_init($conn2);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../JS-PHP-Carousel/index.php?sqlerror");
            exit;

        } else {
            mysqli_stmt_bind_param($stmt, "s", $message);
            mysqli_stmt_execute($stmt);
            header("Location: ../JS-PHP-Carousel/index.php?commentsuccess");
        }
    } else {
        header("Location: ../JS-PHP-Carousel/index.php?fillupcomment");
        exit;
    }

}
