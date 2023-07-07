<?php
    if(isset($_FILES['filetoupload'])){
        $file_name = $_FILES['filetoupload']['name'];
        $file_size = $_FILES['filetoupload']['size'];
        $file_tmp = $_FILES['filetoupload']['tmp_name'];
        $file_type = $_FILES['filetoupload']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['filetoupload']['name'])));

        if($file_size > 32212254720) {
            echo 'your file is too large! upload something under 30GB.';
        } else {

        $extensions= array("php","js");

        if(in_array($file_ext,$extensions)=== true ){
            echo 'we dont allow file uploads of this type for security reasons.';
        } else {

        $newfilename = 'files/'.uniqid().'.'.$file_ext;

        move_uploaded_file($file_tmp,$newfilename);
        echo('https://file.haus/cdn1/' . htmlspecialchars($newfilename) . '');
     }
    }
    } else echo('error: file not set');

?>
