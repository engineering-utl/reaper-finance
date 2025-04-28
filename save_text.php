<?php
$data = file_get_contents('php://input');
$request = json_decode($data, true);
$page = $request['page'];
$content = $request['data'];

if (json_last_error() === JSON_ERROR_NONE) {
    if (!file_exists('content.json')) {
        file_put_contents('content.json', json_encode([]));
    }

    $json = json_decode(file_get_contents('content.json'), true);
    $json[$page] = array_merge($json[$page] ?? [], $content);
    file_put_contents('content.json', json_encode($json, JSON_PRETTY_PRINT));

    echo json_encode([
        'status' => 'success',
        'savedData' => $json[$page] // Return the updated data
    ]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid JSON']);
}
?>