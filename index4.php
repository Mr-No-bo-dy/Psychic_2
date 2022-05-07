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
    <h1>Step 4</h1>
    <p>Try to guess the number itself. Last chance</p>
    <form action="results.php" method="post">
        <?php
            $randomRound = $_POST["randomRound"];
            $choice3 = $_POST["choice3"];

            if ($choice3 == $_SESSION["random"]) {
                $_SESSION["psychicPoints"] += 30;
                echo ("<p style='color: limegreen'>Yes. You are right!</p>");
                header ('Location: results.php');
            } else {
                echo ("<p style='color: orange'>Nope... Try one more time:</p>");
                echo "<select name='choice4'>";
                if ($randomRound < $_SESSION["random"] && $choice3 > $_SESSION["random"]) {
                    for ($variantLess = ($randomRound + 1); $variantLess < $choice3; $variantLess++) {
                        echo ("<option value='$variantLess'>$variantLess</option>");
                    }
                } else if ($randomRound < $_SESSION["random"] && $choice3 < $_SESSION["random"]) {
                    for ($variantLess = ($choice3 + 1); $variantLess <= ($randomRound + 5); $variantLess++) {
                        echo ("<option value='$variantLess'>$variantLess</option>");
                    }
                } else if ($randomRound > $_SESSION["random"] && $choice3 > $_SESSION["random"]) {
                    for ($variantLess = ($randomRound - 4); $variantLess < $choice3; $variantLess++) {
                        echo ("<option value='$variantLess'>$variantLess</option>");
                    }
                } else if ($randomRound > $_SESSION["random"] && $choice3 < $_SESSION["random"]) {
                    for ($variantLess = ($choice3 + 1); $variantLess <= $randomRound; $variantLess++) {
                        echo ("<option value='$variantLess'>$variantLess</option>");
                    }
                }
                echo "</select>";
            }
            ?>
        <button type="submit">Choose</button>
    </form>
</body>
</html>