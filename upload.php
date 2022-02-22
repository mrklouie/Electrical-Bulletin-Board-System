<?php
require "includes/db.php";
session_start();
if (isset($_POST["upload"])) {
    $name = $_FILES["file"]["name"];
    $type = $_FILES["file"]["type"];
    $size = $_FILES["file"]["size"];
    $location = $_FILES["file"]["tmp_name"];
    $error = $_FILES["file"]["error"];

    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $details = mysqli_real_escape_string($conn, $_POST["details"]);

    //FILE EXTENSION
    $tempExtension = explode(".", $name);
    $fileExtension = end($tempExtension);

    $isAllowed = array("jpeg", "jpg", "png", "gif");

    if (!empty($name) || !empty($title) || !empty($details)) {
        $sql = "SELECT * FROM images";
        $result = mysqli_query($conn2, $sql);
        $rowsCount = mysqli_num_rows($result);

        if ($rowsCount < 6) {
            if (in_array($fileExtension, $isAllowed)) {

                if ($size < 10485760) {
                    $newName = uniqid("", true) . "." . $fileExtension;
                    $fileDestination = "uploads/" . $newName;
                    move_uploaded_file($location, $fileDestination);

                    $sql = "INSERT INTO images (details, images, title) VALUES ('" . $details . "','" . $newName . "','" . $title . "')";

                    if ($result = mysqli_query($conn2, $sql)) {

                        // SEND EMAIL TO USERS AFTER SUCCESSFULLY UPLOADED

                        // $sql = "SELECT * FROM users";
                        // $result = mysqli_query($conn, $sql);
                        // $rowsCount = mysqli_num_rows($result);
                        // if ($rowsCount > 0) {
                        //     while ($row = mysqli_fetch_assoc($result)) {

                        //         $tempMessage = substr($details, 0, 100);
                        //         $tempSubject = substr($title, 0, 50);

                        //         $sub = "Announcement Update [" . $tempSubject . "...]";

                        //         $msg = $tempMessage . "....read more.\n\n\n\nSent from: Electrical Bulletin Board System";

                        //         $rec = $row["email"];

                        //         if (mail($rec, $sub, $msg)) {

                        //         } else {
                        //             $_SESSION["error"] = "Image Uploaded but error occured while sending email to users";
                        //             header("Location: index.php?errorsendingemail");
                        //             exit;
                        //         }
                        //     }
                        //     $_SESSION["success"] = "New Announcement Added";
                        //     header("Location: index.php?success");
                        //     exit;
                        // } else {
                        //     echo "Nothing found omfg!";
                        // }
                        // SEND EMAIL TO USERS AFTER SUCCESSFULLY UPLOADED

                        $_SESSION["success"] = "Uploaded to the database";
                        header("Location: index.php?uploaded");
                        exit;
                    }
                } else {
                    $_SESSION["success"] = "File size too big!";
                    header("Location: index.php?toobig");
                    exit;
                }
            } else {
                $_SESSION["error"] = "File format not supported!";
                header("Location: index.php?emptyfields");
                exit;
            }

        } else {
            $_SESSION["error"] = "You've reached the maximun uploads";
            header("Location: index.php?errormaxupload");
            exit;
        }

    } else {
        $_SESSION["error"] = "Fill up all required fields";
        header("Location: index.php?emptyfields");
        exit;
    }

}
