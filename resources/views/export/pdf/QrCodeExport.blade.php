<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .container {
            float: right
        }
    </style>
</head>
<body>
    <main class="container">
        @foreach ($qrCodes as $qrCode)
            <img src="data:image/png;base64, {!! $qrCode['base64'] !!} " class="qr-code" style="width: 6.85%; margin: 10px 4px 0 15px;"> 
            <small>{{ $qrCode['value'] }}</small>
        @endforeach
    </main>
</body>
</html>