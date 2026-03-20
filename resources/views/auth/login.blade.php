@extends('output.layout')

@section('content')
    <div class="font-poppins flex justify-center items-center min-h-screen bg-gray-50 px-4">
        {{-- Main Card Container --}}
        <div class="flex w-full max-w-4xl bg-white rounded-2xl shadow-xl overflow-hidden">

            {{-- Left Side (Form) --}}
            <div class="w-full md:w-1/2 flex flex-col justify-center p-8 lg:p-12">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Sign in</h1>
                <p class="font-light text-gray-500 mb-8">Welcome back! Please sign in first!</p>

                <form action="{{ route('login.authenticate') }}" method="POST" class="space-y-5">
                    @csrf
                    {{-- Email Field --}}
                    <div class="relative">
                        <label class="block text-sm font-medium text-gray-700 mb-1 ml-1">Email</label>
                        <div class="relative group">
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email"
                                class="w-full h-12 pl-5 pr-12 border border-gray-300 rounded-full focus:border-gray-800 focus:ring-1 focus:ring-gray-800 outline-none transition-all placeholder:text-gray-400 font-light {{ $errors->has('email') ? 'border-red-500 bg-red-50' : 'border-gray-300 focus:border-gray-800' }}">
                            <i
                                class="bx bx-envelope absolute right-5 top-1/2 -translate-y-1/2 text-xl text-gray-400 group-focus-within:text-gray-800 transition-colors"></i>
                        </div>
                    </div>

                    {{-- Password Field --}}
                    <div class="relative">
                        <label class="block text-sm font-medium text-gray-700 mb-1 ml-1">Password</label>
                        <div class="relative group">
                            <input type="password" name="password" placeholder="Enter your password"
                                class="w-full h-12 pl-5 pr-12 border border-gray-300 rounded-full focus:border-gray-800 focus:ring-1 focus:ring-gray-800 outline-none transition-all placeholder:text-gray-400 font-light {{ $errors->has('email') ? 'border-red-500 bg-red-50' : 'border-gray-300 focus:border-gray-800' }}"">
                            <i
                                class="bx bx-lock-alt absolute right-5 top-1/2 -translate-y-1/2 text-xl text-gray-400 group-focus-within:text-gray-800 transition-colors"></i>
                        </div>
                    </div>
                    @if ($errors->any())
                        <p class="text-xs text-red-500 ml-2 italic">Invalid email or password. Please try again.</p>
                    @endif

                    <div class="flex justify-between items-center w-full text-sm">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" class="w-4 h-4 mr-2 accent-gray-800 rounded">
                            <span class="text-gray-600">Remember me</span>
                        </label>
                        <a href="#" class="font-semibold text-gray-800 hover:underline">Forgot password?</a>
                    </div>

                    {{-- Sign in button --}}
                    <button type="submit"
                        class="w-full h-12 bg-gray-900 text-white rounded-full font-bold hover:bg-black transition-all shadow-md active:scale-[0.98]">
                        Sign in
                    </button>
                </form>

                {{-- Register Link --}}
                <div class="mt-8 text-center text-sm text-gray-600">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="font-bold text-gray-900 hover:underline">Sign up</a>
                </div>
            </div>

            {{-- Right side (Visual/Image - Hidden on Mobile) --}}
            <div class="hidden md:flex md:w-1/2 bg-gray-900 items-center justify-center p-12 text-white relative">
                <div class="z-10 text-center">
                    <h2 class="text-4xl font-bold mb-4">Payroll System</h2>
                    <p class="text-gray-400 font-light">Manage your employees and salary efficiently in one place.</p>
                </div>
                {{-- Decorative circles --}}
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-16 -mt-16"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full -ml-12 -mb-12"></div>
            </div>
        </div>
    </div>
@endsection
