<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
</head>
<body>
    <div id="app">
        <image-picker
            {{-- value="http://localhost/xxx.png" --}}
            {{-- v-model="image" --}}
        ></image-picker>
        @include('MediaManager::modal')
    </div>

    @stack('styles')
    @stack('scripts')
    <script src="{{ asset("js/app.js") }}"></script>
</body>
</html>
