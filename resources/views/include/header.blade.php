<nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
            {{-- Logo Section --}}
            <div class="flex items-center gap-8">
                <a href="/" class="flex items-center gap-2 group">
                    <div class="w-8 h-8 bg-gray-900 rounded-lg flex items-center justify-center group-hover:rotate-12 transition-transform">
                        <span class="text-white font-bold text-xs">CA</span>
                    </div>
                    <span class="text-xl font-extrabold tracking-tight text-gray-900">
                        Custom<span class="text-gray-900">Auth</span>
                    </span>
                </a>
                <div class="hidden md:flex items-center">
                    <a href="{{ route('home') }}" class="px-3 py-2 text-sm font-semibold text-white bg-gray-900 rounded-md">
                        Dashboard
                    </a>
                </div>
            </div>

            {{-- User Dropdown (Pure CSS) --}}
            <div class="flex items-center gap-4">
                @auth
                    <div class="flex items-center gap-3 pl-4 border-l border-gray-100 relative group">
                        {{-- 触发区域 --}}
                        <div class="flex items-center gap-3 cursor-pointer py-2">
                            <div class="text-right hidden sm:block">
                                <p class="text-[10px] font-medium text-gray-400 uppercase tracking-widest leading-none mb-1">Signed in as</p>
                                <p class="text-sm font-bold text-gray-900 group-hover:text-indigo-600 transition-colors">{{ Auth::user()->name }}</p>
                            </div>
                            
                            <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-indigo-500 to-purple-500 flex items-center justify-center text-white font-bold border-2 border-white shadow-sm group-hover:scale-105 transition-transform">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        </div>

                        {{-- 下拉菜单：核心是 hidden group-hover:block --}}
                        {{-- pt-2 是为了确保鼠标滑向菜单时不会因为空隙而消失 --}}
                        <div class="hidden group-hover:block absolute right-0 top-full pt-2 w-52 z-[60]">
                            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 py-2 overflow-hidden">
                                <div class="px-4 py-2 border-b border-gray-50 mb-1">
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest text-gray-400">Account Menu</p>
                                </div>

                                {{-- 老板要求的 General 资料入口 --}}
                                <a href="{{ route('user.profile',Auth::id()) }}" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors">
                                    <i class="las la-user-circle mr-3 text-lg opacity-70"></i>
                                    My Profile (General)
                                </a>

                                <a href="#" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors">
                                    <i class="las la-cog mr-3 text-lg opacity-70"></i>
                                    Settings
                                </a>

                                <div class="my-1 border-t border-gray-50"></div>

                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors text-left font-medium">
                                        <i class="las la-sign-out-alt mr-3 text-lg opacity-70"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>