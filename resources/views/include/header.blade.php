<nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center h-16">

            {{-- 1. LEFT SIDE --}}
            <div class="flex items-center gap-6">
                <a href="/" class="flex items-center gap-2 group">
                    <div
                        class="w-8 h-8 bg-gray-900 rounded-lg flex items-center justify-center group-hover:rotate-12 transition-transform">
                        <span class="text-white font-bold text-xs">CA</span>
                    </div>
                    <span class="text-xl font-extrabold tracking-tight text-gray-900 whitespace-nowrap">
                        CustomAuth
                    </span>
                </a>

                <div class="hidden md:flex items-center">
                    <a href="{{ route('home') }}"
                        class="px-3 py-2 text-sm font-semibold text-white bg-gray-900 rounded-md">
                        Dashboard
                    </a>
                </div>
            </div>

            {{-- 2. MIDDLE SECTION: Only appears on Profile Page --}}
            @if (Route::is('user.*'))
                <div class="flex-1 hidden md:flex justify-center items-center h-full px-8">
                    <div class="flex items-center h-full gap-1">
                        <a href="{{ route('user.profile', Auth::id()) }}"
                            class="px-2 py-1 text-xs font-black uppercase tracking-widest text-gray-900 bg-gray-100 rounded-full">
                            General
                        </a>

                        <a href="{{ route('user.employment', Auth::id()) }}"
                            class="px-2 py-1 text-xs font-bold uppercase tracking-widest text-gray-500 hover:text-gray-900 transition-colors">
                            Employment
                        </a>
                        <a href="{{ route('user.compensation', Auth::id()) }}"
                            class="px-2 py-1 text-xs font-bold uppercase tracking-widest text-gray-500 hover:text-gray-900 transition-colors">
                            Compensation
                        </a>
                        <a href="{{ route('user.leave', Auth::id()) }}"
                            class="px-2 py-1 text-xs font-bold uppercase tracking-widest text-gray-500 hover:text-gray-900 transition-colors">
                            Leave
                        </a>
                        <a href="#"
                            class="px-2 py-1 text-xs font-bold uppercase tracking-widest text-gray-500 hover:text-gray-900 transition-colors">
                            Family
                        </a>
                        <a href="#"
                            class="px-2 py-1 text-xs font-bold uppercase tracking-widest text-gray-500 hover:text-gray-900 transition-colors">
                            Documents
                        </a>
                        <a href="#"
                            class="px-2 py-1 text-xs font-bold uppercase tracking-widest text-gray-500 hover:text-gray-900 transition-colors">
                            Offday
                        </a>
                    </div>
                </div>
            @else
                {{-- Spacer to keep the layout consistent when tabs are hidden --}}
                <div class="flex-1"></div>
            @endif

            {{-- 3. RIGHT SIDE: User Section --}}
            <div class="flex items-center gap-4">
                @auth
                    <div class="flex items-center gap-3 relative group">
                        <div class="flex items-center gap-3 cursor-pointer py-2">
                            <div class="text-right hidden sm:block">
                                <p
                                    class="text-[10px] font-medium text-gray-400 uppercase tracking-widest leading-none mb-1">
                                    Signed in as</p>
                                <p class="text-sm font-bold text-gray-900">{{ Auth::user()->name }}</p>
                            </div>
                            <div
                                class="w-10 h-10 rounded-full bg-gradient-to-tr from-indigo-500 to-purple-500 flex items-center justify-center text-white font-bold border-2 border-white shadow-sm">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        </div>

                        {{-- Dropdown Menu --}}
                        <div class="hidden group-hover:block absolute right-0 top-full pt-2 w-52 z-[60]">
                            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 py-2 overflow-hidden">
                                {{-- Clicking this link will now trigger the middle tabs to appear --}}
                                <a href="{{ route('user.profile', Auth::id()) }}"
                                    class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors">
                                    <i class="las la-user-circle mr-3 text-lg opacity-70"></i>
                                    My Profile
                                </a>
                                <div class="my-1 border-t border-gray-50"></div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="w-full flex items-center px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors text-left font-medium">
                                        <i class="las la-sign-out-alt mr-3 text-lg opacity-70"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth

                @guest
                    {{-- 情况 B: 访客状态 --}}
                    <div class="flex items-center gap-2">
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 text-sm font-bold text-gray-600 hover:text-gray-900 transition-colors">
                            Sign In
                        </a>
                        <a href="{{ route('register') }}"
                            class="px-5 py-2 bg-gray-900 text-white rounded-xl text-sm font-bold hover:bg-gray-800 transition-all shadow-sm hover:shadow-md active:scale-95">
                            Register
                        </a>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>
