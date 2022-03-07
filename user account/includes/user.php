<?php
require "../../JS-PHP-Carousel/db.php";
session_start();

if (isset($_POST["save"])) {
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $id = $_SESSION["sessionId"];
    if (!empty($password) && !empty($confirmPassword)) {
        if ($password !== $confirmPassword) {
            header("Location: ../index.php?error=passwordnotmatched");
            exit;

        } else {

            $sql = "SELECT password FROM users WHERE id = $id";
            $result = mysqli_query($conn4, $sql);
            if ($row = mysqli_fetch_assoc($result)) {
                $passCheck = password_verify($password, $row["password"]);

                if ($passCheck == false) {
                    header("Location: ../index.php?error=Incorrectpassword");
                    exit;
                } else {
                    $sql = "UPDATE users
                    SET username = '" . $username . "',
                    email = '" . $email . "',
                    fname = '" . $fname . "',
                    lname = '" . $lname . "'
                    WHERE id = '" . $id . "'";
                    $result = mysqli_query($conn4, $sql);
                    if ($result) {
                        header("Location: ../index.php?Success");
                        exit;
                    }

                }
            }
        }
    } else {
        header("Location: ../index.php?error=pleasefilloutallrequiredfields");
        exit;

    }

}
