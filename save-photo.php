<?php
// Path to the "photos" folder
$uploadDir = 'photos/';

// Create the "photos" folder if it doesn't exist
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

if (isset($_FILES['photo'])) {
    $photoFile = $_FILES['photo'];
    $fileName = basename($photoFile['name']);
    $filePath = $uploadDir . $fileName;

    // Check if the file was uploaded without errors
    if ($photoFile['error'] === UPLOAD_ERR_OK) {
        if (move_uploaded_file($photoFile['tmp_name'], $filePath)) {
            echo 'Photo saved successfully!';
        } else {
            echo 'Error saving photo: ' . error_get_last()['message'];
        }
    } else {
        echo 'Error uploading file: ' . $photoFile['error'];
    }
} else {
    echo 'No photo file received.';
}