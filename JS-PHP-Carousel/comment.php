<?php

require "db.php";

if (isset($_POST["submit-comment"])) {

    if (!empty($_POST["comment"])) {
        $date = $_POST["date"];
        $message = $_POST["comment"];
        $username = $_POST["username"];

        $sql = "INSERT INTO tbl_comments (date, username, message) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn3);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: index.php?sqlerror");
            exit;
        } else {
            mysqli_stmt_bind_param($stmt, "sss", $date, $username, $message);
            mysqli_stmt_execute($stmt);
            header("Location: index.php?commentSuccess!");
        }
    } else {
        header("Location: index.php?errorPleasecommentsomething");
        exit;
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn3);

} else if (isset($_POST["delete-comment"])) {
    $cid = $_POST["cid"];
    $sql = "DELETE FROM tbl_comments WHERE cid = $cid";

    if ($result = mysqli_query($conn3, $sql)) {
        header("Location: index.php?DeletedSuccessfully");
        exit;
    } else {
        header("Location: index.php?ErrorDeleting");
        exit;
    }
} else if (isset($_POST["submit-changes"])) {
    $message = $_POST["user-comment"];
    $cid = $_POST["cid"];
    echo $message;

    $sql = "UPDATE tbl_comments SET message = ? WHERE cid = ?";
    $stmt = mysqli_stmt_init($conn3);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: index.php?sqlerror");
        exit;
    } else {
        mysqli_stmt_bind_param($stmt, "si", $message, $cid);
        mysqli_stmt_execute($stmt);
        header("Location: index.php?commentSuccess!");
        exit;
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn3);
}

// if (!empty($_POST["comment"])) {
//     $message = $_POST["comment"];
//     $username = $_POST["username"];

//     $sql = "INSERT INTO tbl_comments (username, message) VALUES (?, ?)";
//     $stmt = mysqli_stmt_init($conn3);
//     if (!mysqli_stmt_prepare($stmt, $sql)) {
//         header("Location: index.php?sqlerror");
//         exit;
//     } else {
//         mysqli_stmt_bind_param($stmt, "ss", $username, $message);
//         mysqli_stmt_execute($stmt);
//         header("Location: index.php?commentSuccess!");
//     }
// } else {
//     header("Location: index.php?errorPleasecommentsomething");
//     exit;

// }
// mysqli_stmt_close($stmt);
// mysqli_close($conn3);
