<?php

session_start();

require_once "includes/db.php";

if (isset($_POST["delete"])) {
    if (!empty($_POST["id"])) {
        $sql = "SELECT images FROM images WHERE id =" . $_POST["id"];
        $result = mysqli_query($conn2, $sql);
        if ($row = mysqli_fetch_assoc($result)) {
            $sql = "DELETE from images WHERE id = '" . $_POST["id"] . "'";
            $result = mysqli_query($conn2, $sql);

            unlink("uploads/" . $row["images"]);
            $_SESSION["success"] = "Image Deleted Successfully!";
            header("Location: index.php?Successupload");
            exit;

        } else {
            $_SESSION["error"] = "Failed Deleting";
            header("Location: index.php?faileDDDDDeleting");
            exit;
        }
    } else {
        $_SESSION['error'] = 'Please Select Image or Write title';
        header("Location: index.php?error");
        exit;
    }
}
