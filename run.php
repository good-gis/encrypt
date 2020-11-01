<?php

require 'vendor/autoload.php';

use App\Core\CaesarSubstitution;

$caesarCalc = new CaesarSubstitution();

if (isset($argv[1], $argv[2])) {
    $caesarCalc->encryptSurname($argv[1], (int) $argv[2]);
} else {
    echo 'Введите фамилию первым параметром (строка), сдвиг вторым параметром (целое число)';
}