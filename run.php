<?php

require 'vendor/autoload.php';

use App\Core\CaesarSubstitution;

$caesarCalc = new CaesarSubstitution();

if (isset($argv[3])){
    $caesarCalc->encryptSurnameAthens($argv[1], (int) $argv[2], (int) $argv[3]);
} else if (isset($argv[1], $argv[2])) {
    $caesarCalc->encryptSurname($argv[1], (int) $argv[2]);
} else {
    echo 'Введите фамилию первым параметром (строка), сдвиг вторым параметром (целое число) - для шифровки подстановкой Цезаря, для шифровки по афинной подстановке Цезаря передайте 2 и 3 параметр числа ключей';
}