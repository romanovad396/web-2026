<?php

const MAX_YEAR = 30000;

function isLeapYear(int $year): bool
{
    if ($year % 400 == 0) {
        return true;
    }
    if ($year % 100 == 0) {
        return false;
    }
    return ($year % 4 == 0);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $yearInput = isset($_POST['year']) ? trim((string) $_POST['year']) : '';
    if ($yearInput === '' || !ctype_digit($yearInput)) {
        echo 'NO';
        exit;
    }

    $year = (int) $yearInput;
    if ($year < 1 || $year > MAX_YEAR) {
        echo 'NO';
        exit;
    }

    echo isLeapYear($year) ? 'YES' : 'NO';
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Високосный год</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            padding: 24px; 
        }
        input { 
            padding: 8px; 
            width: 160px; 
        }
        button { 
            padding: 8px 12px; 
        }
    </style>
</head>
<body>
    <h1>Високосный год или нет?</h1>
    <form method="post" action="">
        <label for="year">
        <input id="year" type="number">
        <button>Проверить</button>
    </form>
</body>
</html>
