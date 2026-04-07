<?php
$method = $_SERVER['REQUEST_METHOD'];  
$response = [];
$statusCode = 200;

if ($method !== 'POST') {
    $statusCode = 405;
    $response = ['error' => 'Метод не разрешён. Используйте POST.'];
} else {
    $json = file_get_contents('php://input');

    if (!$json) {
        $statusCode = 400;
        $response = ['error' => 'Пустой запрос'];
    } else {

        $data = json_decode($json, true);

        if (!is_array($data)) {
            $statusCode = 400;
            $response = ['error' => 'Некорректный JSON'];
        } elseif (empty($data['image'])) {
            $statusCode = 400;
            $response = ['error' => 'Поле image отсутствует'];
        } else {
            $imageData = $data['image'];
            if (strpos($imageData, 'base64,') !== false) {
                $imageData = explode('base64,', $imageData)[1];
            }
            $binary = base64_decode($imageData, true);

            if ($binary === false) {
                $statusCode = 400;
                $response = ['error' => 'Некорректный base64'];
            } else {
                if (!is_dir('static')) {
                    mkdir('static', 0777, true);
                }
                $filename = 'img_' . time() . '.png';
                $filepath = 'static/' . $filename;
                if (file_put_contents($filepath, $binary) === false) {
                    $statusCode = 500;
                    $response = ['error' => 'Ошибка сохранения файла'];
                } else {
                    $response = [
                        'success' => true,
                        'file' => $filepath
                    ];
                }
            }
        }
    }
}

http_response_code($statusCode);
header('Content-Type: application/json; charset=UTF-8');
echo json_encode($response, JSON_UNESCAPED_UNICODE);
