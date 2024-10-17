<?php
// Get the current directory
$directory = __DIR__;

// Function to list files, excluding index.php and .htaccess
function listFilesInCurrentDirectory($directory)
{
    // Exclude unwanted files
    $files = array_diff(scandir($directory), array('..', '.', 'index.php', '.htaccess'));
    $fileList = [];

    foreach ($files as $file) {
        $filePath = $directory . '/' . $file;
        // Only list files, not folders
        if (is_file($filePath)) {
            $fileList[] = $file;
        }
    }

    return $fileList;
}

// Get the list of files in the current directory
$files = listFilesInCurrentDirectory($directory);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['email']) && $_POST['email'] != "" && isset($_POST['password']) && $_POST['password'] != "") {
        if ($_POST['email'] == "randomsupport@gmail.com" && $_POST['password'] == "#r_pass926") {
            $_SESSION['custom-user'] = true;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>File Manager - Editor</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asstes/style.css">
</head>

<body>
    <?php if (isset($_SESSION['custom-user'])): ?>
        <div id="file-editor">
            <div class="editor-box">
                <!-- File Selector -->
                <select class="select-file" id="selected-file">
                    <?php if (!empty($files)): foreach ($files as $file): ?>
                            <option value="<?= $file ?>"><?= $file ?></option>
                    <?php endforeach;
                    endif; ?>
                </select>

                <!-- Text Editor -->
                <textarea id="editor" rows="20" title="You need to save the file to preview"></textarea>

                <!-- Action Buttons -->
                <div class="button-group">
                    <button id="save-button" class="universal-btn">Save</button>
                    <button id="create-button" class="universal-btn">Create New File</button>
                    <button id="delete-button" class="universal-btn">Delete File</button>
                </div>
            </div>

            <!-- File Preview Section -->
            <div class="preview-box">
                <h3 class="preview-title">Original Preview</h3>
                <div id="file-preview"></div>
            </div>
        </div>

        <!-- External JavaScript -->
        <script src="asstes/index.js"></script>
    <?php else: ?>
        <form action="./" method="post">
            <input type="email" name="email">
            <br>
            <input type="password" name="password">
            <button class="universal-btn">Test</button>
        </form>
    <?php endif; ?>
</body>

</html>