<?php
$num1 = $_GET['nbr1'] ?? '0';
$num2 =  $_GET['nbr2'] ?? '0';

$result = '';
$sign = '';
$error_msg = '';

if (isset($_GET['nbr1']) && isset($_GET['nbr2'])) {
    if (is_numeric($_GET['nbr1']) && is_numeric($_GET['nbr2'])) {
        switch ($_GET['operation']) {
            case 'add':
                $result = $num1 + $num2;
                $sign = '+';
                break;
            case 'sub':
                $result = $num1 - $num2;
                $sign = '-';
                break;
            case 'mult':
                $result = $num1 * $num2;
                $sign = '*';
                break;
            case 'div':
                if ($num1 === '0' || $num2 === '0') {
                    $error_msg = 'Vous ne pouvez pas diviser de nombre 0 ';
                } else {
                    $result = $num1 / $num2;
                    $sign = '/';
                }
                break;
            case 'pow':
                $result = $num1 ** $num2;
                $sign = '^';
                break;
            default:
                $error_msg = "Opérateur inconnu, veuillez réessayer ! :) ";
        }
    } else {
        $error_msg = "Attention, entrez uniquement des nombres ! ";
    }
} else {
    $error_msg = "les champs ne peuvent pas rester vides";
}

/*
if (isset($_GET['nbr1']) && isset($_GET['nbr2'])){
    if(is_numeric($_GET['nbr1']) || is_numeric($_GET['nbr2'])){
        switch ($_GET['operation']) {
            case 'add':
                $result = $num1 + $num2;
                $sign = '+';
                break;
            case 'sub':
                $result = $num1 - $num2;
                $sign = '-';
                break;
            case 'mult':
                $result = $num1 * $num2;
                $sign = '*';
                break;
            case 'div':
                if ($num1 === '0' || $num2 === '0') {
                    $error_msg = 'Vous ne pouvez pas diviser de nombre 0 ';
                } else {
                    $result = $num1 / $num2;
                    $sign = '/';
                }
                break;
            case 'pow':
                $result = $num1 ** $num2;
                $sign = '^';
                break;
            default :
                $error_msg = "Opérateur inconnu, veuillez réessayer ! :) ";
        }
    } else {
        $error_msg = "Entrez uniquement des nombres";
    }
} else {
    $error_msg = "les champs ne peuvent pas rester vides";
}
*/


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Calculette
    </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1>Calculette</h1>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="get">

        <label for="nbr1">Nombre 1</label>
        <input type="text" name="nbr1" id="nbr1" value="<?= $num1; ?>">

        <label for="nbr2">Nombre 2</label>
        <input type="text" name="nbr2" id="nbr2" value="<?= $num2; ?>">

        <button type="submit" value="add" name="operation" title="Additionner <?= $num1 . ' avec ' . $num2; ?> ">+</button>
        <button type="submit" value="sub" name="operation" title="Soustraire <?= $num1 . ' avec ' . $num2; ?> ">-</button>
        <button type="submit" value="mult" name="operation" title="Multiplier <?= $num1 . ' avec ' . $num2; ?> ">*</button>
        <button type="submit" value="div" name="operation" title="Diviser <?= $num1 . ' avec ' . $num2; ?> ">/</button>
        <button type="submit" value="pow" name="operation" title="Puissance <?= $num1 . ' avec ' . $num2; ?> ">^</button>
    </form>

    <?php if ($error_msg) : ?>
        <p class="error"><?= $error_msg; ?></p>
    <?php else : ?>
        <p class="result"><span><?= $num1 . ' ' . $sign . ' ' . $num2; ?> = <?= $result; ?></span></p>
    <?php endif; ?>

</body>

</html>