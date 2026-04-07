<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <title>Счастливые билеты</title>
</head>
<body>
<h1>Счастливые билеты</h1>

<form method="post">
    <label>Начальный номер: <input name="start" type="text"></label><br><br>
    <label>Конечный номер: <input name="end" type="text"></label><br><br>
    <button type="submit">Найти</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $start = trim($_POST['start'] ?? '');
    $end = trim($_POST['end'] ?? '');

    if ($start === '' || $end === '' || !is_numeric($start) || !is_numeric($end)) {
        echo "<p>Введите корректные числовые номера.</p>";
    } else {
        $s = max(0, min(999999, intval($start)));
        $e = max(0, min(999999, intval($end)));

        // если ввести диапазон в обратном порядке — поменять местами
        if ($s > $e) {
            $tmp = $s;
            $s = $e;
            $e = $tmp;
        }

        $found = 0; // счётчик найденных счастливых билетов
        $lines = []; // временно сохраняем найденные номера

        for ($i = $s; $i <= $e; $i++) {
            $num = sprintf('%06d', $i); // Преобразует строку в целое число
            $sum1 = (int)$num[0] + (int)$num[1] + (int)$num[2];
            $sum2 = (int)$num[3] + (int)$num[4] + (int)$num[5];
            if ($sum1 === $sum2) {
                $found++;
                // если найдено больше 999 — считаем переполнением
                if ($found > 999) {
                    break;
                }
                $lines[] = $num;
            }
        }

        echo "<h2>Результат</h2>";

        if ($found > 999) {
            echo "<p>Ошибка: переполнение — найдено более 999 счастливых билетов.</p>";
        } else {
            if ($found === 0) {
                echo "<p>Счастливых билетов не найдено в заданном диапазоне.</p>";
            } else {
                echo "<p>Найдено счастливых билетов: {$found}</p>";
                echo "<pre>";
                // выводим сохранённые номера
                foreach ($lines as $ln) {
                    echo $ln . "\n";
                }
                echo "</pre>";
            }
        }
    }
}
?>
</body>
</html>
