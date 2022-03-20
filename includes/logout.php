<?php

session_start();
unset($_SESSION["sessionId"]);
unset($_SESSION["sessionUsername"]);
session_destroy();
header("Location: ../login.php?loggedout");
