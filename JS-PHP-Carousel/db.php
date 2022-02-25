<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "dbImage";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
$conn3 = mysqli_connect($dbHost, $dbUser, $dbPass, "comments");
