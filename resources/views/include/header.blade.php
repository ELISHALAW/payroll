<nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
            <div class="flex items-center gap-8">
                <a href="#" class="flex items-center gap-2 group">
                    <div class="w-8 h-8 bg-gray-900 rounded-lg flex items-center justify-center group-hover:rotate-12 transition-transform">
                        <span class="text-white font-bold text-xs">CA</span>
                    </div>
                    <span class="text-xl font-extrabold tracking-tight text-gray-900">
                        Custom<span class="text-gray-900">Auth</span>
                    </span>
                </a>
                
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('home') }}" class="px-3 py-2 text-sm font-semibold text-white bg-gray-900 rounded-md">
                        Dashboard
                    </a>
                    
                </div>
            </div>

            <div class="flex items-center gap-4">
                @guest
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-700 hover:text-gray-600 transition-colors">
                        Sign in
                    </a>
                    <a href="{{ route('register') }}" class="text-sm font-semibold text-gray-700 hover:text-gray-600 transition-colors">
                        Register
                    </a>
                    <a href="" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-white bg-gray-900 rounded-xl shadow-md shadow-indigo-200 hover:bg-gray-700 hover:shadow-lg active:scale-95 transition-all">
                        Get Started
                    </a>
                @endguest

                @auth
                    <div class="flex items-center gap-3 pl-4 border-l border-gray-100">
                        <div class="text-right hidden sm:block">
                            <p class="text-xs font-medium text-gray-500 leading-none">Signed in as</p>
                            <p class="text-sm font-bold text-gray-900">{{Auth::user()->name}}</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-indigo-500 to-purple-500 flex items-center justify-center text-white font-bold border-2 border-white shadow-sm">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="ml-2 p-2 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-full transition-all focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                            </button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>