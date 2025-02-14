<link rel="stylesheet" href="css/bootstrap.css">
<script src="js/bootstrap.js"></script>
<?php
include_once("connection.php");
if (isset($_GET['uid'])) {
    $id = $_GET['uid'];

    $fetch = "select * from register where id=$id";
    $result = $con->query($fetch);
    $data = mysqli_fetch_assoc($result);
    $h = explode(",", $data['hobbies']);
    print_r($h);
?>
    <div class="container mt-3">
        <h2>edit user data</h2>
        <form action="edit_user.php" method="post" enctype="multipart/form-data">
            <div class="mb-3 mt-3">

                <input type="hidden" class="form-control" id="id1" name="uid" value="<?php echo $data['id']; ?>">
            </div>
            <div class="mb-3 mt-3">
                <label for="fn1">name:</label>
                <input type="text" class="form-control" id="fn1" placeholder="Enter Name" name="fn" value="<?php echo $data['fullname']; ?>">
            </div>

            <div class="mb-3 mt-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $data['email']; ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" value="<?php echo $data['password']; ?>">
            </div>
            <div class="mb-3">
                <label for="cpwd1">Confirm Password:</label>
                <input type="password" class="form-control" id="cpwd1" placeholder="Enter password" name="cpswd" value="<?php echo $data['password']; ?>">
            </div>
            <div class="mb-3">
                <label for="mn1">Mobile Number:</label>
                <input type="text" class="form-control" id="mn1" placeholder="Enter Mobile number" name="mn" value="<?php echo $data['mobile']; ?>">
            </div>
            <div class="mb-3">
                <label for="st1">select State:</label>
                <select name="st" id="st1" class="form-control">
                    <option value="guj" <?php if ($data['state'] == "guj") {
                                            echo "selected";
                                        } ?>>Gujarat</option>
                    <option value="mh" <?php if ($data['state'] == "mh") {
                                            echo "selected";
                                        } ?>>Maharashtra</option>
                    <option value="wb" <?php if ($data['state'] == "wb") {
                                            echo "selected";
                                        } ?>>West Bengal</option>
                    <option value="ap" <?php if ($data['state'] == "ap") {
                                            echo "selected";
                                        } ?>>Andhra Pradesh</option>
                    <option value="tl" <?php if ($data['state'] == "tl") {
                                            echo "selected";
                                        } ?>>Telangana</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="st1">Select Gender:</label>
                <br>
                <input type="radio" name="gender" id="" value="m" <?php echo $data['gender'] == "m" ? "checked" : ""; ?>>Male
                <input type="radio" name="gender" id="" value="f" <?php echo $data['gender'] == "f" ? "checked" : ""; ?>>Female
            </div>
            <div class="mb-3">
                <label class="form-check-label">
                    Select Your Hobbies
                </label>
                <br>
                <input type="checkbox" name="hobby[]" value="playing_games" <?php echo in_array("playing_games", $h) ? "checked" : "" ?>> Playing games

                <input type="checkbox" name="hobby[]" value="listening_music" <?php echo in_array("listening_music", $h) ? "checked" : ""; ?>>Listening Music
                <input type="checkbox" name="hobby[]" value="Reading books" <?php echo in_array("Reading books", $h) ? "checked" : ""; ?>> Reading Books
                <input type="checkbox" name="hobby[]" value="browsing_internet" <?php echo in_array("browsing_internet", $h) ? "checked" : ""; ?>> Browsing internet
            </div>
            <div>
                <img src="profile_pictures/<?php echo $data['profile_pic']; ?>" alt="" style="width:100px">
            </div>
            <div class="mb-3">
                <label for="pic1">Select Profile Picture</label>
                <input type="file" class="form-control" id="pic1" name="pic">
            </div>
            <button type="submit" class="btn btn-primary" name="edit_btn">Submit</button>
        </form>
        <br><br>
    </div>
<?php
}

if (isset($_POST['edit_btn'])) {
    $id = $_POST['uid'];
    $fn = $_POST['fn'];
    $email = $_POST['email'];
    $password = $_POST['pswd'];
    $mobile = $_POST['mn'];
    $state = $_POST['st'];
    $gender = $_POST['gender'];
    $hobbies = $_POST['hobby'];
    $hobby = implode(',', $hobbies);
    // $picture = uniqid() . $_FILES['pic']['name'];

    $update = "UPDATE `register` SET `fullname`='$fn',`password`='$password',`mobile`=$mobile,`state`='$state',`gender`='$gender',`hobbies`='$hobby'";

    if ($_FILES['pic']['name'] != "") {
        $updated_picture = uniqid() . $_FILES['pic']['name'];
        $update = $update . ",`profile_pic`='$updated_picture'";
    }
    $update = $update . " where id=$id";
    echo $update;

    if ($con->query($update)) {
        if (isset($updated_picture)) {
            move_uploaded_file($_FILES['pic']['tmp_name'], "profile_pictures/" . $updated_picture);
            $fetch_image = "select `profile_pic` from register where id=$id";
            $image_name = mysqli_fetch_assoc($con->query($fetch_image));
            $data = $image_name['profile_pic'];
            unlink("profile_pictures/" . $data);
        }
    }
?>
    <script>
        window.location.href = "fetch_data_registration.php";
    </script>
<?php
}
?>