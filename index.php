<?php
/*include inclus le fichier, si il y a un pb avec le nom de ficher il execute quna dmeme le code, require fatal error, require_once */
require('./php files/validation.php');
require('./php files/calculation.php');

if (isset($_GET['nbr1'], $_GET['nbr2'], $_GET["operation"])) {
    //on met l'ensemble de get dans la variable et c'est plus propre pour la lecture
    $old = $_GET;
    //On stock les données validées dans la variable data
    $data = validated();
    if (!isset($data['error'])) {
        $resultMsg = getResultMessage($data['nbr1'], $data['nbr2'], $data['operation']);
        echo $resultMsg;
    }
}
/*
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
    <link rel="stylesheet" type="text/css" href="./css/reset.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>
    <h1>Calculette</h1>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="get">

        <label for="nbr1">Nombre 1</label>
        <input type="text" name="nbr1" id="nbr1" value="<?= $old['num1'] ?? 0 ?>">

        <label for="nbr2">Nombre 2</label>
        <input type="text" name="nbr2" id="nbr2" value="<?= $old['num2'] ?? 0 ?>">

        <button type="submit" value="add" name="operation" title="Additionner <?= $num1 . ' avec ' . $num2; ?> ">+</button>
        <button type="submit" value="sub" name="operation" title="Soustraire <?= $num1 . ' avec ' . $num2; ?> ">-</button>
        <button type="submit" value="mult" name="operation" title="Multiplier <?= $num1 . ' avec ' . $num2; ?> ">*</button>
        <button type="submit" value="div" name="operation" title="Diviser <?= $num1 . ' avec ' . $num2; ?> ">/</button>
        <button type="submit" value="pow" name="operation" title="Puissance <?= $num1 . ' avec ' . $num2; ?> ">^</button>
        <button type="submit" value="mod" name="operation" title="Reste de la division <?= $num1 . ' avec ' . $num2; ?> ">%</button>
    </form>

    <?php if (isset($data['error'])) : ?>
        <p class="error"><?= $data['error']; ?></p>
    <?php elseif (isset($resultMsg)) : ?>
        <p class="result"><span><?= $resultMsg ?></span></p>
    <?php endif; ?>

</body>

</html>