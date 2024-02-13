<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex flex-col items-center bg-[#eaeaea] text-[#121212] min-h-screen p-4">
        <h1 class="text-3xl font-medium mb-4">Todo List</h1>

        <div class="bg-[#fafafa] p-4 rounded-md drop-shadow-md w-4/5">
            @foreach ($tasks as $task)
                @if ($task->status === 0)
                    <div
                         class="flex flex-row justify-between py-1 px-3 my-3 w-full hover:bg-sky-700 hover:text-[#f2f2f2] hover:rounded-lg hover:drop-shadow-lg hover:p-2 {{ $task->status === 0 ?: 'line-through' }}">
                        <p>{{ $task->task }}</p>
                        <div class="flex flex-row">
                            <form action="/todolist/{{ $task->id }}/update-status" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="mx-4">Mark as complete</button>
                            </form>
                            <form action="/todolist/{{ $task->id }}/edit">
                                <button type="submit" class="mx-4">edit</button>
                            </form>
                            <form action="/todolist/{{ $task->id }}/delete" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="mx-4">delete</button>
                            </form>
                        </div>
                    </div>
                @endif
            @endforeach
            @foreach ($tasks as $task)
                @if ($task->status === 1)
                    <div
                         class="flex flex-row justify-between py-1 px-3 my-3 w-full hover:bg-rose-700 hover:text-[#f2f2f2] hover:rounded-lg hover:drop-shadow-lg hover:p-2 line-through">
                        <p>{{ $task->task }}</p>
                        <div class="flex flex-row">
                            <form action="/todolist/{{ $task->id }}/update-status" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="mx-4">Mark as uncomplete</button>
                            </form>
                            <form action="/todolist/{{ $task->id }}/delete" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="mx-4">delete</button>
                            </form>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <a href="/todolist/add">
            <div class="mt-4 p-3 bg-[#fafafa] drop-shadow-md rounded-full hover:bg-sky-700 hover:text-[#f2f2f2]"> + Add
                new task
            </div>
        </a>
    </div>

</body>

</html>
