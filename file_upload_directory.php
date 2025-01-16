<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="1. file_upload_directory.php" method="post" enctype="multipart/form-data">
        Select a file to upload:
        <input type="file" name="f1" id="f1_1">
        <br>
        <input type="submit" value="Upload File" name="btn">
    </form>

</body>

</html>


<?php
$directory = "uploads";
if (isset($_POST['btn'])) {
    if ($_FILES['f1']['name'] == "") {
        echo "<p style='color:red'>Select a file to upload</p>";
    } else {
        if (!is_dir($directory)) {
            mkdir($directory);
        }
        move_uploaded_file($_FILES['f1']['tmp_name'], $directory . "/" . $_FILES['f1']['name']);
        echo "<p style='color:green'>File uploaded successfully </p>";
    }
}
?>
<h2>
    List of files:
</h2>
<?php
if (!is_dir($directory)) {
    echo "<p style='color:red'>The file uploads directory is empty. Please upload files to view the contents of directory.</p>";
} else {
    if ($ptr = opendir($directory)) {

?>
<table border="5" style="border-collapse: collapse;">
    <tr>
        <th>Sr.No.</th>
        <th>File Name</th>
        <th>Download</th>
        <th>Delete</th>

    </tr>
    <?php
            $i = 1;
            $dir_contents = scandir($directory);
            foreach ($dir_contents as $file) {

                if ($file != "." && $file != "..") {
            ?>
    <tr>
        <td><?php echo $i; ?> </td>
        <td><?php echo $file; ?></td>
        <td><a href=" <?php echo $directory . '/' . $file; ?>" Download>
                <input type="button" value="Download"></a></td>
        <td><a href="delete.php?file_name=<?php echo $file; ?>">
                <input type="button" value="Delete"></a></td>

    </tr>

    <?php
                    $i++;
                }
            }
            echo "</table>";
            // Close the directory handle
            closedir($ptr);
        }
    }