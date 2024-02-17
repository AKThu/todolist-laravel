<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit task</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#eaeaea] text-[#222222]">
    <x-nav-bar />
    <div class="flex flex-col items-center justify-center min-h-screen p-4">
        <h1 class="text-5xl font-extralight text-gray-500 mb-8">Edit task</h1>
        <div class="bg-[#fafafa] p-8 rounded-md drop-shadow-md w-fit flex flex-col items-center mb-8">
            <form action="/todolist/{{ $task->id }}/edit" method="post" class="flex flex-col items-center">
                @csrf
                @method('PUT')
                <div>
                    <label for="task" class="mr-3 text-xl">Task:</label>
                    <input type="text" name="task" id="task" value="{{ $task->task }}" required
                           class="border-2 border-gray-300 rounded-lg px-2 py-1">
                    <p class="text-sm text-red-500">{{ session('message') }}</p>
                </div>
                <button type="submit"
                        class="mt-8 bg-sky-700 px-3 py-1 rounded-lg text-white w-full hover:bg-sky-800 hover:drop-shadow-lg">Save
                    changes</button>
            </form>
        </div>
        <a href="/todolist">
            <div class="mb-10 hover:text-red-700"> >Go back< </div>
        </a>
    </div>


    <script src="../../js/script.js"></script>
</body>

</html>
