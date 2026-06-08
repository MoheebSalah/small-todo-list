<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $title ?? "ToDo's" }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900">

<nav class="bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-6xl mx-auto flex justify-between items-center px-6 py-4">

        <a href="/" class="text-xl font-bold text-gray-800 hover:text-indigo-600 transition">
            Moheeb's Todo List
        </a>

        <div class="flex items-center gap-3">
            @auth
                <span>{{auth()->user()->name}}</span>
                <form
                    method="POST"
                    action="/logout"
                    class="px-4 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-100 transition">
                    @csrf
                    <button>Logout</button>
                </form>
            @else
                <a href="/login"
                   class="px-4 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-100 transition">
                    Sign in
                </a>

                <a href="/register"
                   class="px-4 py-2 text-sm font-medium rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition">
                    Sign up
                </a>
            @endauth
        </div>

    </div>
</nav>

<main class="max-w-6xl mx-auto px-6 py-10">
    {{ $slot }}
</main>

</body>
</html>
