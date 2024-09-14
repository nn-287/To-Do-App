<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Task App' }}</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body class="bg-gray-100 font-sans">
        <div class="container mx-auto p-4">
            {{ $slot }}
        </div>


        <!--Flash Messages Handling Timer For tasks actions-->
        @if (session()->has('message'))
            <div id="flash-message" class="fixed bottom-4 right-4 p-3 text-green-700 bg-green-100 border border-green-300 rounded-md">
                {{ session('message') }}
            </div>
        @endif


        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var flashMessage = document.getElementById('flash-message');
                if (flashMessage) {
                    setTimeout(function () {
                        flashMessage.style.opacity = '0';
                        setTimeout(function () {
                            flashMessage.style.display = 'none';
                        }, 500); 
                    }, 5000);
                }
            });
        </script>
        <!---->
        @livewireScripts
    </body>
</html>
