<div class="fixed left-0 top-0 w-64 h-full bg-gray-900 p-4">
    <a href="#" class="flex items-center pb-4 border-b border-bg-gray-800">
        <img src="{{ asset('images/360.jpg') }}" alt="360" class="w-8 h-8 rounded-full">
        <span class="text-lg font-bold text-white ml-3">Logo</span>
    </a>
    <ul class="mt-4">
        <li class="mb-1 group active">
            <a href="{{ route('admin.home') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800">
                <span class="w-6 text-center mr-3">&#128202;</span>
                <span class="text-sm">Dashboard</span>
            </a>
        </li>
        <li class="mb-2">
            <a href="{{ route('users.index') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-800 hover:text-white rounded-md transition">
                {{-- &#128273; 是钥匙 🔑 或者你可以用 &#128100; 是人像 👤 --}}
                <span class="w-6 text-center mr-3 text-lg">&#128100;</span>
                <span class="text-sm">User Management</span>
            </a>
        </li>   
        <li class="mb-2">
            <a href="{{ route('companies.index') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-800 hover:text-white rounded-md transition">
                {{-- &#128273; 是钥匙 🔑 或者你可以用 &#128100; 是人像 👤 --}}
                <span class="w-6 text-center mr-3 text-lg">&#127981;</span>
                <span class="text-sm">Companies</span>
            </a>
        </li>   
        <li class="mb-2">
            <a href="#" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-800 hover:text-white rounded-md transition">
                {{-- &#128273; 是钥匙 🔑 或者你可以用 &#128100; 是人像 👤 --}}
                <span class="w-6 text-center mr-3 text-lg">&#128101;</span>
                <span class="text-sm">Employee List</span>
            </a>
        </li>
        <li class="mb-2">
            <a href="#" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-800 hover:text-white rounded-md transition">
                {{-- &#128273; 是钥匙 🔑 或者你可以用 &#128100; 是人像 👤 --}}
                <span class="w-6 text-center mr-3 text-lg">&#128197;</span>
                <span class="text-sm">Attendence</span>
            </a>
        </li>
        <li class="mb-2">
            <a href="#" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-800 hover:text-white rounded-md transition">
                {{-- &#128273; 是钥匙 🔑 或者你可以用 &#128100; 是人像 👤 --}}
                <span class="w-6 text-center mr-3 text-lg">&#128176;</span>
                <span class="text-sm">Payroll Processing</span>
            </a>
        </li>
        <li class="mb-2">
            <a href="#" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-800 hover:text-white rounded-md transition">
                {{-- &#128273; 是钥匙 🔑 或者你可以用 &#128100; 是人像 👤 --}}
                <span class="w-6 text-center mr-3 text-lg">&#9993;</span>
                <span class="text-sm">Leave Requests</span>
            </a>
        </li>
        <li class="mb-2">
            <a href="#" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-800 hover:text-white rounded-md transition">
                {{-- &#128273; 是钥匙 🔑 或者你可以用 &#128100; 是人像 👤 --}}
                <span class="w-6 text-center mr-3 text-lg">&#9881;</span>
                <span class="text-sm">Settings</span>
            </a>
        </li>

        <li class="mt-2">
            <a href="{{ route('logout') }}" 
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="flex items-center py-2 px-4 text-red-400 hover:bg-red-900 hover:text-white rounded-md transition">
                <span class="w-6 text-center mr-3 text-lg">&#128682;</span>
                <span class="text-sm">Logout</span>
            </a>

            {{-- 隐藏的登出表单 --}}
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </li>
    </ul>
</div>