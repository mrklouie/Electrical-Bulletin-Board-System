<?php

session_start();
require "db.php";

if (isset($_POST["signup"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    if (empty($username) || empty($password) || empty($confirmPassword)) {
        $_SESSION["error"] = "Please fill up all required fields";
        header("Location: ../register.php?error");
        exit;
    } elseif ($password !== $confirmPassword) {
        $_SESSION["error"] = "Password does not match";
        header("Location: ../register.php?error");
        exit;
    } elseif (!preg_match("/^[a-zA-Z0-9]*/", $username)) {
        $_SESSION["error"] = "Invalid Username";
        header("Location: register.php?error=invaludusername");
        exit;

    } else {
        //CHECK IF USERNAME IS TAKEN
        $sql = "SELECT username FROM users WHERE username = ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $_SESSION["sql"] = "SQL ERROR";
            header("Location: ../register.php?error");
            exit;
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rowsCount = mysqli_stmt_num_rows($stmt);

            if ($rowsCount > 0) {
                $_SESSION["error"] = "Username already Taken";
                header("Location: ../register.php?usernamealreadytaken");
                exit;
            } else {
                $sql = "INSERT INTO users (username, password) VALUES (?,?)";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    $_SESSION["sql"] = "SQL ERROR";
                    header("Location: ../register.php?sqlerror");
                    exit;
                } else {
                    $hashedPass = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPass);
                    mysqli_stmt_execute($stmt);
                    $_SESSION["success"] = "Registered!";
                    header("Location: ../register.php?success");
                    exit;
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
