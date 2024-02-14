<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome!</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#eaeaea] text-[#222222]">
    <nav class="fixed bg-sky-700 py-3 w-screen">
        <div class="flex flex-row justify-between items-center">
            <div class="ml-8 text-[#fafafa] text-2xl font-semibold">Logo</div>
            <ul class="flex flex-row mr-8 gap-4 text-[#fafafa]">
                <li><a href="/"> SignUp </a></li>
                <li><a href="/"> LogIn </a></li>
            </ul>
        </div>
    </nav>
    <div class="flex flex-col justify-center items-center font-bold min-h-screen">
        <h1 class="text-5xl mb-8">Todo</h1>
        <a href="/todolist">
            <div
                 class="py-2 px-3 bg-[#fafafa] hover:bg-sky-700 hover:text-[#fafafa] rounded-lg drop-shadow-md">
                Go to Tasks</div>
        </a>

    </div>
</body>

</html>
