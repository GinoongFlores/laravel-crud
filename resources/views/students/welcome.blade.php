<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CRUD - MVC</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}

        <style>
            * {
                margin: 0;
                padding: :0;
                box-sizing: border-box;
            }

            body {
                font-family: 'figtree', sans-serif;
                background-image: url(('{{ asset('img/laravel.png') }}'))
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center center;
            }

            .container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .card {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 1rem;
            }

            h1 {
                font-size: 2rem;
            }

            button {
                cursor: pointer;
                font-size: 1.2rem;
                padding: 1rem 2rem;
            }

        </style>
    </head>
    <body>

        <main>
            <div class="container">
                <div class="card">
                    <h1>Laravel CRUD - MVC</h2>
                    <button id="btn-create">CREATE</button>
                    <button id="btn-read">READ</button>
                    <button id="btn-update">UPDATE</button>
                    <button id="btn-delete">DELETE</button>
                    @if (session()->has('success'))
                    <div class="success_message">
                            {{ session('success') }}
                    </div>
                @endif
                </div>
            </div>
        </main>

    </body>
</html>
