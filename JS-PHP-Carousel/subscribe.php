<?php
session_start();
require "../includes/db.php";
$id = $_POST["id"];
$email = $_POST["email"];
if (isset($_POST["subscribe"])) {
    $sql = "SELECT email FROM users WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: index.php?Error=SQL ERROR");
        exit;
    } else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $rowsCount = mysqli_stmt_num_rows($stmt);
        if ($rowsCount > 0) {
            header("Location: index.php?Error=Email Already Exist");
            exit;
        } else {
            $sql = "UPDATE users SET email = ? WHERE id = ?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: index.php?Error=SQL ERROR");
                exit;
            } else {
                mysqli_stmt_bind_param($stmt, "ss", $email, $id);
                mysqli_stmt_execute($stmt);
                $_SESSION["newEmail"] = $email;
                header("Location: index.php?Success");
                exit;
            }
        }
    }
    mysqli_stmt_close($smt);
    mysqli_close($conn);
}
