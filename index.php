<?php
    // Specify the allowed IP address for file uploads
    $allowedIP = '0.0.0.0';

    // Check if the file is set and the request is coming from the allowed IP
    if (isset($_FILES['filetoupload']) && $_SERVER['REMOTE_ADDR'] === $allowedIP) {
        $file_name = $_FILES['filetoupload']['name'];
        $file_size = $_FILES['filetoupload']['size'];
        $file_tmp = $_FILES['filetoupload']['tmp_name'];
        $file_type = $_FILES['filetoupload']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['filetoupload']['name'])));

        if ($file_size > 32212254720) {
            echo 'Your file is too large! Upload something under 30GB.';
        } else {
            $extensions = array("php", "js");

            if (in_array($file_ext, $extensions)) {
                echo 'We do not allow file uploads of this type for security reasons.';
            } else {
                $newfilename = 'files/' . uniqid() . '.' . $file_ext;
                move_uploaded_file($file_tmp, $newfilename);
                echo 'https://file.haus/cdn1/' . htmlspecialchars($newfilename);
            }
        }
    } else {
        // Block access for unauthorized IP addresses
        echo 'Access denied. Please make sure you are uploading from the correct IP address.';
    }
?>
