<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #495057;
            line-height: 1.6;
        }

        header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-top: 0;
            font-size: 2em;
            font-weight: bold;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: box-shadow 0.3s;
        }

        main:hover {
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
        }

        .error-container,
        .success-message {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        .error-container {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
        }

        .success-message {
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1em;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            background-color: #28a745;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #218838;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: #007bff;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }
    </style>
    <title>Twooter @yield('title')</title>
</head>

<body>

    <header>
        <h1><a href="/feed">Twooter @yield('title')</a></h1>
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </header>

    @if($errors->any())
    <div class="error-container">
        <strong>Errors:</strong>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('message'))
    <div class="success-message">
        <strong>{{ session('message') }}</strong>
    </div>
    @endif

    <main>
        @yield('content')
    </main>

</body>

</html>
