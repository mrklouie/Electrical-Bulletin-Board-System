<?php

if (isset($_POST["upload"])) {
    $name = $_FILES["file"]["name"];
    $name = $_FILES["file"]["type"];

    $tempExtension = explode(".", $name);
    $fileExtension = end($tempExtension);

    echo $fileExtension;

}
