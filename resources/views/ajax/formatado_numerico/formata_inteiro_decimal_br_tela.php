<?php
/**
 * Formata número inteiro para decimal com duas casas e com separador de milhar
 *
 * @param integer $numero inteiro a ser formatado
 *
 * @return string
 */

function inteiro_decimal_br($numero)
{
    $numero = number_format($numero, 2, ',', '');
    return $numero;
}
function inteiro_decimal_br_ponto($numero)
{
    $numero = number_format($numero, 2, ',', '.');
    return $numero;
}

?>