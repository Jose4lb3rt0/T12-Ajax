<?php

if (isset($_POST['index'])) {
    $index = $_POST['index'];  

    $archivo = file('output/data.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if (isset($archivo[$index])) {
        $marca = $_POST['marca'];
        $alto = $_POST['alto'];
        $ancho = $_POST['ancho'];
        $bluetooth = isset($_POST['bluetooth']) ? 'Sí' : 'No';
        $wifi = isset($_POST['wifi']) ? 'Sí' : 'No';
        $garantia = $_POST['garantia'];
        $hdmi = $_POST['hdmi'];
        $usb = $_POST['usb'];
        $pixeles_x = $_POST['pixeles_x'];
        $pixeles_y = $_POST['pixeles_y'];
        $pulgadas = $_POST['pulgadas'];

        $nuevaLinea = "$marca,$alto,$ancho,$bluetooth,$wifi,$garantia,$hdmi,$usb,$pixeles_x,$pixeles_y,$pulgadas";
        $archivo[$index] = $nuevaLinea;

        file_put_contents('output/data.txt', implode(PHP_EOL, $archivo) . PHP_EOL);

        echo json_encode([
            'status' => 'success',
            'message' => 'Elemento actualizado correctamente'
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
