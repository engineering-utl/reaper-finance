<?php
if ($_FILES['image']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['image']['tmp_name'])) {
    $uploads_dir = 'uploads';
    $tmp_name = $_FILES['image']['tmp_name'];
    $name = basename($_FILES['image']['name']);
    $path = "$uploads_dir/$name";
    if (move_uploaded_file($tmp_name, $path)) {
        echo json_encode(['status' => 'success', 'path' => $path]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to move uploaded file']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'File upload error']);
}
?>
