<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pico Placa</title>
</head>

<body style="margin: 0px; background-color: #cfd8dc;">
    <div id="app">
        <pico-placa-component :expresion_regular_automovil="{{ '/^[A-Z]{3}-[0-9]{4}$/' }}" :expresion_regular_moto="{{ '/^[A-Z]{2}[0-9]{4}$/' }}">
        </pico-placa-component>
    </div>
</body>

</html>
<script src="{{ asset('js/app.js') }}"></script>