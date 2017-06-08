<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

    $json = {"url": $target_file, "result": "OK"}
    //echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
    echo json_decode($json, true);
} else {
    $json = {"url": $target_file, "result": "NG"}
    echo json_decode($json, true);
}

?>
