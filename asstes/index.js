// Load the file contents when the page loads
const xhr = new XMLHttpRequest();

// Editor
const editor = document.getElementById('editor');
const saveButton = document.getElementById('save-button');
const filePreview = document.getElementById('file-preview');
const selectedFile = document.getElementById('selected-file');

let filename = "";

selectedFile.addEventListener("change", () => {
    filename = selectedFile.value;
    loadFile(filename)
})

// Save the file when the save button is clicked
saveButton.addEventListener('click', function () {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            alert(xhr.responseText); // This helps to debug by showing the server response
        }
    };
    xhr.open('POST', './private/editor-manager.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('action=save&filename=' + encodeURIComponent(filename) + '&file_contents=' + encodeURIComponent(editor.value));
});


// Create a new file
const createButton = document.getElementById('create-button');
createButton.addEventListener('click', function () {
    const newFilename = prompt("Enter new file name (e.g., newfile.txt):");

    if (newFilename) {
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                alert('File created');
                selectedFile.value = newFilename;
                filename = newFilename;
                editor.value = '';  // Clear the editor for the new file
            }
        };
        xhr.open('POST', './private/editor-manager.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('action=create&filename=' + encodeURIComponent(newFilename));
    }
});

// Delete a file
const deleteButton = document.getElementById('delete-button');
deleteButton.addEventListener('click', function () {
    const confirmDelete = confirm("Are you sure you want to delete this file?");

    if (confirmDelete && filename) {
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                alert('File deleted');
                editor.value = '';  // Clear the editor after deletion
                selectedFile.value = '';  // Clear selected file
                filePreview.textContent = '';  // Clear the preview area
            }
        };
        xhr.open('POST', './private/editor-manager.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('action=delete&filename=' + encodeURIComponent(filename));
    }
});

function loadFile(filename) {
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            filePreview.textContent = xhr.responseText;
            editor.value = xhr.responseText;
        }
    };

    // Append a timestamp to prevent caching
    const timestamp = new Date().getTime();
    xhr.open('GET', './private/editor-manager.php?filename=' + encodeURIComponent(filename) + '&_=' + timestamp, true);
    xhr.send();
}

// File Previewer
window.addEventListener('load', function () {
    loadFile(selectedFile.value)
});