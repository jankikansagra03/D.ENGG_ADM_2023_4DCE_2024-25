<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/additional-methods.js"></script>


</head>
<script>
    $(document).ready(function() {
        $.validator.addMethod("filesize", function(value, element, param) {
            if (element.files[0]) {
                return element.files[0].size <= param;
            }
        }, "filesize cannot be greater than {0} KB.");
        $('#form1').validate({
            rules: {
                fn: {
                    required: true,
                    minlength: 3,
                    maxlength: 50,
                    lettersonly: true
                },
                email: {
                    required: true,
                    email: true
                },
                pswd: {
                    required: true,
                    minlength: 8,
                    maxlength: 20,
                    pattern: "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#%&])[a-zA-Z0-9!@#$%&]{8,20}$/"
                },
                gender: {
                    required: true,
                },
                'game[]': {
                    required: true,
                },
                f1: {
                    required: true,
                    accept: "image/jpg, image/png, image/jpeg",
                    filesize: 250 * 1024
                },
                cpswd: {
                    required: true,
                    equalTo: "#pwd"
                }
            },
            messages: {
                fn: {
                    required: "Fullname is required.",
                    minlength: "Fullname should be at least 3 characters long.",
                    maxlength: "Fullname should not exceed 50 characters.",
                    lettersonly: "Fullname should only contain letters."
                },
                email: {
                    required: "Email is required.",
                    email: "Please enter a valid email address."
                },
                pswd: {
                    required: "Password is required.",
                    minlength: "Password should be at least 8 characters long.",
                    maxlength: "Password should not exceed 20 characters.",
                    pattern: "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character (!@#$%&)."
                },
                gender: {
                    required: "Gender is required."
                },
                'game[]': {
                    required: "Game is required."
                },
                f1: {
                    required: "Please select an image file.",
                    accept: "Only image files (jpg, png, gif) are allowed.",
                    filesize: "Image file size cannot be greater than 250kb."
                },
                cpswd: {
                    required: "Confirm Password is required.",
                    equalTo: "Passwords do not match."
                }
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                if (element.attr('name') == "gender") {
                    error.insertAfter('#gender-error');
                } else if (element.attr('name') == "game[]") {
                    error.insertAfter('#game-error');
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid').addClass('is-valid');
            }
        });
    });
</script>

<body>
    <div class="container mt-3">
        <h2>Stacked form</h2>
        <form action="/action_page.php" id="form1" mathod="post" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <label for="nm1">Fullname:</label>
                <input type="text" class="form-control" id="nm1" placeholder="Enter name" name="fn">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="mb-3">
                <label for="pwd">Password:</label>
                <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
            </div>
            <div class="mb-3">
                <label for="pwd">Confirm Password:</label>
                <input type="text" class="form-control" id="cpwd" placeholder="Enter password" name="cpswd">
            </div>
            <div class="mb-3">
                <label for="pwd">Select Gender:</label>
                <br>
                <input type="radio" name="gender" value="Male">Male

                <input type="radio" name="gender" value="Female">Female
                <span id="gender-error"></span>
            </div>
            <div>
                <label for="pwd">Select favoutite game:</label>
                <br>
                <input type="checkbox" name="game[]" value="Cricket"> Cricket
                <input type="checkbox" name="game[]" value="Volleyball"> Volleyball
                <input type="checkbox" name="game[]" value="Chess"> Chess
                <input type="checkbox" name="game[]" value="Football"> Football

                <span id="game-error"></span>
            </div>
            <br>
            <div class="mb-3">
                <label for="pwd">Select Profile Picture:</label>
                <input type="file" class="form-control" placeholder="Enter password" name="f1">
            </div>
            <br>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>