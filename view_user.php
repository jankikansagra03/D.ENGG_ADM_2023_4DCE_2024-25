<link rel="stylesheet" href="css/bootstrap.css">
<script src="js/bootstrap.js"></script>
<?php
include_once("connection.php");
if (isset($_GET['uid'])) {
    $id = $_GET['uid'];

    $fetch = "select * from register where id=$id";
    $result = $con->query($fetch);
    $data = mysqli_fetch_assoc($result);
?>
    <div class="card" style="width:400px">
        <img class="card-img-top" src="profile_pictures/<?php echo $data['profile_pic'] ?>" alt="Card image" style="width:100%">
        <div class="card-body">
            <h4 class="card-title"><?php echo $data['fullname']; ?></h4>
            <p class="card-text">
                Email: <?php echo $data['email']; ?><br>
                Mobile: <?php echo $data['mobile']; ?><br>
                State: <?php echo $data['state']; ?><br>

                Hobbies: <?php echo $data['hobbies']; ?><br>
                Gender: <?php echo $data['gender']; ?> <br>
                Password
            </p>
            <a href="#" class="btn btn-primary">See Profile</a>
        </div>
    </div>
<?php
}
