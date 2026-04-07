<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Факториал</title>
</head>
    <body>
    <h1>Вычисление факториала</h1>

    <form method="post">
        <label>Число: <input name="n" type="text"></label>
        <button type="submit">Вычислить</button>
    </form>
    <?php
    function factorial($x) {
        if ($x <= 1) {
            return 1;
        } else {
            return $x * factorial($x - 1);
        }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $input = trim($_POST['n'] ?? '');
        if ($input === '' || !is_numeric($input)) {
            echo "<p>Введите целое неотрицательное число.</p>";
        } else {
            $n = intval($input);
            if ($n < 0) {
                echo "<p>Факториал определён только для неотрицательных чисел.</p>";
            } else {
                $result = factorial($n);
                echo "<p>Факториал числа " . $n. "! = " . $result . "</p>";
            }
        }
    }
    ?>
    </body>
</html>
