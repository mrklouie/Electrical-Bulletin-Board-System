<?php
require "db.php";
session_start();
if (isset($_POST["recover"])) {
    $sql = "SELECT * FROM tbl_archives WHERE archives_id = " . $_POST["archives_id"];
    if (!$result = mysqli_query($conn2, $sql)) {
        echo "Quer Error";
    } else {
        if ($row = mysqli_fetch_assoc($result)) {
            // echo "<pre>";
            // print_r($row);
            // echo "</pre>";
            $details = mysqli_real_escape_string($conn2, nl2br($row["details"]));
            $images = mysqli_real_escape_string($conn2, nl2br($row["images"]));
            $title = mysqli_real_escape_string($conn2, nl2br($row["title"]));
            $sql = "INSERT INTO images (details, images, title) VALUES ('" . $details . "', '" . $images . "', '" . $title . "')";
            if (!$result = mysqli_query($conn2, $sql)) {
                echo "Quer Error";
            } else {
                $sql = "DELETE FROM tbl_archives WHERE archives_id = " . $_POST["archives_id"];
                if (!$result = mysqli_query($conn2, $sql)) {
                    echo "Quer Error";
                } else {
                    header("Location: ../archives_1.php?Success");
                    exit;
                }
            }
        }
    }
} else if (isset($_POST["delete"])) {
    $sql = "DELETE FROM tbl_archives WHERE archives_id = " . $_POST["archives_id"];
    if (!$result = mysqli_query($conn2, $sql)) {
        echo "Quer Error";
    } else {
        header("Location: ../archives_1.php?Success=Deleted");
        exit;
    }
}
