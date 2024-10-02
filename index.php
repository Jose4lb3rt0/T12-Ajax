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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
</head>

<body>
<div class="bg-[url('img/fondo.jpg')] bg-cover p-10 min-h-screen flex flex-col items-center justify-center">
    <div class="bg-black bg-opacity-60 p-10 rounded-xl shadow-lg max-w-6xl w-full">
        <h2 class="text-4xl font-bold text-white text-center mb-5">Agregar Televisores</h2>
        <div id="respuesta" class="text-white text-center mb-10"></div>
        
        <div class="flex flex-col items-center justify-center gap-10">

            <div class="outline-none border text-white border-gray-300 rounded-xl p-6 shadow-lg w-full bg-white bg-opacity-20">
                <form id="formulario" class="flex flex-col gap-4">
                    <div class="flex justify-between w-full gap-5">
                        <div class="flex flex-col w-full gap-2">
                            <div class="flex flex-col gap-2 w-full">
                                <label for="marca" class="text-white">Marca:</label>
                                <input type="text" id="marca" name="marca" class="outline-none border rounded-md p-2 bg-gray-100 bg-opacity-60 focus:ring-2 focus:ring-white">
                            </div>
        
                            <div class="flex flex-col gap-2 w-full">
                                <label for="alto" class="text-white">Alto:</label>
                                <input type="text" id="alto" name="alto" class="outline-none border rounded-md p-2 bg-gray-100 bg-opacity-60 focus:ring-2 focus:ring-white">
                            </div>
        
                            <div class="flex flex-col gap-2 w-full">
                                <label for="ancho" class="text-white">Ancho:</label>
                                <input type="text" id="ancho" name="ancho" class="outline-none border rounded-md p-2 bg-gray-100 bg-opacity-60 focus:ring-2 focus:ring-white">
                            </div>
        
                            <div class="flex items-center gap-2 w-full">
                                <label for="bluetooth" class="text-white">Conexión Bluetooth:</label>
                                <input type="checkbox" id="bluetooth" name="bluetooth" class="bg-transparent">
                            </div>
        
                            <div class="flex items-center gap-2 w-full">
                                <label for="wifi" class="text-white">Conexión Wi-Fi:</label>
                                <input type="checkbox" id="wifi" name="wifi" class="bg-transparent">
                            </div>
        
                            <div class="flex flex-col gap-2 w-full">
                                <label for="garantia" class="text-white">Garantía:</label>
                                <select id="garantia" name="garantia" class="outline-none border rounded-md p-2 bg-gray-100 bg-opacity-60">
                                    <option value="1">1 año</option>
                                    <option value="2">2 años</option>
                                    <option value="3">3 años</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="flex flex-col w-full gap-2">
                            <div class="flex flex-col gap-2 w-full">
                                <label for="hdmi" class="text-white">Número de entradas HDMI</label>
                                <input type="number" id="hdmi" name="hdmi" class="outline-none border rounded-md p-2 bg-gray-100 bg-opacity-60 focus:ring-2 focus:ring-white">
                            </div>
        
                            <div class="flex flex-col gap-2 w-full">
                                <label for="usb" class="text-white">Número de entradas USB</label>
                                <input type="number" id="usb" name="usb" class="outline-none border rounded-md p-2 bg-gray-100 bg-opacity-60 focus:ring-2 focus:ring-white">
                            </div>
        
                            <div class="flex flex-col gap-2 w-full">
                                <label for="pixeles_x" class="text-white">Píxeles (Ancho) <span class="text-red-500 font-bold">x</span> Píxeles (Alto)</label>
                                <div class="flex gap-2 w-full">
                                    <input type="number" id="pixeles_x" name="pixeles_x" class="outline-none border rounded-md p-2 bg-gray-100 bg-opacity-60 focus:ring-2 focus:ring-white w-full">
                                    <span class="text-red-500 font-bold">x</span>
                                    <input type="number" id="pixeles_y" name="pixeles_y" class="outline-none border rounded-md p-2 bg-gray-100 bg-opacity-60 focus:ring-2 focus:ring-white w-full">
                                </div>
                            </div>
        
                            <div class="flex flex-col gap-2 w-full">
                                <label for="pulgadas" class="text-white">Pulgadas "</label>
                                <input type="number" id="pulgadas" name="pulgadas" class="outline-none border rounded-md p-2 bg-gray-100 bg-opacity-60 focus:ring-2 focus:ring-white">
                            </div>
                        </div>
                    </div>

                    <button id="enviar" class="p-3 bg-white text-black rounded-md mt-5 hover:text-white hover:bg-black transition-all duration-500 font-bold">Subir</button>
                </form>
            </div>

            <table class="shadow-lg bg-gray-800 bg-opacity-60 max-w-2xl w-full rounded-xl overflow-hidden">
                <thead>
                    <tr class="bg-gray-900 text-white">
                        <th class="p-3 text-center hover:bg-gray-700 transition-all duration-300">Marca</th>
                        <th class="text-center p-3 hover:bg-gray-700 transition-all duration-300">Alto</th>
                        <th class="text-center p-3 hover:bg-gray-700 transition-all duration-300">Ancho</th>
                        <th class="text-center p-3 hover:bg-gray-700 transition-all duration-300">Bluetooth</th>
                        <th class="text-center p-3 hover:bg-gray-700 transition-all duration-300">Wi-Fi</th>
                        <th class="text-center p-3 hover:bg-gray-700 transition-all duration-300">Garantía</th>
                        <th class="text-center p-3 hover:bg-gray-700 transition-all duration-300">HDMI</th>
                        <th class="text-center p-3 hover:bg-gray-700 transition-all duration-300">USB</th>
                        <th class="text-center p-3 hover:bg-gray-700 transition-all duration-300">Píxeles (Ancho)</th>
                        <th class="text-center p-3 hover:bg-gray-700 transition-all duration-300">Píxeles (Alto)</th>
                        <th class="text-center p-3 hover:bg-gray-700 transition-all duration-300">Pulgadas</th>
                        <th class="p-3 text-center hover:bg-gray-700 transition-all duration-300">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (is_array($valor)) {
                        foreach ($valor as $index => $linea) {
                            echo "<tr class='bg-gray-700 hover:bg-gray-600 transition-all duration-300'>";
                            $campos = explode(",", $linea);
                            foreach ($campos as $campo) {
                                echo "<td class='text-center p-2 text-white'>" . htmlspecialchars($campo) . "</td>";
                            }
                            echo "
                                <td class='flex gap-2 items-center'>
                                    <button id='editar-btn' class='bg-yellow-500 p-3 text-white rounded-md flex items-center hover:bg-yellow-700 transition-all duration-300' data-index='$index'>
                                        <i class='fa-solid fa-pencil'></i>
                                    </button>
                                    <form id='form_eliminar_$index' class='flex justify-center items-center'>
                                        <input type='hidden' name='index' value='$index'>
                                        <button type='submit' class='bg-red-500 p-3 text-white rounded-md flex items-center hover:bg-red-700 transition-all duration-300'>
                                            <i class='fa-solid fa-trash'></i>
                                        </button>
                                    </form>
                                </td>
                            ";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='12' class='text-white text-center p-3'>$valor</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


</body>
<script>

$(document).ready(function() {
    $('#enviar').on('click', function(e) {
        e.preventDefault()
        $.ajax({
            type: 'POST',
            url: 'procesar.php',
            data: $('#formulario').serialize(),
            success: function(response) {
                try {
                    var json = JSON.parse(response)
                    if (json.status === 'success') {
                        $('#respuesta').text(json.message)
                        actualizar()
                    }
                } catch (error) {
                    $('#respuesta').text('Error al enviar los datos. ' + error)
                }
            }
        })
    })

    $('body').on('click', '#editar-btn', function() {
        var index = $(this).data('index')
        $.ajax({
            type: 'GET',
            url: 'traer.php',
            success: function(response) {
                try {
                    var json = JSON.parse(response)
                    if (json.status === 'success') {
                        var campos = json.data[index].split(',')
                        $('#marca').val(campos[0])
                        $('#alto').val(campos[1])
                        $('#ancho').val(campos[2])
                        $('#bluetooth').prop('checked', campos[3] === 'Sí')
                        $('#wifi').prop('checked', campos[4] === 'Sí')
                        $('#garantia').val(campos[5])
                        $('#hdmi').val(campos[6])
                        $('#usb').val(campos[7])
                        $('#pixeles_x').val(campos[8])
                        $('#pixeles_y').val(campos[9])
                        $('#pulgadas').val(campos[10])

                        $('#enviar').text('Guardar Cambios').attr('data-edit', index)
                    }
                } catch (error) {
                    $('#respuesta').text('Error al cargar los datos para edición.')
                }
            }
        })
    })

    $('#enviar').on('click', function(e) {
        e.preventDefault()
        var isEditing = $(this).attr('data-edit') !== undefined

        if (isEditing) {
            var index = $(this).attr('data-edit')

            $.ajax({
                type: 'POST',
                url: 'editar.php',
                data: $('#formulario').serialize() + '&index=' + index,
                success: function(response) {
                    try {
                        var json = JSON.parse(response)
                        if (json.status === 'success') {

                            $('#respuesta').text(json.message)
                            actualizar()
                            $('#enviar').text('Subir').removeAttr('data-edit')

                        }
                    } catch (error) {
                        $('#respuesta').text('Error al guardar los cambios.')
                    }
                }
            })
        }
    })
    
    function actualizar() {
        $.ajax({
            type: 'GET',
            url: 'traer.php',
            success: function(response) {
                try {
                    var json = JSON.parse(response)
                    if (json.status === 'success') {
                        $('tbody').empty()
                        console.log(json.data)
                        json.data.forEach(function(linea, index) {
                            var campos = linea.split(',')
                            var nuevaFila = "<tr class='bg-gray-700 hover:bg-gray-600 transition-all duration-300'>"
                            campos.forEach(function(campo) {
                                nuevaFila += "<td class='text-center p-2 text-white'>" + campo + "</td>"
                            })
                            nuevaFila += `
                                <td>
                                    <form id='form_eliminar_${index}' class='flex justify-center items-center p-2'>
                                        <input id='index' name='index' value='${index}' type='hidden'>
                                        <button type='submit' id='eliminar_${index}' name='eliminar' 
                                            class='bg-red-500 p-3 text-white rounded-md flex items-center hover:bg-red-700 transition-all duration-300'>
                                            <i class='fa-solid fa-trash'></i>
                                        </button>
                                    </form>
                                </td>`
                            nuevaFila += "</tr>"
                            $('tbody').append(nuevaFila)
                        })
                        agregarEventosEliminar()
                    }
                } catch (error) {
                    $('#respuesta').text('Error al actualizar la tabla. ' + error)
                }
            }
        })
    }

    $('body').on('submit', 'form[id^="form_eliminar_"]', function(e) {
        e.preventDefault()
        var form = $(this)
        var formData = form.serialize()
        if (confirm("¿Estás seguro de que deseas eliminar este elemento?")) {
            $.ajax({
                type: 'POST',
                url: 'eliminar.php',
                data: formData,
                success: function(response) {
                    try {
                        var json = JSON.parse(response)
                        if (json.status === 'success') {

                            $('#respuesta').text(json.message)
                            actualizar()

                        } else {
                            $('#respuesta').text(json.message)
                        }
                    } catch (error) {
                        $('#respuesta').text('Error al eliminar el elemento.')
                    }
                },
                error: function() {
                    $('#respuesta').text('Error en la solicitud de eliminación.')
                }
            })
        }
    })

    // actualizar()
})
    
</script>