<?php
$directory = "uploads_directory";
$f_name = $_REQUEST['file_name'];
unlink($directory . "/" . $f_name);
?>
<script>
    window.location.href = "1. file_upload_directory.php";
</script>