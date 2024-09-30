<?php
    $valor = file_exists('output/data.txt') 
    ? file('output/data.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)
    : 'No hay datos';
?>
<head>
    <title>PHP Ajax Tailwind Test</title>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <h2 class="text-2xl">Agregar Televisores</h2>
    <form id="formulario">
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" class="border rounded-md p-1">

        <br>
        
        <label for="alto">Alto:</label>
        <input type="text" id="alto" name="alto" class="border rounded-md p-1">
        
        <br>
        
        <label for="ancho">Ancho:</label>
        <input type="text" id="ancho" name="ancho" class="border rounded-md p-1">
        
        <br>
        
        <label for="bluetooth">Conexión Bluetooth:</label>
        <input type="checkbox" id="bluetooth" name="bluetooth">

        <br>

        <label for="wifi">Conexión Wi-Fi:</label>
        <input type="checkbox" id="wifi" name="wifi">

        
        <br>
        
        <label for="garantia">Garantía:</label>
        <select id="garantia" name="garantia" class="border rounded-md p-1">
            <option value="1">1 año</option>
            <option value="2">2 años</option>
            <option value="3">3 años</option>
        </select>
        
        <br>
        
        <label for="hdmi">Número de entradas HDMI</label>
        <input type="number" id="hdmi" name="hdmi" class="border rounded-md p-1">
        
        <br>
        
        <label for="hdmi">Número de entradas USB</label>
        <input type="number" id="usb" name="usb" class="border rounded-md p-1">
        
        <br>
        
        <label for="pixeles_x">Píxeles (Ancho)</label>
        <input type="number" id="pixeles_x" name="pixeles_x" class="border rounded-md p-1">
        x
        <label for="pixeles_y">Píxeles (Alto)</label>
        <input type="number" id="pixeles_y" name="pixeles_y" class="border rounded-md p-1">
        
        <br>
        
        <label for="pulgadas">Pulgadas</label>
        <input type="number" id="pulgadas" name="pulgadas" class="border rounded-md p-1">"
        
        <br>

        <button id="enviar" class="p-3 border rounded-md">Subir</button>
    </form>

    <input id="escondido" name="escondido" value="">
    <div id="respuesta"></div>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Alto</th>
                    <th>Ancho</th>
                    <th>Bluetooth</th>
                    <th>Wi-Fi</th>
                    <th>Garantía</th>
                    <th>HDMI</th>
                    <th>USB</th>
                    <th>Píxeles (Ancho)</th>
                    <th>Píxeles (Alto)</th>
                    <th>Pulgadas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (is_array($valor)) {
                    foreach ($valor as $linea) {
                        echo "<tr>";
                        $campos = explode(",", $linea);
                        foreach ($campos as $campo) {
                            echo "<td>" . htmlspecialchars($campo) . "</td>";
                        }
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>$valor</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    $(document).ready(function(){
        $('#enviar').on('click', function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'procesar.php',
                data: $('#formulario').serialize(),
                success: function(response){
                    try {
                        var json = JSON.parse(response)
                        if(json.status === 'success'){
                            $('#respuesta').text(json.message)

                            $('tbody').empty()
                            $.ajax({
                                type:'GET',
                                url: 'traer.php',
                                success: function(response){
                                    try {
                                        var json = JSON.parse(response)
                                        if(json.status === 'success'){
                                            json.data.forEach(function(linea){
                                                var campos = linea.split(',')
                                                var nuevaFila = "<tr>"
                                                campos.forEach(function(campo){
                                                    nuevaFila += "<td>" + campo + "</td>"
                                                })
                                                nuevaFila += "</tr>"
                                                $('tbody').append(nuevaFila)    
                                            })
                                        }
                                    } catch (error) {
                                        $('#respuesta').text('Error al actualizar la tabla. ', error)
                                    }
                                }
                            })
                        }
                    } catch (error) {
                        console.log('Error al parsear a JSON: ', error);
                        $('#respuesta').text('Error al parsear JSON', error);
                    }
                },
            })
        })
    })
</script>