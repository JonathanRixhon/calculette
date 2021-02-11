<?php
function getResultMessage($nbr1, $nbr2, $operation): string
{
    return match ($operation) {
        'add' => "Additionner ${nbr1} à ${nbr2} vaut " . ($nbr1 + $nbr2),
        'sub' => "Soustraire ${nbr2} de ${nbr1} vaut " . ($nbr1 - $nbr2),
        'mult' => "Multiplier ${nbr1} par ${nbr2} vaut " . ($nbr1 * $nbr2),
        'div' => "Diviser ${nbr1} par ${nbr2} vaut " . ($nbr1 / $nbr2),
        'mod' => "Le reste de la division de ${nbr1} par ${nbr2} vaut " . fmod($nbr1, $nbr2),
        'pow' => "${nbr1} exposant ${nbr2} vaut " . ($nbr1 ** $nbr2)
    };
}
