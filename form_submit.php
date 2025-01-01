<?php
if (isset($_GET['btn'])) {
    $n = $_GET['n1'];
    echo $n;
} else {
    echo "submit the form to fetch the value";
}
