<?php
require "../../JS-PHP-Carousel/db.php";

if (isset($_POST["save"])) {
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    if (!empty($password) && !empty($confirmPassword)) {
        if ($password !== $confirmPassword) {
            header("Location: ../index.php?error=passwordnotmatched");
            exit;

        } else {
            header("Location: ../index.php?success");
            exit;
        }
    } else {
        header("Location: ../index.php?error=pleasefilloutallrequiredfields");
        exit;

    }

}
