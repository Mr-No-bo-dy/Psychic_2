<?php
    session_start();
    $random = $_SESSION["random"] = rand(1,100);
    var_dump($_SESSION["random"], $_POST);
    echo ("<br>");
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game "Psychic 2" - Guess the number from 1 to 100</title>
</head>
<body>
    <h1>Welcome to Psychic!</h1>
    <p>I remembered one number from 1 to 100.</p>
    <p>Try to guess the correct range.</p>
    <form action="index2.php" method="post">
        <?php
            echo "<select name='choice'>";
            for ($start = 1, $finish = 10; $finish <= 100; $start += 10, $finish += 10) {
                echo ("<option value='$finish'>$start .. $finish</option>");
            }
            echo "</select>";
        ?>
        <button type="submit">Choose</button>
    </form>
</body>
</html>