<?php
session_start();
require "db.php";

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {
        $_SESSION["error"] = "Please fill up all required forms";
        header("Location: ../login.php?error");
        exit;
    } else {
        // CHECK IF USERNAME IS VALID
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $_SESSION["sql"] = "SQL ERROR";
            header("Location: ../login.php?error");
            exit;
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $passCheck = password_verify($password, $row["password"]);
                if ($passCheck == false) {
                    $_SESSION["error"] = "Wrong username or password";
                    header("Location: ../login.php?error");
                    exit;
                } else {
                    $_SESSION["sessionId"] = $row["id"];
                    $_SESSION["sessionUsername"] = $row["username"];
                    $_SESSION["sessionEmail"] = $row["email"];
                    header("Location: ../index.php?loggedin");
                    exit;
                }
            } else {
                $_SESSION["error"] = "Wrong username or password";
                header("Location: ../login.php?error123");
                exit;
            }
        }

    }
}
