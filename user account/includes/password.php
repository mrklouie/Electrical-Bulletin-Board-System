<?php

require "../../JS-PHP-Carousel/db.php";
session_start();
if (isset($_POST["changePass"])) {
    $id = $_SESSION["sessionId"];
    $cOldPassword = $_POST["cOldPassword"];
    $cPassword = $_POST["cPassword"];
    $cConfirmPassword = $_POST["cConfirmPassword"];
    if (!empty($cPassword) && !empty($cOldPassword) && !empty($cConfirmPassword)) {
        if ($cPassword === $cConfirmPassword) {
            $sql = "SELECT password FROM users WHERE id = $id";
            $result = mysqli_query($conn4, $sql);
            if ($row = mysqli_fetch_assoc($result)) {
                $passCheck = password_verify($cOldPassword, $row["password"]);
                $newPassCheck = password_verify($cPassword, $row["password"]);
                if ($newPassCheck == false) {
                    if ($passCheck == false) {
                        header("Location: ../changePass.php?error=IncorrectPassowrd");
                        exit;
                    } else {
                        $sql = "UPDATE users SET password = ? WHERE id = ?";
                        $stmt = mysqli_stmt_init($conn4);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            header("Location: ../changePass.php?SQLERROR");
                            exit;
                        } else {
                            $hashedPassword = password_hash($cPassword, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ss", $hashedPassword, $id);
                            mysqli_stmt_execute($stmt);
                            $_SESSION["password"] = "Password Changed";
                            header("Location: ../changePass.php?Success=PasswordChanged");
                            exit;
                        }

                    }
                } else {
                    $_SESSION["error-password"] = "Choose a new password";
                    header("Location: ../changePass.php?error=Choosenewpassword");
                    exit;
                }
            }
        } else {
            header("Location: ../changePass.php?error=Passwordnotmatched");
            exit;
        }
    } else {
        header("Location: ../changePass.php?error=Filloutrequiredfields");
        exit;
    }
}
