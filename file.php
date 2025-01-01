<form action="file.php" method="post" enctype="multipart/form-data">
    Select a file::<input type="file" name="f1" id="">
    <br>
    <input type="submit" value="Upload File" name="btn">
</form>
<?php
if (isset($_POST['btn'])) {
    if ($_FILES['f1']['name'] == "") {
?>
<span style="color:red">Please select a file to upload.</span>
<?php
    } else {
        if ($_FILES['f1']['type'] == "application/pdf") {
            if ($_FILES['f1']['size'] <= 1024 * 200) {
                if (!is_dir("uploads")) {
                    mkdir("uploads");
                }
                $fname = uniqid() . $_FILES['f1']['name'];
                if (move_uploaded_file($_FILES['f1']['tmp_name'], "uploads/" . $fname)) {
                    echo "Temporary name:::" . $_FILES['f1']['tmp_name'] . "<br/>";
                    echo "Original name:::" . $_FILES['f1']['name'] . "<br/>";
                    echo "File size:::" . $_FILES['f1']['size'] / 1024 . "KB <br/>";
                    echo "file type:::" . $_FILES['f1']['type'] . "<br/>";
        ?>
<span style="color:green">File Successfully uploaded to the server</span>
<?php
                } else {
                ?>
<span style="color:red">Error in Uploading file to server</span>
<?php
                }
            } else {
                ?>
<span style="color:red">Please select a PDF file less than 10 KB.</span>
<?php
            }
        } else {
            ?>
<span style="color:red">Please select a PDF file to upload.</span>
<?php
        }
    }
}