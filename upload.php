<?php
$target_dir = "data/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

echo print_R($_SERVER, true);

if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    $url = '{0}://{1}{2}/{3}';
    $url = str_replace("{0}", $_SERVER["REQUEST_SCHEME"], $url);
    $url = str_replace("{1}", $_SERVER["HTTP_HOST"], $url);
    $url = str_replace("{2}", dirname($_SERVER["PHP_SELF"]), $url);
    $url = str_replace("{3}", $target_file, $url);
    //echo $url ;

    $json = str_replace("{0}",  $url, '{"result":"OK", "url":"{0}"}');
} else {
    $json = '{"result":"NG", "url":"" }';
}

echo $json; //json_decode($json, true);

?>
