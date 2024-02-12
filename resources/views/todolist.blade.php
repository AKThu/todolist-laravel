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
            <a href="#">
                <div class="flex flex-row justify-between py-1 px-3 my-3 w-full hover:bg-sky-700 hover:text-[#f2f2f2] hover:rounded-lg hover:drop-shadow-lg hover:p-2">
                    <p>Drink water</p>
                    <div class="flex flex-row">
                        <a href="#delete"><div class="mx-4">edit</div></a>
                        <a href="#delete"><div class="mx-4">mark as complete</div></a>
                    </div>
                </div>
            </a>
            <a href="#"><p class="py-1 px-3 my-3 w-full hover:bg-sky-700 hover:text-[#f2f2f2] hover:rounded-lg hover:drop-shadow-lg hover:p-2">Do exercise</p></a>
            <a href="#"><p class="py-1 px-3 my-3 w-full hover:bg-sky-700 hover:text-[#f2f2f2] hover:rounded-lg hover:drop-shadow-lg hover:p-2">Read manga</p></a>
        </div>
    </div>
    
</body>
</html>