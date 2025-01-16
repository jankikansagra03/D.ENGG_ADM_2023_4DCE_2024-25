<form action="quiz.php" method="get">
    <br> <label for="">Question-1</label><br>
    <input type="radio" name="q_1" id="" value="a">Option-1
    <input type="radio" name="q_1" id="" value="b">Option-2
    <input type="radio" name="q_1" id="" value="c">Option-3
    <input type="radio" name="q_1" id="" value="d">Option-4
    <br><br> <label for="">Question-2</label>
    <br>
    <input type="radio" name="q_2" id="" value="a">Option-1
    <input type="radio" name="q_2" id="" value="b">Option-2
    <input type="radio" name="q_2" id="" value="c">Option-3
    <input type="radio" name="q_2" id="" value="d">Option-4
    <br><br> <label for="">Question-3</label>
    <br><input type="radio" name="q_3" id="" value="a">Option-1
    <input type="radio" name="q_3" id="" value="b">Option-2
    <input type="radio" name="q_3" id="" value="c">Option-3
    <input type="radio" name="q_3" id="" value="d">Option-4
    <br><br> <label for="">Question-4</label>
    <br><input type="radio" name="q_4" id="" value="a">Option-1
    <input type="radio" name="q_4" id="" value="b">Option-2
    <input type="radio" name="q_4" id="" value="c">Option-3
    <input type="radio" name="q_4" id="" value="d">Option-4
    <br><br> <label for="">Question-5</label>
    <br><input type="radio" name="q_5" id="" value="a">Option-1
    <input type="radio" name="q_5" id="" value="b">Option-2
    <input type="radio" name="q_5" id="" value="c">Option-3
    <input type="radio" name="q_5" id="" value="d">Option-4
    <br><br> <label for="">Question-6</label>
    <br><input type="radio" name="q_6" id="" value="a">Option-1
    <input type="radio" name="q_6" id="" value="b">Option-2
    <input type="radio" name="q_6" id="" value="c">Option-3
    <input type="radio" name="q_6" id="" value="d">Option-4
    <br><br> <label for="">Question-7</label>
    <br><input type="radio" name="q_7" id="" value="a">Option-1
    <input type="radio" name="q_7" id="" value="b">Option-2
    <input type="radio" name="q_7" id="" value="c">Option-3
    <input type="radio" name="q_7" id="" value="d">Option-4
    <br><br> <label for="">Question-8</label>
    <br><input type="radio" name="q_8" id="" value="a">Option-1
    <input type="radio" name="q_8" id="" value="b">Option-2
    <input type="radio" name="q_8" id="" value="c">Option-3
    <input type="radio" name="q_8" id="" value="d">Option-4
    <br><br> <label for="">Question-9</label>
    <br><input type="radio" name="q_9" id="" value="a">Option-1
    <input type="radio" name="q_9" id="" value="b">Option-2
    <input type="radio" name="q_9" id="" value="c">Option-3
    <input type="radio" name="q_9" id="" value="d">Option-4
    <br><br> <label for="">Question-10</label><br>
    <input type="radio" name="q_10" id="" value="a">Option-1
    <input type="radio" name="q_10" id="" value="b">Option-2
    <input type="radio" name="q_10" id="" value="c">Option-3
    <input type="radio" name="q_10" id="" value="d">Option-4
    <br><br><input type="submit" value="Submit Quiz" name="quiz">
</form>


<?php

if (isset($_GET['quiz'])) {
    $score = 0;
    $answers = array('q_1' => 'a', 'q_2' => 'b', 'q_3' => 'c', 'q_4' => 'd', 'q_5' => 'a', 'q_6' => 'b', 'q_7' => 'c', 'q_8' => 'd', 'q_9' => 'a', 'q_10' => 'a');
    for ($i = 1; $i <= 10; $i++) {
        $ans = 'q_' . $i;
        if ($answers[$ans] == $_GET[$ans]) {
            $score++;
        } else {
            $score -= 0.25;
        }
    }
    echo $score;
}
