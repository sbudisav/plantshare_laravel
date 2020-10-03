<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .post-text-box {
                width:80vh;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                margin: 0 90px;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 15px 25px 0;
                font-size: 18px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

    </head>
    <body class="antialiased">
        <div class="items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center">

            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <form method="POST" action="/logout">
                        @csrf
                        <button class="font-bold text-lg">Logout</button>
                    </form>
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            </div>

            <!-- <ul class="flex-center object-top position-ref links"> -->
            <ul class="flex-center links">
                <li class="mr-6 font-bold text-lg block">
                    <a class="text-blue-500 hover:text-blue-800" href="/posts">Plants</a>
                </li>
                <li class="mr-6 font-bold text-lg block">
                    <a class="text-blue-500 hover:text-blue-800" href="/posts">Home</a>
                </li>
                <li class="mr-6 font-bold text-lg block">
                    <a class="text-blue-500 hover:text-blue-800" href="/posts">Find Users</a>
                </li>
                <li class="mr-6 font-bold text-lg block">
                    <a class="text-blue-500 hover:text-blue-800" href="/posts">My Profile</a>
                </li>
            </ul>

            @yield ('content')
        </div>


    </body>
</html>
