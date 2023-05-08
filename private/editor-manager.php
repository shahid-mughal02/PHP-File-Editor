<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['filename'])) {
    // Read the file
    $filename = $_GET['filename'];
    $path = "../" . $filename;
    $file_contents = file_get_contents($path);
    echo $file_contents;
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['filename']) && isset($_POST['file_contents'])) {
    // Save the file
    $filename = $_POST['filename'];
    $path = "../" . $filename;
    $file_contents = $_POST['file_contents'];
    $filepath = ".../" . $file_contents;
    file_put_contents($path, $filepath);
}
