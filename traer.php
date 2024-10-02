<?php

$archivo = file('output/data.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$response = [
    'data' => $archivo,
    'status' => 'success',
    'message' => 'Datos recuperados correctamente'
];

echo json_encode($response);