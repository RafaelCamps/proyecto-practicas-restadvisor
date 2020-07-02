<?php


// Función para que muestre el símbolo de € tantas veces como el valor del campo precio

function mostrarEuros($num)
{
    $euros = "";
    for ($i = 0; $i < $num; $i++) {
        $euros .= "€";
    }
    return $euros;
}
