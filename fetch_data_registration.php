<link rel="stylesheet" href="css/bootstrap.css">
<script src="js/bootstrap.bundle.min.js"></script>
<?php
include_once("connection.php");
$q = "select * from register";
$result = $con->query($q);
?>
<table class="table tabl-responsive table-striped">
    <tr>
        <th>ID</th>
        <th>Fullname</th>
        <th>Email</th>
        <th>Password</th>
        <th>Mobile</th>
        <th>state</th>
        <th>hobbies</th>
        <th>Gender</th>
        <th>Profile Picture</th>
        <th>Action</th>
    </tr>
    <?php

    while ($r = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
            <td><?php echo $r['id']; ?></td>
            <td><?php echo $r['fullname']; ?></td>
            <td><?php echo $r['email']; ?></td>

            <td><?php echo $r['mobile']; ?></td>


            <td>
                <a href="view_user.php?uid=<?php echo $r['id']; ?>">
                    <input type="button" value="View" class="btn btn-primary">
                </a>
                <a href="edit_user.php?uid=<?php echo $r['id']; ?>">
                    <input type="button" value="Edit" class="btn btn-info">
                </a>
                <a href="delete_user.php?uid=<?php echo $r['id']; ?>">
                    <input type="button" value="Delete" class="btn btn-danger">
                </a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>