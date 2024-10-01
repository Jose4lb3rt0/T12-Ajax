<?php

if (isset($_POST['index'])){
    $index = $_POST['index'];

    $response = [
        'data' => $index,
        'status' => 'success', 
        'message' => 'Datos eliminados correctamente'
    ];

    echo json_encode($response);
} else {
    $response = [
        'status' => 'error',
        'message' => 'Algo falló!'
    ];

    echo json_encode($response);
}