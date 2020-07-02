<?php


// Función para que muestre el símbolo de € tantas veces como el valor del campo precio

function mostrarEuros($num)
{
    $euros = "";
    for ($i = 0; $i < $num; $i++) {
        $euros .= '<i class="fas fa-euro-sign"></i>';
    }
    return $euros;
}

function mostrarEstrellas($num)
{
    $rate = 5 - ceil($num);
    $estrellas = "";
    for ($i = 0; $i < $num; $i++) {
        $estrellas .= '<i class="fas fa-star"></i>';
    }
    for ($i = 0; $i < $rate; $i++) {
        $estrellas .= '<i class="far fa-star"></i>';
    }

    return $estrellas;
}
