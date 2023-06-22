<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{ isset($title)? $title : '' }}
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 dark:bg-gray-900">
    {{ $slot }}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite('resources/js/app.js')
    @isset($script)
        {{ $script }}
    @endisset
</body>
</html>
