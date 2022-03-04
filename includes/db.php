<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "dbTest";

$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
$conn2 = mysqli_connect($dbHost, $dbUser, $dbPassword, "dbImage");
