<?php
    session_start();
    var_dump($_SESSION["random"], $_POST);
    echo ("<br>");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game "Psychic 2" - Results</title>
</head>
<body>
    <h1>Results</h1>
    <?php
        $psychicPoints = $_SESSION["psychicPoints"];
        if ($_POST) {
            if ($_POST["choice4"] == $_SESSION["random"]) {
                $psychicPoints += 15;
                echo ("<p style='color: limegreen'>Yeah, You are right... At last.</p>");
            } else {
                echo ("<p style='color: red'>Nope... You're wrong.</p>");
            }
        }

        if ($psychicPoints == 100) {
            echo "<p>Congratulations! You are truly Psychic... Or just incredible Lucker.</p>";
        } else if ($psychicPoints >= 15) {
            echo "<p>You are Psychic at <b>$psychicPoints%</b>.</p>";
        } else {
            echo "<p>You are no Psychic at all... But don't be sad, if you didn't know, psychics don't exist.</p>";
        }
    ?>
    <form action="index.php" method="post">
        <button type="submit">Play again</button>
    </form>
</body>
</html>