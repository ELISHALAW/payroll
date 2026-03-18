<header class="flex items-center justify-between px-8 py-4 bg-white shadow-md sticky top-0 z-20">
    <div class="flex items-center">
        <label for="nav-toggle" class="cursor-pointer p-2 hover:bg-gray-100 rounded-lg transition-colors mr-4">
            <span class="las la-bars text-2xl text-gray-600"></span>
        </label>
        <div>
            <h2 class="text-xl font-bold text-gray-800 tracking-tight">
                @yield('page_title', 'Dashboard')
            </h2>
            <p class="text-xs text-gray-400 font-medium">System Management</p>
        </div>
    </div>

    <div class="flex items-center space-x-4">
        {{-- 用户资料卡片 --}}
        <div class="flex items-center bg-gray-50 px-3 py-1.5 rounded-full border border-gray-100 hover:shadow-sm transition-shadow">
            <div class="text-right mr-3">
                <h4 class="text-xs font-bold text-gray-900 leading-none">
                    {{ auth()->user()->name }}
                </h4>
            </div>
            
          
        </div>
    </div>
</header>