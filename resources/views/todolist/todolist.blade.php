<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#eaeaea] text-[#222222]">
    <x-nav-bar />
    <div class="flex flex-col items-center min-h-screen p-4 pt-20">
        <h1 class="text-5xl font-extralight mb-4 text-gray-500">Todo List</h1>
        <div class="bg-[#fafafa] p-4 rounded-md drop-shadow-md w-4/5 flex flex-col items-center">
            <p class="self-start font-extralight text-xl text-gray-500">Uncompleted tasks</p>
            @foreach ($tasks as $task)
                @if ($task->status === 0 && $task->user_id === Auth::id())
                    <div
                         class="flex flex-row justify-between items-center py-2 px-3 my-1 w-full hover:bg-sky-700 hover:text-[#f2f2f2] hover:rounded-lg hover:drop-shadow-lg">
                        <p>{{ $task->task }}</p>
                        <div class="flex flex-row items-center">
                            <a href="todolist/{{ $task->id }}/edit">
                                <div class="mx-4 font-light py-1 px-2 rounded-lg hover:bg-amber-500">edit</div>
                            </a>
                            <form action="todolist/{{ $task->id }}/update-status" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                        class="mx-4 font-light py-1 px-2 rounded-lg hover:bg-green-600">mark
                                    as
                                    complete
                                </button>
                            </form>
                            <form action="/todolist/{{ $task->id }}/delete" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="mx-4 font-light py-1 px-2 rounded-lg hover:bg-red-500">delete</button>
                            </form>
                        </div>
                    </div>
                @endif
            @endforeach
            <a href="/todolist/add">
                <div
                     class="py-2 px-4 my-4 rounded-lg drop-shadow-lg bg-sky-700 hover:bg-sky-800 text-[#fafafa] w-fit">
                    + Add new task </div>
            </a>
            <hr class="border-double border-gray-300 my-4 w-full">
            <p class="self-start font-extralight text-xl text-gray-500">Completed tasks</p>
            @foreach ($tasks as $task)
                @if ($task->status === 1 && $task->user_id === Auth::id())
                    <div
                         class="flex flex-row justify-between items-center py-2 px-3 my-1 w-full hover:bg-sky-700 hover:text-[#dddddd] hover:rounded-lg hover:drop-shadow-lg line-through text-gray-500">
                        <p>{{ $task->task }}</p>
                        <div class="flex flex-row items-center">
                            <form action="todolist/{{ $task->id }}/update-status" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                        class="mx-4 font-light py-1 px-2 rounded-lg hover:bg-red-500">mark
                                    as uncomplete</button>
                            </form>
                            <form action="/todolist/{{ $task->id }}/delete" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="mx-4 font-light py-1 px-2 rounded-lg hover:bg-red-500">delete</button>
                            </form>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <a href="/">
            <div class="mt-8 hover:text-red-700"> >Home< </div>
        </a>
    </div>



    <script src="../../js/script.js"></script>
</body>

</html>
