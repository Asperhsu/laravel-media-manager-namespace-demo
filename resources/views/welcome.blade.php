<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="app" style="padding: 2rem; height: 100vh; display: flex; align-items: center; justify-content: center;">
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
