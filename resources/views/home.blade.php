@extends('output.layout')

@section('content')
<div class="font-poppins bg-white selection:bg-blue-100 selection:text-blue-600">
    <div class="bg-gray-900/50 backdrop-blur-md border-b border-gray-800 sticky top-0 z-50">
    
</div>
    {{-- Hero Section --}}
    <section class="relative bg-[#0B1120] py-24 px-4 overflow-hidden">
        {{-- 背景装饰 --}}
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full">
            <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-blue-600/20 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[30%] h-[30%] bg-purple-600/10 rounded-full blur-[120px]"></div>
        </div>

        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center relative z-10">
            {{-- Left: Text Content --}}
            <div class="lg:w-3/5 text-center lg:text-left mb-16 lg:mb-0">
                <div class="inline-flex items-center space-x-2 bg-blue-500/10 border border-blue-500/20 px-4 py-2 rounded-full mb-6">
                    <span class="flex h-2 w-2 rounded-full bg-blue-500 animate-pulse"></span>
                    <span class="text-blue-400 text-xs font-bold uppercase tracking-wider">Trusted by 500+ MY Companies</span>
                </div>
                <h1 class="text-5xl md:text-7xl font-extrabold text-white leading-tight mb-8">
                    Payroll & HR <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">Automated.</span>
                </h1>
                <p class="text-gray-400 text-lg md:text-xl mb-10 max-w-2xl leading-relaxed">
                    The most intuitive way to manage employee salaries, LHDN taxes, and attendance. Optimized for Malaysian statutory compliance (EPF, SOCSO, EIS).
                </p>
                <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-5">
                    <a href="/login" class="px-10 py-4 bg-blue-600 text-white rounded-xl font-bold hover:bg-blue-500 hover:-translate-y-1 transition-all shadow-[0_0_20px_rgba(37,99,235,0.3)] text-center">
                        Start Free Trial
                    </a>
                    <a href="#" class="px-10 py-4 bg-gray-800/50 backdrop-blur-md border border-gray-700 text-white rounded-xl font-bold hover:bg-gray-700 transition-all text-center">
                        Book a Demo
                    </a>
                </div>
            </div>

            {{-- Right: UI Mockup --}}
            <div class="lg:w-2/5 flex justify-center relative">
                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-cyan-500 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-1000"></div>
                    <div class="relative bg-gray-900 border border-gray-700 p-2 rounded-2xl shadow-2xl transform lg:rotate-2 hover:rotate-0 transition-transform duration-500">
                        <div class="bg-[#151b2b] rounded-xl overflow-hidden border border-gray-800">
                            <div class="flex items-center justify-between px-4 py-3 bg-gray-800/50">
                                <div class="flex space-x-1.5">
                                    <div class="w-3 h-3 bg-red-500/80 rounded-full"></div>
                                    <div class="w-3 h-3 bg-yellow-500/80 rounded-full"></div>
                                    <div class="w-3 h-3 bg-green-500/80 rounded-full"></div>
                                </div>
                                <div class="text-[10px] text-gray-500 font-mono">payroll-dashboard.php</div>
                            </div>
                            <div class="p-6 space-y-4">
                                <div class="flex justify-between items-center">
                                    <div class="h-4 w-24 bg-gray-700 rounded"></div>
                                    <div class="h-6 w-12 bg-green-500/20 rounded-full border border-green-500/30"></div>
                                </div>
                                <div class="space-y-2">
                                    <div class="h-3 w-full bg-gray-800 rounded"></div>
                                    <div class="h-3 w-4/5 bg-gray-800 rounded"></div>
                                </div>
                                <div class="h-20 w-full bg-blue-600/10 rounded-lg border border-blue-500/20 flex items-center justify-center">
                                    <span class="text-blue-400 text-xs font-mono">Calculating SOCSO...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Stats Bar --}}
    <div class="bg-white py-12 border-b border-gray-100">
        <div class="max-w-6xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div>
                <div class="text-3xl font-bold text-gray-900">100%</div>
                <div class="text-sm text-gray-500 uppercase tracking-wide">LHDN Compliant</div>
            </div>
            <div>
                <div class="text-3xl font-bold text-gray-900">24/7</div>
                <div class="text-sm text-gray-500 uppercase tracking-wide">Cloud Access</div>
            </div>
            <div>
                <div class="text-3xl font-bold text-gray-900">0.5s</div>
                <div class="text-sm text-gray-500 uppercase tracking-wide">Report Generation</div>
            </div>
            <div>
                <div class="text-3xl font-bold text-gray-900">RM 0</div>
                <div class="text-sm text-gray-500 uppercase tracking-wide">Setup Fee</div>
            </div>
        </div>
    </div>

    {{-- Features Section --}}
    <section class="py-24 px-4 bg-gray-50">
        <div class="max-w-6xl mx-auto">
            <div class="max-w-3xl mx-auto text-center mb-20">
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Modern Features for Modern HR</h2>
                <p class="text-gray-600 text-lg leading-relaxed">Everything you need to manage your workforce in one place, from SSM registration to monthly disbursement.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                {{-- Card 1 --}}
                <div class="bg-white p-10 rounded-3xl shadow-[0_10px_40px_-15px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center text-3xl mb-8">
                        <i class="bx bxs-zap"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Statutory Auto-Calc</h3>
                    <p class="text-gray-600 leading-relaxed">Forget complex Excel formulas. Our engine automatically calculates EPF, SOCSO, EIS, and PCB based on current Malaysian rates.</p>
                </div>

                {{-- Card 2 --}}
                <div class="bg-white p-10 rounded-3xl shadow-[0_10px_40px_-15px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300">
                    <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center text-3xl mb-8">
                        <i class="bx bxs-bank"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Bank Integration</h3>
                    <p class="text-gray-600 leading-relaxed">Generate GIRO/Batch payment files for Maybank, CIMB, and Public Bank in seconds. Fast and error-free disbursement.</p>
                </div>

                {{-- Card 3 --}}
                <div class="bg-white p-10 rounded-3xl shadow-[0_10px_40px_-15px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300">
                    <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center text-3xl mb-8">
                        <i class="bx bxs-file-pdf"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Smart E-Payslips</h3>
                    <p class="text-gray-600 leading-relaxed">Professional, PDF-protected payslips delivered directly to employee emails. Reduce paper waste and improve transparency.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="py-12 border-t border-gray-100 bg-white">
        <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold">P</div>
                <span class="font-bold text-gray-900">PayrollSystem</span>
            </div>
            <p class="text-gray-400 text-sm italic">&copy; 2026 Payroll System. Crafted for Malaysian SMEs.</p>
            <div class="flex space-x-6 text-gray-400">
                <a href="#" class="hover:text-blue-600 transition text-xl"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="hover:text-blue-600 transition text-xl"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer>
</div>
@endsection