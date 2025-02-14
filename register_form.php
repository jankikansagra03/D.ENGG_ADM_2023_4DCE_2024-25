<?php
include_once("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    if (isset($_COOKIE['success'])) {
    ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Success!</strong> <?php echo $_COOKIE['success']; ?>.
        </div>
    <?php
    }
    if (isset($_COOKIE['error'])) {
    ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Error!</strong> <?php echo $_COOKIE['error']; ?>.
        </div>
    <?php
    }
    ?>
    <div class="container mt-3">
        <h2>Register form</h2>
        <form action="register_form.php" method="post" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <label for="fn1">name:</label>
                <input type="text" class="form-control" id="fn1" placeholder="Enter Name" name="fn">
            </div>

            <div class="mb-3 mt-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>

            <div class="mb-3">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
            </div>
            <div class="mb-3">
                <label for="cpwd1">Confirm Password:</label>
                <input type="password" class="form-control" id="cpwd1" placeholder="Enter password" name="cpswd">
            </div>
            <div class="mb-3">
                <label for="mn1">Mobile Number:</label>
                <input type="text" class="form-control" id="mn1" placeholder="Enter Mobile number" name="mn">
            </div>
            <div class="mb-3">
                <label for="st1">select State:</label>
                <select name="st" id="st1" class="form-control">
                    <option value="guj">Gujarat</option>
                    <option value="mh">Maharashtra</option>
                    <option value="wb">West Bengal</option>
                    <option value="ap">Andhra Pradesh</option>
                    <option value="tl">Telangana</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="st1">Select Gender:</label>
                <br>
                <input type="radio" name="gender" id="" value="m">Male
                <input type="radio" name="gender" id="" value="f">Female
            </div>
            <div class="mb-3">
                <label class="form-check-label">
                    Select Your Hobbies
                </label>
                <br>
                <input type="checkbox" name="hobby[]" value="playing_games"> Playing games
                <input type="checkbox" name="hobby[]" value="listening_music">Listening Music
                <input type="checkbox" name="hobby[]" value="Reading books"> Reading Books
                <input type="checkbox" name="hobby[]" value=" browsing_internet"> Browsing internet
            </div>
            <div class="mb-3">
                <label for="pic1">Select Profile Picture</label>
                <input type="file" class="form-control" id="pic1" name="pic">
            </div>
            <button type="submit" class="btn btn-primary" name="reg_btn">Submit</button>
        </form>
        <br><br>
    </div>

</body>

</html>

<?php
if (isset($_POST['reg_btn'])) {
    $fn = $_POST['fn'];
    $email = $_POST['email'];
    $password = $_POST['pswd'];
    $mobile = $_POST['mn'];
    $state = $_POST['st'];
    $gender = $_POST['gender'];
    $hobbies = $_POST['hobby'];
    $hobby = implode(',', $hobbies);
    $picture = uniqid() . $_FILES['pic']['name'];
    // $fn = $_POST['fn'];

    $insert = "INSERT INTO `register`(`fullname`, `email`, `password`, `mobile`, `state`, `gender`, `hobbies`, `profile_pic`) VALUES ('$fn','$email','$password',$mobile,'$state','$gender','$hobby','$picture')";
    try {
        if ($con->query($insert)) {
            if (!is_dir("profile_pictures")) {
                mkdir("profile_pictures");
            }
            move_uploaded_file($_FILES['pic']['tmp_name'], "profile_pictures/" . $picture); ?>
            <script>
                alert("data inserted");
                window.location.href = "register_form.php";
            </script>
        <?php
            setcookie("success", "Registration Successfull", time() + 5, "/");
        }
    } catch (Exception $e) {
        setcookie("error", "Error in registration", time() + 5, "/");
        ?>
        <script>
            window.location.href = "register_form.php";
        </script>
<?php
    }
}
