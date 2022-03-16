<?php
require "db.php";
session_start();
$id = $_POST["id"];
$username = $_POST["username"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirm-password"];
if (isset($_POST["submit"])) {
    echo "Id: " . $id . "<br>Username: " . $username . "<br>Password: " . $password . "<br>Confirm Password: " . $confirmPassword;

    if (!empty($username) && !empty($password) && !empty($confirmPassword)) {
        if ($password === $confirmPassword) {
            $sql = "SELECT username FROM users WHERE username = ?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../reset-account.php?Error=SqlError");
                exit;
            } else {
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $rowsCount = mysqli_stmt_num_rows($stmt);
                if ($rowsCount > 0) {
                    header("Location: ../reset-account.php?Error=UsernamealreadyExist");
                    exit;
                } else {
                    $sql = "UPDATE users SET username = ?, password = ? WHERE id = ?";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../reset-account.php?Error=SqlError");
                        exit;
                    } else {
                        $hashedPass = password_hash($password, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "sss", $username, $hashedPass, $id);
                        mysqli_stmt_execute($stmt);
                        unset($_SESSION["token"]);
                        echo "Changed Success!";
                        exit;
                    }
                }
            }
        } else {
            header("Location: ../reset-account.php?Error=Passwordnotmatched");
            exit;
        }

    } else {
        header("Location: ../reset-account.php?Error=PleaseFillout");
        exit;
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
