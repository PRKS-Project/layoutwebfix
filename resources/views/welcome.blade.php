<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="text-center">
        <h1 class="text-5xl font-bold text-indigo-600">Welcome to MyApp</h1>
        <p class="mt-4 text-gray-600">A simple and elegant PHP framework for web.</p>

        <div class="mt-6">
            @auth
                <a href="{{ url('/dashboard') }}" class="px-6 py-3 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-600">
                    Go to Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="px-6 py-3 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600">
                    Login
                </a>
                <a href="{{ route('register') }}" class="ml-4 px-6 py-3 bg-gray-500 text-white rounded-lg shadow-md hover:bg-gray-600">
                    Register
                </a>
            @endauth
        </div>
    </div>

</body>
</html>
