<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Знак зодиака</title>
</head>
<body>
<?php
$sign = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = trim($_POST['date'] ?? '');
    $parts = explode('.', $date);
    $day = intval($parts[0] ?? 0);
    $month = intval($parts[1] ?? 0);

    if (($month == 1  && $day >= 20) || ($month == 2  && $day <= 18)) $sign = 'Водолей';
    elseif (($month == 2  && $day >= 19) || ($month == 3  && $day <= 20)) $sign = 'Рыбы';
    elseif (($month == 3  && $day >= 21) || ($month == 4  && $day <= 19)) $sign = 'Овен';
    elseif (($month == 4  && $day >= 20) || ($month == 5  && $day <= 20)) $sign = 'Телец';
    elseif (($month == 5  && $day >= 21) || ($month == 6  && $day <= 20)) $sign = 'Близнецы';
    elseif (($month == 6  && $day >= 21) || ($month == 7  && $day <= 22)) $sign = 'Рак';
    elseif (($month == 7  && $day >= 23) || ($month == 8  && $day <= 22)) $sign = 'Лев';
    elseif (($month == 8  && $day >= 23) || ($month == 9  && $day <= 22)) $sign = 'Дева';
    elseif (($month == 9  && $day >= 23) || ($month == 10 && $day <= 22)) $sign = 'Весы';
    elseif (($month == 10 && $day >= 23) || ($month == 11 && $day <= 21)) $sign = 'Скорпион';
    elseif (($month == 11 && $day >= 22) || ($month == 12 && $day <= 21)) $sign = 'Стрелец';
    elseif (($month == 12 && $day >= 22) || ($month == 1  && $day <= 19)) $sign = 'Козерог';
    else $sign = 'Неверная дата';
}
?>
<form method="post">
  <label>Дата (ДД.MM.ГГГГ): <input name="date" type="text"></label>
  <button type="submit">Узнать</button>
</form>

<?php if ($sign !== ''): ?>
  <p>Знак зодиака: <?php echo $sign; ?></p>
<?php endif; ?>
</body>
</html>
