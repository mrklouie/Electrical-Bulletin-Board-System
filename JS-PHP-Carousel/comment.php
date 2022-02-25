<?php

require "db.php";

if (isset($_POST["submit"])) {
    if (!empty($_POST["comment"])) {
        $message = $_POST["comment"];
        $username = $_POST["username"];

        $sql = "INSERT INTO tbl_comments (username, message) VALUES (?, ?)";
        $stmt = mysqli_stmt_init($conn3);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: index.php?sqlerror");
            exit;
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $username, $message);
            mysqli_stmt_execute($stmt);
            header("Location: index.php?commentSuccess!");
        }
    } else {
        header("Location: index.php?errorPleasecommentsomething");
        exit;

    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn3);
}
