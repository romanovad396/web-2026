<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Обратная польская запись</title>
</head>
    <body>

    <form method="post">
        <p>Введите выражение, отделяя числа и операции одним пробелом!</p>
        <input type="text" name="expr" style="width: 400px;">
        <button type="submit">Вычислить</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $input = trim($_POST['expr']); // Удалять пробелы в начале и конце строки
        $elements = explode(' ', $input); // Разбивать строку по разделителям
        $stack = [];

        foreach ($elements as $elem) {

            if ($elem === '') continue;
            if (is_numeric($elem)) {
                $stack[] = (int)$elem; 
            }
            elseif ($elem === '+' || $elem === '-' || $elem === '*') {

                $b = array_pop($stack); 
                $a = array_pop($stack);
                if ($elem === '+') {
                    $result = $a + $b;
                } elseif ($elem === '-') {
                    $result = $a - $b;
                } elseif ($elem === '*') {
                    $result = $a * $b;
                }
                $stack[] = $result;
            }
        }
        if (count($stack) === 1) {
            echo "<p><strong>Результат:</strong> {$stack[0]}</p>";
        } else {
            echo "<p><strong>Ошибка:</strong> некорректное выражение</p>";
        }
    }
    ?>

    </body>
</html>