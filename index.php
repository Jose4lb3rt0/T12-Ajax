<?php
    $valor = file_exists('output/data.txt') 
    ? file('output/data.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)
    : 'No hay datos';
?>
<head>
    <title>PHP Ajax Tailwind Test</title>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div 
        class="bg-[url('img/fondo.jpg')] w-full bg-cover"
    >
        <h2 class="text-4xl font-bold text-blue-500">Agregar Televisores</h2>
        <div class="bg-white rounded-md p-4 shadow-md max-w-5xl w-full">
            <form id="formulario" class="flex flex-col gap-2">
                <div class="flex flex-col gap-2 w-full">
                    <label for="marca">Marca:</label>
                    <input type="text" id="marca" name="marca" class="border rounded-md p-1">
                </div>

                <div class="flex flex-col gap-2 w-full">
                    <label for="alto">Alto:</label>
                    <input type="text" id="alto" name="alto" class="border rounded-md p-1">
                </div>

                <div class="flex flex-col gap-2 w-full">
                    <label for="ancho">Ancho:</label>
                    <input type="text" id="ancho" name="ancho" class="border rounded-md p-1">
                </div>

                <div class="flex items-center gap-2 w-full">
                    <label for="bluetooth">Conexión Bluetooth:</label>
                    <input type="checkbox" id="bluetooth" name="bluetooth">
                </div>

                <div class="flex items-center gap-2 w-full">
                    <label for="wifi">Conexión Wi-Fi:</label>
                    <input type="checkbox" id="wifi" name="wifi">
                </div>

                <div class="flex flex-col gap-2 w-full">
                    <label for="garantia">Garantía:</label>
                    <select id="garantia" name="garantia" class="border rounded-md p-1">
                        <option value="1">1 año</option>
                        <option value="2">2 años</option>
                        <option value="3">3 años</option>
                    </select>
                </div>

                <div class="flex flex-col gap-2 w-full">
                    <label for="hdmi">Número de entradas HDMI</label>
                    <input type="number" id="hdmi" name="hdmi" class="border rounded-md p-1">
                </div>

                <div class="flex flex-col gap-2 w-full">
                    <label for="hdmi">Número de entradas USB</label>
                    <input type="number" id="usb" name="usb" class="border rounded-md p-1">
                </div>

                <div class="flex flex-col gap-2 w-full">
                    <label for="pixeles_x">Píxeles (Ancho) <span class="text-red-500 font-bold">x</span> Píxeles (Alto)</label>
                    <div class="flex gap-2 w-full">
                        <input type="number" id="pixeles_x" name="pixeles_x" class="border rounded-md p-1 w-full">
                        <span class="text-red-500 font-bold">x</span>
                        <input type="number" id="pixeles_y" name="pixeles_y" class="border rounded-md p-1 w-full">
                    </div>
                </div>

                <div class="flex flex-col gap-2 w-full">
                    <label for="pulgadas">Pulgadas "</label>
                    <input type="number" id="pulgadas" name="pulgadas" class="border rounded-md p-1">
                </div>

                <button id="enviar" class="p-3 border rounded-md mt-5 bg-green-500 hover:bg-green-700 transition-all duration-300 font-bold text-white">Subir</button>
            </form>
        </div>
    </div>
    </div>
    
        <input hidden id="escondido" name="escondido" value="">
        <div id="respuesta"></div>

        <table class="shadow-md max-w-5xl w-full overflow-x-auto rounded-b-md">
            <thead>
                <tr class="bg-gray-700 text-white">
                    <th class="rounded-tl-md text-center p-2 hover:bg-gray-500 transition-all duration-300">Marca</th>
                    <th class="text-center p-2 hover:bg-gray-500 transition-all duration-300">Alto</th>
                    <th class="text-center p-2 hover:bg-gray-500 transition-all duration-300">Ancho</th>
                    <th class="text-center p-2 hover:bg-gray-500 transition-all duration-300">Bluetooth</th>
                    <th class="text-center p-2 hover:bg-gray-500 transition-all duration-300">Wi-Fi</th>
                    <th class="text-center p-2 hover:bg-gray-500 transition-all duration-300">Garantía</th>
                    <th class="text-center p-2 hover:bg-gray-500 transition-all duration-300">HDMI</th>
                    <th class="text-center p-2 hover:bg-gray-500 transition-all duration-300">USB</th>
                    <th class="text-center p-2 hover:bg-gray-500 transition-all duration-300">Píxeles (Ancho)</th>
                    <th class="text-center p-2 hover:bg-gray-500 transition-all duration-300">Píxeles (Alto)</th>
                    <th class="text-center p-2 hover:bg-gray-500 transition-all duration-300">Pulgadas</th>
                    <th class="rounded-tr-md text-center p-2 hover:bg-gray-500 transition-all duration-300">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (is_array($valor)) {
                    foreach ($valor as $index => $linea) {
                        echo "<tr>";
                        $campos = explode(",", $linea);
                        foreach ($campos as $campo) {
                            echo "<td class='text-center p-2'>" . htmlspecialchars($campo) . "</td>";
                        }
                        echo "
                            <form id='form_eliminar'>
                                <td class='flex justify-center items-center p-2'>
                                    <input id='index' name='index' value='$index' type='hidden'></input>
                                    <button type='submit' id='eliminar' name='eliminar' class='bg-red-500 p-1 text-white text-sm rounded-md hover:bg-red-700 transition-all duration-300'>Eliminar</button>
                                </td>
                            </form>
                        ";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>$valor</td></tr>";
                }
                ?>
            </tbody>
        </table>
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

    $(document).ready(function(){
        $('#eliminar').on('submit', function(e){
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: 'eliminar.php',
                data: $('#form_eliminar').serialize(),
                success: function(response){
                    try {
                        var json = JSON.parse(response)
                        if(json.status === 'success'){
                            $('#respuesta').text(json.message)
                            console.log(json.data)

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
                        console.log('Error al eliminar: ', error);
                        $('#respuesta').text('Error al eliminar', error);
                    }
                }
            })
        })
    })
</script>