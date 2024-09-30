<?php

$archivo = file('output/data.txt');

$response = [
    'data' => $archivo,
    'status' => 'success',
    'message' => 'Datos recuperados correctamente'
];

echo json_encode($response);