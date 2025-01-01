<form action="index.php" method="post">
    Enter Number 1: <input type="text" name="n1" id="">
    <br>
    Enter Number 2: <input type="text" name="n2" id="">
    <br>
    Select Operation :
    <input type="radio" name="arithmetic" id="" value="+">+
    <input type="radio" name="arithmetic" id="" value="-">-
    <input type="radio" name="arithmetic" id="" value="*">*
    <input type="radio" name="arithmetic" id="" value="/">/
    <br>
    <select name="state[]" id="" multiple>
        <option value="guj">Gujarat</option>
        <option value="mh">Maharashtra</option>
        <option value="ap">Andhra Pradesh</option>
        <option value="Goa">Goa</option>
    </select>

    select hobby:
    <input type="checkbox" name="hobby[]" id="" value="reading">Reading Books
    <input type="checkbox" name="hobby[]" id="" value="movies">Watching MOvies
    <input type="checkbox" name="hobby[]" id="" value="games">Playing Games
    <input type="checkbox" name="hobby[]" id="" value="travel">Travelling
    <br>
    <input type="submit" value="Submit" name="btn">
</form>

<?php
if (isset($_POST['btn'])) {
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    echo $n1 . "<br>" . $n2 . "<br/>";


    if (isset($_POST['arithmetic'])) {
        $op = $_POST['arithmetic'];
        echo $op . "<br>";
    }
    if (isset($_POST['state'])) {
        $state = $_POST['state'];
        foreach ($state as $st) {
            echo $st . "<br>";
        }
    }
    if (isset($_POST['hobby'])) {
        $hobby = $_POST['hobby'];
        // echo $hobby;
        foreach ($hobby as $key => $value) {
            echo $value . "<br/>";
        }
    }
}
