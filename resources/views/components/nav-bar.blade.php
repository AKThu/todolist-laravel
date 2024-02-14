<nav class="fixed bg-sky-700 py-3 w-screen drop-shadow-lg z-50">
    <div class="flex flex-row justify-between items-center">
        <div class="ml-8 text-[#fafafa] text-2xl font-semibold">
            <a href="/">Logo</a>
        </div>
        <ul class="flex flex-row mr-8 gap-4 text-[#fafafa]">
            @auth
                <li onclick="profileWindowToggleController()" class="hover:cursor-pointer font-medium">
                    <span
                          class="py-2 px-3 rounded-lg drop-shadow-lg font-light bg-[#fafafa] hover:bg-[#dddddd] text-sky-700">{{ Auth::user()->name }}</span>
                    <div id="profileWindow" class="hidden">
                        <div class="fixed bg-[#fafafa] drop-shadow-md rounded-lg text-sky-700 top-12 right-10">
                            <div class="flex flex-col">
                                <a href="/profile" class="px-4 py-2 hover:bg-[#eaeaea] rounded-t-lg font-light">Profile</a>
                                <hr class="border-solid border-gray-300 w-full" />
                                <form action="/logout" method="POST" class="px-4 py-2 hover:bg-[#eaeaea] rounded-b-lg">
                                    @csrf
                                    <button type="submit" class="font-light">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
            @else
                <li><a href="/register"> Register </a></li>
                <li><a href="/login"> Login </a></li>
            @endauth
        </ul>
    </div>
</nav>
