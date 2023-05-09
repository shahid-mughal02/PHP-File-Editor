<!DOCTYPE html>
<html lang="en">

<head>
    <title>File Editor</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asstes/style.css">
</head>

<body>
    <div id="file-editor">
        <div class="editor-box">
            <select class="select-file" id="selected-file">
                <option value="content.txt">Content.txt</option>
                <option value="info.html">Info.html</option>
                <option value="alert.php">Alert.php</option>
            </select>
            <textarea id="editor" rows="20" title="You need to save the file to preview"></textarea>
            <button id="save-button">Save</button>
        </div>
        <div class="preview-box">
            <h3 class="preview-title">File Preview</h3>
            <div id="file-preview"></div>
        </div>
    </div>
    <script src="asstes/index.js"></script>
</body>

</html>