<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit task</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex flex-col items-center justify-center bg-[#eaeaea] text-[#121212] min-h-screen p-4">
        <h1 class="text-3xl font-medium mb-8">Edit task</h1>
        <div class="bg-[#fafafa] p-8 rounded-md drop-shadow-md w-2/5 flex flex-col items-center mb-8">
            <form action="/todolist/{{ $task->id }}/edit" method="post" class="flex flex-col items-center">
                @csrf
                @method('PUT')
                <div>
                    <label for="task" class="mr-3 text-xl">Task:</label>
                    <input type="text" name="task" id="task" value="{{ $task->task }}"
                           class="border-2 border-gray-300 rounded-lg px-2 py-1">
                </div>
                <button type="submit"
                        class="mt-8 bg-sky-700 px-3 py-1 rounded-lg text-white w-full hover:bg-sky-800 hover:drop-shadow-lg">Save
                    changes</button>
            </form>
        </div>
        <a href="/todolist">
            <div class="mb-10 hover:text-sky-700"> >Go back< </div>
        </a>
    </div>
</body>

</html>
