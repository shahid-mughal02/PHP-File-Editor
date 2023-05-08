// Load the file contents when the page loads
const xhr = new XMLHttpRequest();

// Editor
const editor = document.getElementById('editor');
const saveButton = document.getElementById('save-button');
const filePreview = document.getElementById('file-preview');
const selectedFile = document.getElementById('selected-file');

let filename = selectedFile.value;
selectedFile.addEventListener("change", () => {
    filename = selectedFile.value;
    editor_file()
})

function editor_file() {
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            editor.value = xhr.responseText;
        }
    };
    xhr.open('GET', '/php-file-editor/private/editor-manager.php?filename=' + filename, true);
    xhr.send();
}

editor_file()

// Save the file when the save button is clicked
saveButton.addEventListener('click', function () {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            alert('File saved');
        }
    };
    xhr.open('POST', '/php-file-editor/private/editor-manager.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('filename=' + filename + '&file_contents=' + encodeURIComponent(editor.value));

    loadFile(filename)
});

function loadFile(filename) {
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            filePreview.textContent = xhr.responseText;
        }
    };

    xhr.open('GET', filename, true);
    xhr.send();
}

// File Previewer
editor.addEventListener('change', function () {
    loadFile(filename)
});
