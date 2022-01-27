<?php
$path = "../img/{$_FILES['foto']['name']}";
if (move_uploaded_file($_FILES['foto']['tmp_name'], $path)) {
    echo "{$_FILES['foto']['name']} успешно загружен!";
}
?>