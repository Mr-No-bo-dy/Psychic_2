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
    <h1>Step 3</h1>
    <p>Try to guess the number itself again.</p>
    <form action="index4.php" method="post">
        <?php
            $choice2 = $_POST["choice2"];
            $randomRound = round(($_SESSION["random"] -1), -1);
        
            if ($choice2 == $_SESSION["random"]) {
                $_SESSION["psychicPoints"] += 50;
                echo ("<p style='color: green'>Oh my God, You are right!</p>");
                header ('Location: results.php');           // Перенаправлення на іншу (не ту, на яку веде Форма) сторінку.
            } else {
                echo ("<p style='color: orange'>Nope... Try this time:</p>");
                echo "<select name='choice3'>";
                if ($randomRound < $_SESSION["random"]) {
                    for ($variantFive = ($randomRound + 1); $variantFive <= ($randomRound + 5); $variantFive++) {
                        echo ("<option value='$variantFive'>$variantFive</option>");
                    }
                } else {
                    for ($variantFive = ($randomRound - 4); $variantFive <= $randomRound; $variantFive++) {
                        echo ("<option value='$variantFive'>$variantFive</option>");
                    }
                }
                echo "</select>";
            }
        ?>
        <button type="submit">Choose</button>
        <input type="hidden" name="randomRound" value="<?php echo ($randomRound); ?>">
    </form>
</body>
</html>