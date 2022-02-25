<?php

require "db.php";
if (isset($_POST["delete-comment"])) {
    $cid = $_POST["cid"];
    $sql = "DELETE FROM tbl_comments WHERE cid = $cid";

    if ($result = mysqli_query($conn3, $sql)) {
        header("Location: index.php?DeletedSuccessfully");
        exit;
    } else {
        header("Location: index.php?ErrorDeleting");
        exit;
    }
} else {
    header("Location: index.php?Nofunctionyet");
    exit;
}
