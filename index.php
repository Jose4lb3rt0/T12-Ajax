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

    <div id="respuesta"></div>
    <div id="resultado">
        <label for="marca">Marca:</label>
        <input type="text" id="marca_resultado" name="marcamarca_resultado" class="border rounded-md p-1">

        <br>
        
        <label for="alto">Alto:</label>
        <input type="text" id="alto_resultado" name="alto_resultado" class="border rounded-md p-1">
        
        <br>
        
        <label for="ancho">Ancho:</label>
        <input type="text" id="ancho_resultado" name="ancho_resultado" class="border rounded-md p-1">
        
        <br>
        
        <label for="bluetooth">Conexión Bluetooth:</label>
        <input type="text" id="bluetooth_resultado" name="bluetooth_resultado" class="border rounded-md p-1">

        <br>

        <label for="wifi">Conexión Wi-Fi:</label>
        <input type="text" id="wifi_resultado" name="wifi_resultado" class="border rounded-md p-1">

        
        <br>
        
        <label for="garantia">Garantía:</label>
        <input type="text" id="garantia_resultado" name="garantia_resultado" class="border rounded-md p-1">
        
        <br>
        
        <label for="hdmi">HDMI</label>
        <input type="text" id="hdmi_resultado" name="hdmi_resultado" class="border rounded-md p-1">
        
        <br>
        
        <label for="hdmi">USB</label>
        <input type="text" id="usb_resultado" name="usb_resultado" class="border rounded-md p-1">
        
        <br>
        
        <label for="pixeles_x">Píxeles (Ancho)</label>
        <input type="text" id="pixeles_x_resultado" name="pixeles_x_resultado" class="border rounded-md p-1">
        x
        <label for="pixeles_y">Píxeles (Alto)</label>
        <input type="text" id="pixeles_y_resultado" name="pixeles_y_resultado" class="border rounded-md p-1">
        
        <br>
        
        <label for="pulgadas">Pulgadas</label>
        <input type="text" id="pulgadas_resultado" name="pulgadas_resultado" class="border rounded-md p-1">"
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
                            $('#marca_resultado').val(json.data.marca)
                            $('#alto_resultado').val(json.data.alto)
                            $('#ancho_resultado').val(json.data.ancho)
                            $('#bluetooth_resultado').val(json.data.bluetooth)
                            $('#wifi_resultado').val(json.data.wifi)
                            $('#garantia_resultado').val(json.data.garantia)
                            $('#hdmi_resultado').val(json.data.hdmi)
                            $('#usb_resultado').val(json.data.usb)
                            $('#pixeles_x_resultado').val(json.data.pixeles_x)
                            $('#pixeles_y_resultado').val(json.data.pixeles_y)
                            $('#pulgadas_resultado').val(json.data.pulgadas)
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