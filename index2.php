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
    <title>Game "Psychic 2" - Guess the number from 1 to 100</title>
</head>
<body>
    <h1>Step 2</h1>
    <p>Try to guess the number itself.</p>
    <form action="index3.php" method="post">
        <?php
            $_SESSION["psychicPoints"] = 0;
            $choice = $_POST["choice"];

            // Математичний варіант визначення правильного десятка:
            $randomFinish = (floor(($_SESSION["random"] - 1) / 10) + 1) * 10;

            if ($choice == $randomFinish) {
                $_SESSION["psychicPoints"] += 50;
                $_SESSION["isRightRange"] = true;
                echo ("<p style='color: limegreen'>Yeah, You are right.</p>");
            } else {
                $_SESSION["isRightRange"] = false;
                echo ("<p style='color: orange'>Nope... You are wrong.</p>");
            }
        
            echo "<select name='choice2'>";
            for ($variant = $randomFinish - 9; $variant <= $randomFinish; $variant++) {
                echo ("<option value='$variant'>$variant</option>");
            }
            echo "</select>";
        ?>
        <button type="submit">Choose</button>
    </form>
</body>
</html>