<?php
    include("../general_config.php");

    function uploadFile($file) { #should return the path to the file in my server
        $upload_dir = (isset($file_upload_dir))? $file_upload_dir : "../upload_dir"; 
        define("UPLOAD_DIRECTORY", $upload_dir);
        $tempUploadedFileName = $file['tmp_name'];
        $file = $file['name'];
        $destination = UPLOAD_DIRECTORY . "/" .$file;

        move_uploaded_file($tempUploadedFileName, $destination);

        return $destination;
    }
?>