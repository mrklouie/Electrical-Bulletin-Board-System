<?php
require "includes/db.php";
session_start();
if (isset($_POST["password-reset"])) {

    $email = $_POST["email"];
    if (!empty($email)) {

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $_SESSION["requestError"] = "SQL ERROR";
            header("Location: reset-req.php?Error=SQL ERROR");
            exit;
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                if ($email == $row["email"]) {
                    $token = bin2hex(random_bytes(3));
                    $_SESSION["token"] = $token;
                    $message = "Here is the Code " . $token;
                    $subject = "Code Verification";
                    $rec = $row["email"];
                    $sent = mail($rec, $subject, $message);
                    if ($sent) {
                        $startTime = $_SERVER["REQUEST_TIME"];
                        $_SESSION["time"] = $startTime;
                        $_SESSION["email"] = $row["email"];
                        header("Location: recover.php");
                        exit;
                    } else {
                        $_SESSION["requestError"] = "Failed to send through email";
                        header("Location: reset-req.php?Error=Failed to send through email");
                        exit;
                    }
                } else {
                    $_SESSION["requestError"] = "Something went wrong";
                    header("Location: reset-req.php?Error=Something went wrong");
                    exit;
                }
            } else {
                $_SESSION["requestError"] = "Can't find " . $email;
                header("Location: reset-req.php?Error=Email not found");
                exit;
            }
        }
    } else {
        $_SESSION["requestError"] = "Please enter your email address";
        header("Location: reset-req.php?Error=Fillout");
        exit;
    }

} else if (isset($_POST["verify-code"])) {
    $code = $_POST["code"];
    $endTime = $_SERVER["REQUEST_TIME"];
    if (!empty($code)) {
        if (isset($_SESSION["token"]) && isset($_SESSION["time"])) {
            if (($endTime - $_SESSION["time"]) > 300) {
                $_SESSION["tokenError"] = "Code expired. Please Try again!";
                unset($_SESSION["token"]);
                unset($_SESSION["time"]);
                header("Location: recover.php");
                exit;
            } else if ($_SESSION["token"] === $code) {
                header("Location: reset-account.php");
                exit;
            } else {
                $_SESSION["tokenError"] = "Code does not exist";
                header("Location: recover.php");
                exit;
            }
        } else {
            $_SESSION["tokenError"] = "Code does not exist";
            header("Location: recover.php");
            exit;
        }
    } else {
        $_SESSION["tokenError"] = "Please enter the code";
        header("Location: recover.php");
        exit;
    }
}
