<?php

if (isset($_POST["logout"])) {
    session_start();
    unset($_SESSION["sessionId"]);
    unset($_SESSION["sessionUsername"]);
    header("Location: ../login.php?loggedout");
}
