<?php
if (isset($_POST['marca']) && 
    isset($_POST['alto']) && 
    isset($_POST['ancho']) && 
    isset($_POST['bluetooth']) && 
    isset($_POST['wifi']) && 
    isset($_POST['garantia']) && 
    isset($_POST['hdmi']) && 
    isset($_POST['usb']) && 
    isset($_POST['pixeles_x']) && 
    isset($_POST['pixeles_y']) && 
    isset($_POST['pulgadas'])) {

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

    $data = "$marca,$alto,$ancho,$bluetooth,$wifi,$garantia,$hdmi,$usb,$pixeles_x,$pixeles_y,$pulgadas\n";
    
    if (file_put_contents('output/data.txt', $data, FILE_APPEND) === false) {
        echo json_encode([
            'status' => 'error', 
            'message' => 'No se pudo guardar en el archivo'
        ]);
        exit;
    }

    $archivo = file('output/data.txt');
    
    if ($archivo === false) {
        echo json_encode([
            'status' => 'error', 
            'message' => 'No se pudo leer el archivo'
        ]);
        exit;
    }

    $ultimoRegistro = trim($archivo[count($archivo) - 1]);
    $devolver = explode(",", $ultimoRegistro);

    $response = [
        'data' => [
            'marca' => $devolver[0],
            'alto' => $devolver[1],
            'ancho' => $devolver[2],
            'bluetooth' => $devolver[3],
            'wifi' => $devolver[4],
            'garantia' => $devolver[5],
            'hdmi' => $devolver[6],
            'usb' => $devolver[7],
            'pixeles_x' => $devolver[8],
            'pixeles_y' => $devolver[9],
            'pulgadas' => $devolver[10]
        ],
        'status' => 'success', 
        'message' => 'Datos guardados y recuperados correctamente'
    ];

    echo json_encode($response);
} else {
    echo json_encode([
        'status' => 'error', 
        'message' => 'Faltan datos por enviar'
    ]);
}
