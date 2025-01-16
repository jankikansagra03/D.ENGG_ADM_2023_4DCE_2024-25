<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap/min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/additional-methods.js"></script>
</head>
<script>
$(document).ready(function() {
    $('#h1').validate({
        rules: {},
        messages: {},
        errorElement: "<div>",
        errorPlacement: function(error, element) {},
        highlight: function() {

        },
        unhighlight: fuction() {

        },
    });
});
</script>
<form action="" id="h1">
    <input type="text" name="n1" id="n11">
    <br>
    <input type="submit" value="submit">
</form>