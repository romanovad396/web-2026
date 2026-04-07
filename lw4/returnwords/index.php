<?php

$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $digit = $_POST['digit'];

    if ($digit === '' || !ctype_digit($digit)) {
        $result = 'Некорректный ввод';
    } else {

        if ($digit < 0 || $digit > 9) {
            $result = 'Цифра вне диапазона';
        } else {

            $words = [
                '0' => 'Ноль',
                '1' => 'Один',
                '2' => 'Два',
                '3' => 'Три',
                '4' => 'Четыре',
                '5' => 'Пять',
                '6' => 'Шесть',
                '7' => 'Семь',
                '8' => 'Восемь',
                '9' => 'Девять',
            ];

            $result = $words[$digit];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Цифра в слово</title>
</head>
<body>
    <h1>Введите одну цифру (0–9)</h1>

    <form method="post">
        <input name="digit" type="text" maxlength="1">
        <button>Показать</button>
    </form>

    <?php if ($result !== ''): ?>
        <p><?= $result ?></p>
    <?php endif; ?>

</body>
</html>
