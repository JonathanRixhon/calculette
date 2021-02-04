<?php

if (isset($_GET['firstnumber'], $_GET['secnumber'])) {
    $firstNumber = $_GET['firstnumber'];
    $secNumber = $_GET['secnumber'];
    $operation = $_GET['operation'];
    switch ($operation) {
        case "add":
            $response = "La réponse est: " . ($firstNumber + $secNumber);
            break;
        case "substract":
            $response = "La réponse est: " . ($firstNumber - $secNumber);
            break;
        case "divide":
            if ($firstNumber == 0 || $secNumber == 0) {
                $response = "Veuillez ne pas essayer de diviser par zéro";
            } else {
                $response = "La réponse est: "  . ($firstNumber / $secNumber);
            }
            break;
        case "multiply":
            $response = "La réponse est: " . ($firstNumber * $secNumber);
            break;
        case "pow":
            $response = "La réponse est: " . $firstNumber ** $secNumber;
            break;
    }
}
?>
<!DOCTYPE html>
<html lang='fr'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Calculette</title>
    <style>
        input,
        label {
            display: block;

        }
    </style>
</head>

<body>
    <h1>Ma super calculette</h1>
    <form action='<?= $_SERVER['PHP_SELF'] ?>' method='get'>

        <label for='firstnumber'>Premier nombre</label>
        <input type='text' id="firstnumber" name="firstnumber" value="<?= $firstNumber ?? 0 ?>">

        <label for='secnumber'>deuxième nombre</label>
        <input type='text' id="secnumber" name="secnumber" value="<?= $secNumber ?? 0 ?>">

        <button name="operation" value="add" type='submit'>+</button>
        <button name="operation" value="substract" type='submit'>-</button>
        <button name="operation" value="divide" type='submit'>/</button>
        <button name="operation" value="multiply" type='submit'>*</button>
        <button name="operation" value="pow" type='submit'>^</button>
    </form>
    <?php if ($_GET) : ?>
        <p><?= $response ?></p>
    <?php endif ?>
</body>

</html>