@extends('output.layout')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-2xl font-black text-gray-900">Payroll Calculator</h1>
            <p class="text-gray-500 text-sm">Calculating for: <span
                    class="font-bold text-indigo-600">{{ $user->name }}</span> (ID: {{ $user->id }})</p>
        </div>

        <form action="{{ route('payroll.calculate') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- LEFT SIDE: INPUTS --}}
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                        <h2 class="text-sm font-bold uppercase tracking-widest text-gray-400 mb-6">Earnings Input</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Basic Salary
                                    (RM)</label>
                                <input type="number" name="basic_salary" value="{{ $basic_salary }}"
                                    class="w-full bg-gray-50 border-gray-100 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 transition-all outline-none"
                                    placeholder="e.g. 3500">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Fixed Allowances</label>
                                <input type="number" name="allowance" value="{{ $allowance }}"
                                    class="w-full bg-gray-50 border-gray-100 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 transition-all outline-none"
                                    placeholder="0.00">
                            </div>
                        </div>
                        <button type="submit"
                            class="mt-6 bg-gray-900 hover:bg-black text-white px-8 py-3 rounded-xl font-bold text-sm transition-all shadow-lg">
                            Calculate Earnings
                        </button>
                    </div>

                    {{-- NEW DESIGN: COMPANY CONTRIBUTION STATS --}}
                    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                        <h2 class="text-sm font-bold uppercase tracking-widest text-gray-400 mb-6">Company Contribution
                            (Employer Share)</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="p-4 bg-indigo-50 rounded-xl border border-indigo-100">
                                <p class="text-[10px] font-bold text-indigo-400 uppercase">EPF Employer</p>
                                <p class="text-xl font-black text-indigo-900">RM {{ $epf_employer ?? '0.00' }}</p>
                            </div>
                            <div class="p-4 bg-indigo-50 rounded-xl border border-indigo-100">
                                <p class="text-[10px] font-bold text-indigo-400 uppercase">SOCSO Employer</p>
                                <p class="text-xl font-black text-indigo-900">RM {{ $socso_employer ?? '0.00' }}</p>
                            </div>
                            <div class="p-4 bg-indigo-50 rounded-xl border border-indigo-100">
                                <p class="text-[10px] font-bold text-indigo-400 uppercase">EIS Employer</p>
                                <p class="text-xl font-black text-indigo-900">RM {{ $eis_employer ?? '0.00' }}</p>
                            </div>
                        </div>

                        <div class="mt-4 flex justify-between items-center p-4 bg-gray-900 rounded-xl">
                            <span class="text-xs font-bold text-gray-400 uppercase">Total Cost to Company</span>
                            <span class="text-xl font-black text-white">RM {{ $total_cost_deduction ?? '0.00' }}</span>
                        </div>
                    </div>
                </div>

                {{-- RIGHT SIDE: NET PAY SUMMARY --}}
                <div class="space-y-6">
                    <div class="bg-gray-900 text-white p-6 rounded-3xl shadow-2xl relative overflow-hidden">
                        {{-- Decorative Circle --}}
                        <div class="absolute -top-10 -right-10 w-32 h-32 bg-indigo-600 rounded-full blur-3xl opacity-20">
                        </div>

                        <h2 class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-6 text-center relative">Net
                            Pay Estimate</h2>
                        <div class="text-center mb-8 relative">
                            <span class="text-5xl font-black tracking-tighter">RM {{ $net_pay }}</span>
                        </div>

                        <div class="space-y-4 border-t border-gray-800 pt-6 relative">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-400 font-medium">EPF (11%)</span>
                                <span class="font-bold text-red-400">- RM {{ $epf }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-400 font-medium">SOCSO</span>
                                <span class="font-bold text-red-400">- RM {{ $socso }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-400 font-medium">EIS</span>
                                <span class="font-bold text-red-400">- RM {{ $eis }}</span>
                            </div>

                            {{-- Total Deduction Highlight --}}
                            <div class="flex justify-between items-center bg-gray-800/50 p-3 rounded-xl">
                                <span class="text-xs font-black uppercase">Total Deductions</span>
                                <span class="text-lg font-black text-red-500">RM {{ $total_deduction }}</span>
                            </div>
                        </div>

                        <button type="button"
                            class="w-full mt-8 bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-4 rounded-2xl shadow-lg transition-all active:scale-95">
                            Generate Payslip
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
