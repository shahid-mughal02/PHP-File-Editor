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
        <div class="editor">
            <select class="select-file" id="selected-file">
                <option value="sitemap.xml">SITEMAP</option>
                <option value="robots.txt">ROBOTS</option>
                <option value=".htaccess">.HTACCESS</option>
            </select>
            <textarea id="editor" rows="20" title="You need to save the file to preview"></textarea>
            <button id="save-button">Save</button>
        </div>
        <div class="preview-box">
            <h3>File Preview</h3>
            <div id="file-preview"></div>
        </div>
    </div>
    <script src="asstes/index.js"></script>
</body>

</html>