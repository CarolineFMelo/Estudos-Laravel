<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeuControlador extends Controller
{
    public function produtos2() {
        echo "<h1>Produtos2</h1>";
        echo "<ol>";
        echo "<li>Teclado</li>";
        echo "<li>Headset</li>";
        echo "<li>Monitor</li>";
        echo "</ol>";
    }

    public function getNome() {
        return "Ana Maria";
    }

    public function getIdade() {
        return "20";
    }

    public function multiplicar($n1, $n2) {
        return $n1 * $n2;
    }
}
