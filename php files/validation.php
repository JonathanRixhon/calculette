<?php
function validated(): array
{
    $operations = [
        'add' => '+',
        'sub' => '-',
        'mult' => '*',
        'div' => '/',
        'pow' => '^',
        'mod' => '%',
    ];
    /* Validation des données */
    if (!array_key_exists($_GET['operation'], $operations)) {
        return ['error' => 'L’opération demandée n’est pas encore prévue par notre système.'];
    }
    if (!is_numeric($_GET['nbr1']) && !is_numeric($_GET['nbr2'])) {
        return ['error' => 'Aucun des nombres fournis n’est valide'];
    }
    if (!is_numeric($_GET['nbr1'])) {
        return ['error' => 'Le premier nombre nombre fourni n’est valide'];
    }
    if (!is_numeric($_GET['nbr2'])) {
        return ['error' => 'Le deuxième nombre nombre fourni n’est valide'];
    }
    if ((float)$_GET['nbr2'] === 0.0 && ($_GET['operation'] === 'div' || $_GET['operation'] === 'mod')) {
        return ['error' => 'Diviser par 0 est une opération qui ne peut pas être réalisée.'];
    }

    //TODO: faire le validation pour la division par 0

    /* Envoyer les bonnes données */
    $nbr1 = (float)$_GET['nbr1'];
    $nbr2 = (float)$_GET['nbr2'];
    $operation = $_GET['operation'];

    /*  
    return [
        'nbr1' => (float)$_GET['nbr1'],
        'nbr2' => (float)$_GET['nbr2'],
        'operation' => $_GET['operation'],
    ]; 
     
    La ligne en dessous fait la même chose.
    */
    return compact('nbr1', 'nbr2', 'operation');
}
