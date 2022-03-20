<?php

session_start();

require_once "includes/db.php";

if (isset($_POST["delete"])) {
    if (!empty($_POST["id"])) {
        $sql = "SELECT * FROM images WHERE id = " . $_POST["id"];
        $result = mysqli_query($conn2, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $images = $row["images"];
            $title = mysqli_real_escape_string($conn2, nl2br($row["title"]));
            $details = mysqli_real_escape_string($conn2, nl2br($row["details"]));
        }
        $sql = "INSERT INTO tbl_archives (images, title, details) VALUES ('" . $images . "', '" . $title . "', '" . $details . "')";
        if (mysqli_query($conn2, $sql)) {
            $sql = "SELECT images FROM images WHERE id =" . $_POST["id"];
            $result = mysqli_query($conn2, $sql);
            if ($row = mysqli_fetch_assoc($result)) {
                $sql = "DELETE from images WHERE id = '" . $_POST["id"] . "'";
                $result = mysqli_query($conn2, $sql);
                $_SESSION["success"] = "Image Deleted Successfully!";
                header("Location: index.php?Success=Archived");
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
} else if (isset($_POST["delete-archive"])) {
    $sql = "SELECT images FROM tbl_archives WHERE archives_id =" . $_POST["archives_id"];
    $result = mysqli_query($conn2, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        $sql = "DELETE FROM tbl_archives WHERE archives_id =" . $_POST["archives_id"];
        if (mysqli_query($conn2, $sql)) {
            if (!unlink("uploads/" . $row["images"])) {
                header("Location: archives.php?Error=unlink failed");
                exit;
            } else {
                header("Location: archives.php?Success=Deleted");
                exit;
            }
        } else {
            header("Location: archives.php?Error=Delete failed");
            exit;
        }
    }

}
