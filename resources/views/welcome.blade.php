<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome!</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#eaeaea] text-[#222222]">
    <x-nav-bar />
    <div class="flex flex-col justify-center items-center font-bold min-h-screen">
        <h1 class="text-5xl mb-8 font-extralight text-gray-500">Todo</h1>
        <a href="/todolist">
            <div
                 class="py-2 px-3 bg-[#fafafa] hover:bg-sky-700 hover:text-[#fafafa] rounded-lg drop-shadow-md">
                Go to Tasks
            </div>
        </a>

    </div>

    <script src="../js/script.js"></script>
</body>

</html>
