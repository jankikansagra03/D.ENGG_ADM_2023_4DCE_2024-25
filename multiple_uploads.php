<form action="multiple_uploads.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file_name[]" multiple>
    <br>
    <input type="submit" value="Upload File" name="btn">
</form>

<?php
if (isset($_POST['btn'])) {
    $file_names = $_FILES['file_name']['name'];
    $file_count = count($file_names);
    echo $file_count . "Files are uploaded";

    for ($i = 0; $i < $file_count; $i++) {
        if ($_FILES['file_name']['type'][$i] == "application/pdf") {
            if ($_FILES['file_name']['size'][$i] <= 1024 * 1024) {
                if (!is_dir("uploads")) {
                    mkdir("uploads");
                }
                $fname = uniqid() . $_FILES['file_name']['name'][$i];
                if (move_uploaded_file($_FILES['file_name']['tmp_name'][$i], "uploads/" . $fname)) {
                    echo "File uploaded successfully: " . $file_names[$i];
                } else {
                    echo "Failed to upload file: " . $file_names[$i];
                    continue;
                }
            } else {
                echo "File size exceeds the limit for file: " . $file_names[$i];
                continue;
            }
        } else {
            echo "Invalid file format for file: " . $file_names[$i];
            continue;
        }
    }
}
