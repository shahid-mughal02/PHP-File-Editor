<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['filename'])) {
    // Read the file
    $filename = $_GET['filename'];
    $path = "../" . $filename;
    if (file_exists($path)) {
        $file_contents = file_get_contents($path);
        echo $file_contents;
    } else {
        echo "";  // File does not exist, return empty content
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $filename = $_POST['filename'];
    $path = "../" . $filename;

    if ($_POST['action'] == 'create') {
        // Create a new file
        if (!file_exists($path)) {
            file_put_contents($path, '');  // Create an empty file
            echo "File created";
        } else {
            echo "File already exists";
        }
    } elseif ($_POST['action'] == 'delete') {
        // Delete the file
        if (file_exists($path)) {
            unlink($path);  // Delete the file
            echo "File deleted";
        } else {
            echo "File does not exist";
        }
    } elseif ($_POST['action'] == 'save' && isset($_POST['file_contents'])) {
        // Save the file
        $file_contents = $_POST['file_contents'];
        file_put_contents($path, $file_contents);
        echo "File saved";
    }
}
