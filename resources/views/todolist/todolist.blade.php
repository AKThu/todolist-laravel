<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#eaeaea] text-[#222222]">

    {{-- start of navigation bar --}}
    <x-nav-bar />
    {{-- end of navigation bar --}}

    {{-- start of main body --}}
    <div class="flex flex-col items-center min-h-screen p-4 pt-20">

        {{-- start of header --}}
        <h1 class="text-5xl font-extralight mb-4 text-gray-500">Todo List</h1>
        {{-- end of header --}}

        {{-- start of container for holding all the tasks --}}
        <div class="bg-[#fafafa] p-4 rounded-md drop-shadow-md w-full sm:w-4/5 flex flex-col items-center">

            {{-- start of section "uncompleted tasks" --}}

                {{-- start of label "uncompleted tasks" --}}
                <p class="self-start font-extralight text-xl text-gray-500">Uncompleted tasks</p>
                {{-- end of label "uncompleted tasks" --}}
    
                {{-- start of looping through all tasks --}}
                @foreach ($tasks as $task)
                    
                    {{-- start of filtering uncompleted tasks --}}
                    @if ($task->status === 0 && $task->user_id === Auth::id())
    
                        {{-- start of container for one task --}}
                        <div
                             class="flex flex-row justify-between items-center py-2 px-3 my-1 w-full hover:bg-sky-700 hover:text-[#f2f2f2] hover:rounded-lg hover:drop-shadow-lg">
                            
                            {{-- start of label "task name" --}}
                            <p class="text-lg font-medium">{{ $task->task }}</p>
                            {{-- end of label "task name" --}}
    
                            {{-- start of container for controller buttons --}}
                            <div class="flex flex-row items-center ">
    
                                {{-- start of button "edit" --}}
                                <a href="todolist/{{ $task->id }}/edit">
                                    <div class="mx-1 sm:mx-4 font-light py-1 px-1 rounded-full bg-[#fafafa]">
                                        <img src="../resources/icons/edit.svg" alt="edit_icon" class="w-6 h-6">
                                    </div>
                                </a>
                                {{-- end of button "edit" --}}
    
                                {{-- start of button "mark as complete" --}}
                                <form action="todolist/{{ $task->id }}/update-status" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                            class="mx-1 sm:mx-4 font-light py-1 px-1 rounded-full bg-[#fafafa]">
                                            <img src="../resources/icons/checkmark.svg" alt="checkmark_icon" class="w-6 h-6">
                                    </button>
                                </form>
    
                                {{-- start of button "delete" --}}
                                <form action="/todolist/{{ $task->id }}/delete" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="mx-1 sm:mx-4 font-light py-1 px-1 rounded-full bg-[#fafafa]">
                                        <svg viewBox="0 0 24 24" class="w-6 h-6 fill-red-600">
                                            <path d="M 10 2 L 9 3 L 4 3 L 4 5 L 7 5 L 17 5 L 20 5 L 20 3 L 15 3 L 14 2 L 10 2 z M 5 7 L 5 20 C 5 21.1 5.9 22 7 22 L 17 22 C 18.1 22 19 21.1 19 20 L 19 7 L 5 7 z"/>
                                        </svg>
                                    </button>
                                </form>
                                {{-- end of button "delete" --}}

                            </div>
                            {{-- end of container for controller buttons --}}
    
                        </div>
                        {{-- end of container for one task --}}
    
                    @endif
                    {{-- end of filtering uncompleted tasks --}}
    
                @endforeach
                {{-- end of looping through all tasks --}}

            {{-- end of section "uncompleted tasks" --}}

            {{-- start of button "+ Add new task" --}}
            <a href="/todolist/add">
                <div
                     class="py-2 px-4 my-4 rounded-lg drop-shadow-lg bg-sky-700 hover:bg-sky-800 text-[#fafafa] w-fit">
                    + Add new task </div>
            </a>
            {{-- end of button "+ Add new task" --}}

            {{-- start of horizontal line --}}
            <hr class="border-double border-gray-300 my-4 w-full">
            {{-- end of horizontal line --}}
            
            {{-- start of section "completed tasks" --}}

                {{-- start of label "completed tasks" --}}
                <p class="self-start font-extralight text-xl text-gray-500">Completed tasks</p>
                {{-- end of label "completed tasks" --}}

                {{-- start of looping through all tasks --}}
                @foreach ($tasks as $task)

                    {{-- start of filtering completed tasks --}}
                    @if ($task->status === 1 && $task->user_id === Auth::id())

                        {{-- start of container for one task --}}
                        <div
                            class="flex flex-row justify-between items-center py-2 px-3 my-1 w-full hover:bg-sky-700 hover:text-[#dddddd] hover:rounded-lg hover:drop-shadow-lg line-through text-gray-500">
                            
                            {{-- start of label "task name" --}}
                            <p class="text-lg font-light">{{ $task->task }}</p>
                            {{-- end of label "task name" --}}

                            {{-- start of container for controller buttons --}}
                            <div class="flex flex-row items-center">

                                {{-- start of button "mark as uncomplete" --}}
                                <form action="todolist/{{ $task->id }}/update-status" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                            class="mx-1 sm:mx-4 font-light py-1 px-1 rounded-full bg-[#fafafa]">
                                            <img src="../resources/icons/cross.svg" alt="checkmark_icon" class="w-6 h-6">
                                    </button>
                                </form>
                                {{-- end of button "mark as uncomplete" --}}

                                {{-- start of button "delete" --}}
                                <form action="/todolist/{{ $task->id }}/delete" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="mx-1 sm:mx-4 font-light py-1 px-1 rounded-full bg-[#fafafa] ">
                                            <svg viewBox="0 0 24 24" class="w-6 h-6 fill-red-600">
                                                <path d="M 10 2 L 9 3 L 4 3 L 4 5 L 7 5 L 17 5 L 20 5 L 20 3 L 15 3 L 14 2 L 10 2 z M 5 7 L 5 20 C 5 21.1 5.9 22 7 22 L 17 22 C 18.1 22 19 21.1 19 20 L 19 7 L 5 7 z"/>
                                            </svg>
                                    </button>
                                </form>
                                {{-- end of button "delete" --}}

                            </div>
                            {{-- end of container for controller buttons --}}

                        </div>
                        {{-- end of container for one task --}}

                    @endif
                    {{-- end of filtering completed tasks --}}

                @endforeach
                {{-- end of looping through all tasks --}}

            {{-- end of section "completed tasks" --}}

        </div>
        {{-- end of container for holding all the tasks --}}

        {{-- start of back to home button --}}
        <a href="/">
            <div class="mt-8 hover:text-red-700"> >Home< </div>
        </a>
        {{-- end of back to home button --}}

    </div>
    {{-- end of main body --}}



    <script src="../../js/script.js"></script>
</body>

</html>
