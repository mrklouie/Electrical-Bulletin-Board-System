<?php
require "db.php";
if (isset($_POST["send-contact"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $date = $_POST["date"];

    echo "Name: " . $name . "<br>Email: " . $email . "<br>Message: " . $message . "<br>Date: " . $date;

    if (!empty($name) && !empty($email) && !empty($message) && !empty($date)) {
        $sql = "INSERT INTO tbl_comments (date, message, name, email) VALUES (?, ? ,?, ?)";
        $stmt = mysqli_stmt_init($conn3);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: index.php?sqlerror");
            exit;
        } else {
            mysqli_stmt_bind_param($stmt, "ssss", $date, $message, $name, $email);
            mysqli_stmt_execute($stmt);
            header("Location: index.php?Feedbacksent");
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn3);

    } else {
        header("Location: index.php?Error=Fillout");
        exit;
    }

    // $name = $_POST["name"];
    // $email = $_POST["email"];
    // $message = $_POST["message"];
    // $date = $_POST["date"];
    // if (!empty($name) && !empty($email) && !empty($message) && !empty($date)) {

    //     $sql = "INSERT INTO tbl_comments (date, name, message) VALUES (?, ?, ?)";
    //     $stmt = mysqli_stmt_init($conn3);
    //     if (!mysqli_stmt_prepare($stmt, $sql)) {
    //         header("Location: index.php?sqlerror");
    //         exit;
    //     } else {
    //         mysqli_stmt_bind_param($stmt, "sss", $date, $name, $message);
    //         mysqli_stmt_execute($stmt);
    //         header("Location: index.php?messageSuccess!");
    //     }

    //     mysqli_stmt_close($stmt);
    //     mysqli_close($conn3);
    // } else {
    //     header("Location: index.php?Error=Fillout");
    //     exit;
    // }

    // echo $_POST["date"];
}
