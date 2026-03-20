@extends('output.layout')

@section('content')
    <div class="font-poppins bg-white">

        {{-- Hero Section --}}
        <section class="relative bg-gray-900 py-20 px-4 overflow-hidden">
            <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center relative z-10">
                {{-- Left: Text --}}
                <div class="md:w-1/2 text-center md:text-left mb-10 md:mb-0">
                    <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight mb-6">
                        Payroll Management <br> <span class="text-blue-500">Made Simple.</span>
                    </h1>
                    <p class="text-gray-400 text-lg mb-8 max-w-lg">
                        The most intuitive way to manage employee salaries, taxes, and attendance. Built for modern
                        Malaysian businesses.
                    </p>
                    <div class="flex flex-col sm:flex-row justify-center md:justify-start gap-4">
                        <a href="/login"
                            class="px-8 py-3 bg-blue-600 text-white rounded-full font-bold hover:bg-blue-700 transition shadow-lg text-center">
                            Get Started
                        </a>
                        <a href="#"
                            class="px-8 py-3 border border-gray-600 text-white rounded-full font-bold hover:bg-gray-800 transition text-center">
                            Watch Demo
                        </a>
                    </div>
                </div>

                {{-- Right: Visual Illustration --}}
                <div class="md:w-1/2 flex justify-center">
                    <div class="relative">
                        <div
                            class="w-64 h-64 md:w-80 md:h-80 bg-blue-600 rounded-full blur-3xl opacity-20 absolute top-0 -left-10">
                        </div>
                        <div class="bg-gray-800 p-6 rounded-2xl shadow-2xl border border-gray-700 transform rotate-3">
                            <div class="flex items-center space-x-2 mb-4">
                                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                            </div>
                            <div class="space-y-3">
                                <div class="h-4 w-48 bg-gray-700 rounded"></div>
                                <div class="h-4 w-32 bg-gray-700 rounded"></div>
                                <div class="h-10 w-full bg-blue-600/20 rounded border border-blue-500/50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Features Section --}}
        <section class="py-20 px-4 bg-gray-50">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Why Choose Our System?</h2>
                    <p class="text-gray-600">Automate your HR tasks and focus on growing your business.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    {{-- Card 1 --}}
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                        <div
                            class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-2xl mb-6">
                            <i class="bx bx-bolt-circle"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Instant Salary Calculation</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Calculate EPF, SOCSO, and EIS automatically with
                            one click based on current laws.</p>
                    </div>

                    {{-- Card 2 --}}
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                        <div
                            class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center text-2xl mb-6">
                            <i class="bx bx-shield-quarter"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Highly Secure</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Your data is encrypted and protected. Only
                            authorized HR managers can access sensitive info.</p>
                    </div>

                    {{-- Card 3 --}}
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                        <div
                            class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center text-2xl mb-6">
                            <i class="bx bx-file"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">E-Payslips</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Employees can view and download their monthly
                            payslips directly from their dashboard.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Footer --}}
        <footer class="py-10 border-t border-gray-200 text-center">
            <p class="text-gray-500 text-sm">&copy; 2026 Payroll System. Built with Laravel & Tailwind CSS.</p>
        </footer>
    </div>
@endsection
