<?php
require "../../JS-PHP-Carousel/db.php";
session_start();

if (isset($_POST["delete"])) {
    $password = $_POST["password"];
    $id = $_SESSION["sessionId"];
    if (!empty($password)) {
        $sql = "SELECT password FROM users WHERE id = $id";
        $result = mysqli_query($conn4, $sql);
        if ($row = mysqli_fetch_assoc($result)) {
            $passCheck = password_verify($password, $row["password"]);
            if ($passCheck == false) {
                header("Location: ../delete.php?error=Incorrectpassword");
                exit;
            } else {
                $sql = "DELETE FROM users WHERE id = $id";
                if (mysqli_query($conn4, $sql)) {
                    session_destroy();
                    header("Location: ../deleted.php?AccountDeleted");
                    exit;
                }

            }
        }
    } else {
        echo "Empty";
    }
}
