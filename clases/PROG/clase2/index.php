<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
    <style>
        .resaltado{background: red}
        .grande{font-size: 32px}
    </style>
</head>
<body>
    <h1>Demo JQuery</h1>
    <h2>hide() - show() - taggle() </h2>

    <button id="btn-hide">Hide</button>
    <button id="btn-show">Show</button>
    <button id="btn-toggle">Toggle</button>

    <p id="parrafo">Este parrafo se va a manipular con jquery</p>

    <script>
        $('#btn-hide').click(function() {
            $('#parrafo').hide();
        });

        $('#btn-show').click(function() {
            $('#parrafo').show();
        });

        $('#btn-toggle').click(function() {
            $('#parrafo').toggle();
        });
    </script>

    <h2>2 test() - html - val()</h2>

    <p id='parrafo2'>este texto va a cambiar</p>

    <button id="bt-text">cambiar texto</button>
    <button id="bt-negrita">negrita</button>
    <br><br>
    <input type="text" id="mi-input">
    <button id="btn-leer">leer input</button>
    <p id="output-input"></p>

    <script>
        $('#bt-text').click(function() {
            $('#parrafo2').text('texto cambiado con jquery');
        });

        $('#bt-negrita').click(function() {
            $('#parrafo2').html('<b>texto en negrita con jquery</b>');
        });

        $('#btn-leer').click(function() {
            const valor = $('#mi-input').val();
            $('#output-input').text("Escribiste: " + valor);
        });

    </script>

    <h2>Eventos on(input)</h2>

    <button id="btn-contador">clic</button>
    <p id="output-contador">Clics: 0</p>
    <br>
    <input type="text" id="input-tiempo-real">
    <p id="output-tiempo-real"></p>

    <script>
        let clics = 0;
        $('#btn-contador').click(function (){
            clics ++;
            $("#output-contador").text("Clics: " + clics);
        })
        $("#input-tiempo-real").on("input",function() {
            $("#output-tiempo-real").text('Escribiste: ' + $(this).val())
        })
    </script>

    <h2>addclass() - removeclass() - toggleclass()</h2>

    <h3>Titulo que cambia tamaño</h3>
    <button id='btn-agrandar'>agrandar</button>
    <button id='btn-achicar'>achicar</button>
    <br>
    <br>
    <p>hace click en cada item</p>
    <ul id='mi-lista' style="list-style:none; padding:0;">
        <li style="padding:6px; border-bottom:1px solid #ccc">item 1</li>
        <li style="padding:6px; border-bottom:1px solid #ccc">item 2</li>
        <li style="padding:6px; border-bottom:1px solid #ccc">item 3</li>
        <li style="padding:6px; border-bottom:1px solid #ccc">item 4</li>
    </ul>

    <script>
        $('#btn-agrandar').click(function() {
            $('#mi-lista li').addClass('grande');   
        })

        $('#btn-achicar').click(function() {
            $('#mi-lista li').removeClass('grande');   
        })

        $('#btn-toggle').click(function() {
            $('#mi-lista li').toggleClass('grande');   
        })
    </script>

</body>
</html>