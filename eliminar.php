<?php

if (isset($_POST['index'])) {
    $index = $_POST['index'];

    $archivo = file('output/data.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if (isset($archivo[$index])) {
        unset($archivo[$index]);

        file_put_contents('output/data.txt', implode(PHP_EOL, $archivo) . PHP_EOL);

        echo json_encode([
            'status' => 'success',
            'message' => 'Elemento eliminado correctamente'
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Índice no encontrado'
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'No se proporcionó un índice válido'
    ]);
}
