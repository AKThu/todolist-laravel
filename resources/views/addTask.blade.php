<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new task</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex flex-col items-center bg-[#eaeaea] text-[#121212] min-h-screen p-4">
        <h1 class="text-3xl font-medium mb-4">Add new task</h1>
        <div class="bg-[#fafafa] p-4 rounded-md drop-shadow-md w-fit flex flex-col items-center">
            <form action="/todolist/add"
                  method="POST"
                  class="flex flex-col">
                @csrf
                <div>
                    <label for="task">Task</label>
                    <input type="text" name="task"
                           id="task" class="ml-2 p-2 border-2 border-gray-400 rounded-lg">
                </div>
                <button type="submit"
                        class="mt-8 p-2 bg-sky-700 text-[#f2f2f2] rounded-lg hover:bg-sky-800 hover:drop-shadow-lg">
                    Add
                </button>
            </form>
        </div>
        <a href="/todolist" class="mt-5 hover:text-sky-700"> >go back< </a>
    </div>
</body>

</html>
