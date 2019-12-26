<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y=" crossorigin="anonymous" />
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
</body>
</html>
