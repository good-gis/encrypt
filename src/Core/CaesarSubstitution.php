<?php

namespace App\Core;

class CaesarSubstitution
{
    private array $russianAlphabet = [
        'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я'
    ];

    public function encryptSurname(string $surname, int $key): void
    {
        $surname = mb_strtoupper($surname);
        $arrSurname = mb_str_split($surname);

        foreach ($arrSurname as $symbol) {
            $arrNum[] = array_search($symbol, $this->russianAlphabet, true);
        }

        echo PHP_EOL . 'Общая формула Шифра Цезаря:'  . PHP_EOL .
            'С=(𝑃+𝐾)%𝑀, где P – номер символа открытого текста, С – соответствующий ему номер символа шифротекста, K – ключ шифрования (коэффициент сдвига), ' . PHP_EOL .
            'M – размер алфавита (в данном случае M = 32).' . "Открытый текст $surname, ключ = $key" . PHP_EOL . PHP_EOL;

        echo 'Рассчитываем номер буквы сообщения:' . PHP_EOL;

        foreach ($arrNum as $keyArr => $symbolNum) {
            $resultNum = ($symbolNum + $key) % 32;
            $encryptArr[] = $this->russianAlphabet[$resultNum];
            echo 'c' . $keyArr . "=(m" . $keyArr . '+' . $key . ")" . 'mod32' . '=' . '(' . $symbolNum . '+' . $key . ")" . 'mod32' . "=$resultNum" . ' (Буква ' . $this->russianAlphabet[$resultNum] . ')' . PHP_EOL;
        }

        echo 'Исходный текст' . ' - ' . $surname . PHP_EOL;
        echo 'Зашифрованый текст' . ' - ' . implode('', $encryptArr) . PHP_EOL;
    }

    public function encryptSurnameAthens(string $surname, int $key1, int $key2): void
    {
        $surname = mb_strtoupper($surname);
        $arrSurname = mb_str_split($surname);

        foreach ($arrSurname as $symbol) {
            $arrNum[] = array_search($symbol, $this->russianAlphabet, true);
        }

        echo PHP_EOL . 'Общая формула Шифра афинная подстановка Цезаря :'  . PHP_EOL .
            'Ei=(Ti*A-B)%n, где Ti – порядковый номер буквы исходной последовательности, Еi - порядковый номер соответствующей буквы зашифрованной последовательности, m – размер алфавита (32), ' . PHP_EOL .
            'А, В – целые числа, причем А и m взаимно простые' . PHP_EOL
            . "Открытый текст $surname, ключом является пара ($key1, $key2)" . PHP_EOL . PHP_EOL;

        echo 'Используя таблицу с алфавитом, подставим в уравнение значения и получим:' . PHP_EOL;

        foreach ($arrNum as $keyArr => $symbolNum) {
            $resultNum = (($key1*$symbolNum) + $key2) % 32;
            $encryptArr[] = $this->russianAlphabet[$resultNum];
            echo 'E' . $keyArr . '=' . '(' . $key1 . '*'. $symbolNum . '+' . $key2 . ")" . 'mod32' . "=$resultNum" . ' (Буква ' . $this->russianAlphabet[$resultNum] . ')' . PHP_EOL;
        }

        echo 'Исходный текст' . ' - ' . $surname . PHP_EOL;
        echo 'Зашифрованый текст' . ' - ' . implode('', $encryptArr) . PHP_EOL;
    }
}