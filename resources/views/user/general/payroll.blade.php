@php
    use Carbon\Carbon;
@endphp

@extends('output.layout')

@section('content')
    <div class="bg-slate-50 min-h-screen py-10 font-sans">
        <div
            class="max-w-[1150px] mx-auto bg-white shadow-xl shadow-slate-200/50 border border-slate-100 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:shadow-slate-200/60">

            {{-- FORM START --}}
            <form action="{{ route('payroll.calculate') }}" method="POST" id="payrollForm">
                @csrf
                <input type="hidden" name="action" id="formAction" value="calculate">

                {{-- Hidden inputs for data persistence --}}
                <input type="hidden" name="user_name" value="{{ $user->name }}">
                <input type="hidden" name="selected_month" value="{{ $selected_month }}">

                <input type="hidden" name="basic_salary" value="{{ $basic_salary }}">
                <input type="hidden" name="allowance" value="{{ $allowance }}">
                <input type="hidden" name="net_pay_amount" value="{{ $net_pay }}">

                <input type="hidden" name="epf_amount" value="{{ $monthly_ee_epf }}">
                <input type="hidden" name="socso_amount" value="{{ $monthly_ee_socso }}">
                <input type="hidden" name="eis_amount" value="{{ $monthly_ee_eis }}">

                <input type="hidden" name="epf_employer" value="{{ $monthly_er_epf }}">
                <input type="hidden" name="socso_employer" value="{{ $monthly_er_socso }}">
                <input type="hidden" name="eis_employer" value="{{ $monthly_er_eis }}">
                <input type="hidden" name="pcb_amount" value="{{ $monthly_ee_pcb }}">

                <input type="hidden" name="ytd_ee_epf" value="{{ $ytd_ee_epf }}">
                <input type="hidden" name="ytd_ee_socso" value="{{ $ytd_ee_socso }}">
                <input type="hidden" name="ytd_ee_eis" value="{{ $ytd_ee_eis }}">

                <input type="hidden" name="ytd_er_epf" value="{{ $ytd_er_epf }}">
                <input type="hidden" name="ytd_er_socso" value="{{ $ytd_er_socso }}">
                <input type="hidden" name="ytd_er_eis" value="{{ $ytd_er_eis }}">

                <input type="hidden" name="total_epf" value="{{ $total_epf }}">
                <input type="hidden" name="total_socso" value="{{ $total_socso }}">
                <input type="hidden" name="total_eis" value="{{ $total_eis }}">
                <input type="hidden" name='ytd_ee_pcb' value="{{ $ytd_ee_pcb }}">

                {{-- TOP HEADER BAR --}}
                <div
                    class="flex flex-col md:flex-row justify-between items-start md:items-center p-8 bg-white border-b border-slate-100">
                    <div class="mb-5 md:mb-0">
                        <div class="flex items-center gap-4 mb-4 md:mb-2">
                            <div
                                class="h-12 w-12 rounded-full bg-cyan-100 text-cyan-600 flex items-center justify-center font-bold text-xl border border-cyan-200 shadow-sm">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                            <div>
                                <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">{{ $user->name }}</h1>
                                <p class="text-xs font-semibold text-slate-400 mt-0.5">{{ $user->getDetail('Position') }}
                                </p>
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-6 mt-4 md:mt-2 md:pl-[64px]">
                            <div class="flex flex-col">
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5">Salary
                                    Type</span>
                                <select
                                    class="text-sm font-semibold border border-slate-200 rounded-lg py-2 px-4 w-32 bg-slate-50 text-slate-700 shadow-sm appearance-none cursor-not-allowed"
                                    disabled>
                                    <option>Monthly</option>
                                </select>
                            </div>

                            <div class="flex flex-col">
                                <span class="text-[10px] font-bold text-cyan-600 uppercase tracking-widest mb-1.5">Active
                                    Month</span>
                                <select name="selected_month"
                                    onchange="document.getElementById('formAction').value='fetch'; this.form.submit()"
                                    class="text-sm border-cyan-200 rounded-lg py-2 px-4 w-40 bg-cyan-50 text-cyan-700 font-bold shadow-sm focus:ring-2 focus:ring-cyan-500 transition-all cursor-pointer hover:bg-cyan-100 outline-none">
                                    @foreach (range(1, 12) as $m)
                                        <option value="{{ $m }}" {{ $selected_month == $m ? 'selected' : '' }}>
                                            {{ Carbon::create()->month($m)->format('F') }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="flex flex-col">
                                <span class="text-[10px] font-bold text-cyan-600 uppercase tracking-widest mb-1.5">Active
                                    Year</span>
                                <select name="selected_year"
                                    onchange="document.getElementById('formAction').value='fetch'; this.form.submit()"
                                    class="text-sm border-cyan-200 rounded-lg py-2 px-4 w-32 bg-cyan-50 text-cyan-700 font-bold shadow-sm focus:ring-2 focus:ring-cyan-500 transition-all cursor-pointer hover:bg-cyan-100 outline-none">
                                    @php $currentYear = date('Y'); @endphp
                                    @foreach (range($currentYear - 5, $currentYear + 1) as $y)
                                        <option value="{{ $y }}" {{ $selected_year == $y ? 'selected' : '' }}>
                                            {{ $y }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col items-end gap-4 w-full md:w-auto">
                        <button type="button"
                            class="text-slate-400 text-xs font-medium hover:text-red-500 hover:underline transition-colors flex items-center gap-1.5 group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 group-hover:animate-pulse"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Reset payroll
                        </button>
                        <a href="{{ route('payroll.onboarding') }}"
                            class="flex-1 md:flex-none justify-center bg-white border border-slate-200 text-slate-700 text-xs px-5 py-2.5 rounded-lg font-bold tracking-wider hover:bg-slate-50 hover:border-slate-300 shadow-sm hover:shadow transition-all flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            FIRST TIME ONBOARDING
                        </a>
                        <div class="flex gap-3 w-full md:w-auto mt-2 md:mt-0">
                            <a href="{{ route('payslip.download', ['id' => $user->id]) }}"
                                class="flex-1 md:flex-none justify-center bg-white border border-slate-200 text-slate-700 text-xs px-5 py-2.5 rounded-lg font-bold tracking-wider hover:bg-slate-50 hover:border-slate-300 shadow-sm hover:shadow transition-all flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                PAYSLIP
                            </a>
                            <button type="submit" onclick="document.getElementById('formAction').value='calculate';"
                                class="flex-1 md:flex-none justify-center bg-slate-100 border border-slate-300 text-slate-600 text-xs px-5 py-2.5 rounded-lg font-bold tracking-wider hover:bg-slate-200 hover:border-slate-400 shadow-sm hover:shadow transition-all flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                CALCULATE
                            </button>
                            <button type="submit" formaction="{{ route('payroll.save') }}"
                                class="flex-1 md:flex-none justify-center bg-cyan-600 text-white text-xs px-6 py-2.5 rounded-lg font-bold tracking-wider shadow-md hover:shadow-lg hover:bg-cyan-700 transform hover:-translate-y-0.5 transition-all flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                </svg>
                                SAVE MONTH
                            </button>
                        </div>
                    </div>
                </div>

                {{-- MAIN 4-COLUMN GRID --}}
                <div class="grid grid-cols-1 md:grid-cols-4 divide-y md:divide-y-0 md:divide-x divide-slate-100">
                    {{-- COLUMN 1: BASIC EARNINGS --}}
                    <div class="p-8 space-y-6 bg-white hover:bg-slate-50/50 transition-colors">
                        <div class="flex items-center gap-3 border-b border-slate-100 pb-4">
                            <div
                                class="bg-emerald-100 p-2 rounded-lg text-emerald-600 shadow-sm border border-emerald-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h2 class="text-xs font-bold text-slate-500 uppercase tracking-widest">Base Pay</h2>
                        </div>
                        <div class="space-y-5">
                            <div class="group">
                                <label
                                    class="block text-[10px] font-bold text-slate-400 uppercase mb-2 tracking-widest">Full
                                    Amount (RM)</label>
                                <div class="relative group-hover:shadow-md transition-shadow rounded-lg">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-slate-400 text-sm font-bold">RM</span>
                                    </div>
                                    <input type="number" name="basic_salary" value="{{ $basic_salary }}"
                                        step="0.01"
                                        class="w-full pl-11 border-slate-200 rounded-lg text-sm py-3 px-4 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-all font-semibold text-slate-700 bg-white">
                                </div>
                            </div>
                            <div class="pt-4 bg-slate-50 p-5 rounded-xl border border-slate-100 shadow-inner">
                                <p
                                    class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5 drop-shadow-sm">
                                    Net Basic Amount</p>
                                <p class="text-2xl font-black text-slate-700 flex items-baseline gap-1.5">
                                    <span class="text-sm font-bold text-slate-400">RM</span>
                                    {{ number_format($basic_salary, 2) }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- COLUMN 2: ADDITIONAL EARNINGS --}}
                    <div class="p-8 bg-slate-50/40 hover:bg-slate-50/80 transition-colors">
                        <div class="flex items-center gap-3 border-b border-slate-100 pb-4">
                            <div class="bg-blue-100 p-2 rounded-lg text-blue-600 shadow-sm border border-blue-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                            <h2 class="text-xs font-bold text-slate-500 uppercase tracking-widest">Additions</h2>
                        </div>
                        <div class="mt-6 space-y-5">
                            <div
                                class="flex justify-between items-center group p-4 bg-white rounded-xl border border-slate-200 shadow-sm hover:shadow-md transition-all hover:border-cyan-300">
                                <div class="flex flex-col gap-1.0">
                                    <span class="text-sm font-bold text-slate-700 mr-1">Allowance</span>
                                    <span class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">General
                                        Additions</span>
                                </div>
                                <div
                                    class="flex items-center gap-1.5 bg-slate-50 px-3 py-2 rounded-lg border border-slate-200 focus-within:ring-2 focus-within:ring-cyan-500 focus-within:border-cyan-500 transition-all">
                                    <span class="text-xs font-bold text-slate-400">RM</span>
                                    <input type="number" name="allowance" value="{{ $allowance }}"
                                        class="w-20 border-none text-right text-sm font-black text-cyan-600 bg-transparent focus:ring-0 p-0 m-0 placeholder-gray-300"
                                        placeholder="0.00">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- COLUMN 3: DEDUCTIONS --}}
                    <div
                        class="p-8 bg-white hover:bg-slate-50/40 transition-colors relative flex flex-col h-full col-span-1">
                        <div class="flex flex-col h-full">
                            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                                <div class="flex items-center gap-3">
                                    <div class="bg-red-100 p-2 rounded-lg text-red-600 shadow-sm border border-red-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                d="M20 12H4" />
                                        </svg>
                                    </div>
                                    <h2 class="text-xs font-bold text-slate-500 uppercase tracking-widest">Deductions</h2>
                                </div>
                                <span
                                    class="bg-red-50 text-red-600 text-[9px] font-black px-2.5 py-1 rounded-md border border-red-100 uppercase tracking-widest shadow-sm">Employee</span>
                            </div>

                            <div class="mt-6 space-y-3.5 flex-grow">
                                <div
                                    class="flex justify-between items-center py-2.5 px-3 hover:bg-slate-50 rounded-lg transition-colors border border-transparent hover:border-slate-100">
                                    <div class="flex items-center gap-3">
                                        <div class="w-1.5 h-1.5 rounded-full bg-slate-300"></div>
                                        <span class="text-sm font-semibold text-slate-600">EPF (11%)</span>
                                    </div>
                                    <span class="text-sm font-black text-slate-800">RM
                                        {{ number_format($monthly_ee_epf, 2) }}</span>
                                </div>
                                <div
                                    class="flex justify-between items-center py-2.5 px-3 hover:bg-slate-50 rounded-lg transition-colors border border-transparent hover:border-slate-100">
                                    <div class="flex items-center gap-3">
                                        <div class="w-1.5 h-1.5 rounded-full bg-slate-300"></div>
                                        <span class="text-sm font-semibold text-slate-600">SOCSO</span>
                                    </div>
                                    <span class="text-sm font-black text-slate-800">RM
                                        {{ number_format($monthly_ee_socso, 2) }}</span>
                                </div>
                                <div
                                    class="flex justify-between items-center py-2.5 px-3 hover:bg-slate-50 rounded-lg transition-colors border border-transparent hover:border-slate-100">
                                    <div class="flex items-center gap-3">
                                        <div class="w-1.5 h-1.5 rounded-full bg-slate-300"></div>
                                        <span class="text-sm font-semibold text-slate-600">EIS</span>
                                    </div>
                                    <span class="text-sm font-black text-slate-800">RM
                                        {{ number_format($monthly_ee_eis, 2) }}</span>
                                </div>
                                <div
                                    class="flex justify-between items-center py-2.5 px-3 bg-red-50/50 rounded-lg border border-red-100 shadow-sm mt-2">
                                    <div class="flex items-center gap-3">
                                        <div class="w-1.5 h-1.5 rounded-full bg-red-400"></div>
                                        <span class="text-sm font-semibold text-red-700">PCB (Tax)</span>
                                    </div>
                                    <span class="text-sm font-black text-red-700">RM
                                        {{ number_format($monthly_ee_pcb, 2) }}</span>
                                </div>
                            </div>


                        </div>
                    </div>

                    {{-- COLUMN 4: PAY AMOUNT --}}
                    <div
                        class="p-8 bg-gradient-to-b from-slate-50/80 to-slate-100/80 relative overflow-hidden flex flex-col h-full">
                        <div
                            class="absolute top-0 right-0 p-6 opacity-[0.03] pointer-events-none transform translate-x-4 -translate-y-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-40 w-40" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M11.807 21a2.049 2.049 0 01-1.442-.596l-7.77-7.77a2.049 2.049 0 010-2.884l7.77-7.77a2.049 2.049 0 012.884 0l7.77 7.77a2.049 2.049 0 010 2.884l-7.77 7.77c-.398.397-.92.596-1.442.596zm0-18C11.54 3 11.285 3.1 11.09 3.296L3.319 11.066a1.05 1.05 0 000 1.485l7.77 7.77c.41.41 1.076.41 1.485 0l7.77-7.77a1.05 1.05 0 000-1.485l-7.77-7.77A1.05 1.05 0 0011.807 3z" />
                            </svg>
                        </div>

                        <div class="flex items-center gap-3 border-b border-slate-200 pb-4 relative z-10 w-full">
                            <div class="bg-slate-800 p-2 rounded-lg text-white shadow-md border border-slate-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <h2 class="text-xs font-bold text-slate-500 uppercase tracking-widest w-full">Final Summary
                            </h2>
                        </div>

                        <div class="mt-6 flex flex-col flex-grow justify-between relative z-10">
                            <div class="space-y-4">
                                <div
                                    class="flex justify-between items-center bg-white p-4 rounded-xl border border-slate-200 shadow-sm">
                                    <span class="text-xs font-black text-slate-500 uppercase tracking-wider">Gross
                                        Pay</span>
                                    <span class="text-sm font-extrabold text-slate-800">RM
                                        {{ number_format($basic_salary + $allowance, 2) }}</span>
                                </div>

                                <div class="flex justify-between items-center text-xs px-3 py-2 bg-red-50/50 rounded-lg">
                                    <span class="text-slate-600 font-bold uppercase tracking-wider text-[10px]">Total
                                        Deductions</span>
                                    <span class="font-extrabold text-red-500">- RM
                                        {{ number_format($monthly_ee_epf + $monthly_ee_socso + $monthly_ee_eis + $monthly_ee_pcb, 2) }}</span>
                                </div>
                            </div>

                            <div class="pt-8 border-t-2 border-slate-200 mt-6 pb-2">
                                <span
                                    class="text-[11px] uppercase font-black tracking-widest text-white bg-slate-800 px-3 py-1.5 rounded-lg inline-block mb-4 shadow-sm">NET
                                    PAY</span>
                                <div
                                    class="bg-white p-5 rounded-2xl shadow-lg border border-slate-100 flex flex-col items-center justify-center transform hover:scale-105 transition-transform duration-300">
                                    <p
                                        class="text-[32px] md:text-4xl font-black tracking-tight text-transparent bg-clip-text bg-gradient-to-br from-cyan-600 to-blue-700 flex items-baseline gap-1.5">
                                        <span class="text-base font-bold text-cyan-600 mr-1 pb-1">RM</span>
                                        {{ number_format(ceil($net_pay), 0) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- STATUTORY SUMMARY TABLE (FULL WIDTH) --}}
                <div class="bg-slate-900 border-t border-slate-800 relative overflow-hidden mt-0">
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-slate-950/50 pointer-events-none">
                    </div>
                    <div
                        class="absolute top-0 right-0 h-full w-1/2 bg-gradient-to-l from-cyan-900/20 to-transparent pointer-events-none">
                    </div>

                    <div class="relative z-10 p-8 md:p-10">
                        <div
                            class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4 border-b border-slate-700/50 pb-6">
                            <div class="flex items-center gap-4">
                                <div
                                    class="bg-cyan-500/20 p-3 rounded-xl text-cyan-400 border border-cyan-500/30 shadow-lg shadow-cyan-900/20">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-base font-bold text-white uppercase tracking-wider">Statutory
                                        Contributions Analysis</h2>
                                    <p class="text-xs text-slate-400 font-medium mt-1">Detailed breakdown of Employer &
                                        Employee monthly and YTD contributions</p>
                                </div>
                            </div>
                        </div>

                        <div
                            class="overflow-x-auto rounded-xl border border-slate-700 bg-slate-800/40 shadow-2xl backdrop-blur-sm">
                            <table class="w-full text-left text-sm whitespace-nowrap">
                                <thead>
                                    <tr
                                        class="text-[11px] text-slate-400 uppercase tracking-widest border-b border-slate-700 bg-slate-800/80">
                                        <th class="px-6 py-5 font-bold text-slate-300">Statutory Type</th>
                                        <th class="px-6 py-5 font-bold text-right">Employee (RM)</th>
                                        <th class="px-6 py-5 font-bold text-right border-r border-slate-700/50">Employer
                                            (RM)</th>
                                        <th class="px-6 py-5 font-black text-right text-cyan-300 bg-cyan-900/10">Montly
                                            Total</th>
                                        <th
                                            class="px-6 py-5 font-bold text-right text-slate-400 border-l border-slate-700/50">
                                            YTD Employee</th>
                                        <th class="px-6 py-5 font-bold text-right text-slate-400">YTD Employer</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-700/50">
                                    <tr class="hover:bg-slate-700/30 transition-colors group cursor-default">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="w-8 h-8 rounded-lg bg-slate-700 flex items-center justify-center text-xs font-black text-slate-300 border border-slate-600 group-hover:border-cyan-500/50 group-hover:text-cyan-400 transition-colors">
                                                    EPF</div>
                                                <span class="font-bold text-slate-200">Empl. Provident Fund</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-right font-medium text-slate-300">
                                            {{ number_format($monthly_ee_epf, 2) }}</td>
                                        <td
                                            class="px-6 py-4 text-right font-medium text-slate-300 border-r border-slate-700/50">
                                            {{ number_format($monthly_er_epf, 2) }}</td>
                                        <td class="px-6 py-4 text-right font-black text-cyan-400 bg-cyan-900/10">
                                            {{ number_format($monthly_ee_epf + $monthly_er_epf, 2) }}</td>
                                        <td
                                            class="px-6 py-4 text-right text-slate-400 text-xs font-semibold border-l border-slate-700/50">
                                            {{ number_format($ytd_ee_epf, 2) }}</td>
                                        <td class="px-6 py-4 text-right text-slate-400 text-xs font-semibold">
                                            {{ number_format($ytd_er_epf, 2) }}</td>
                                    </tr>
                                    <tr class="hover:bg-slate-700/30 transition-colors group cursor-default">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="w-8 h-8 rounded-lg bg-slate-700 flex items-center justify-center text-xs font-black text-slate-300 border border-slate-600 group-hover:border-cyan-500/50 group-hover:text-cyan-400 transition-colors">
                                                    SOC</div>
                                                <span class="font-bold text-slate-200">SOCSO</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-right font-medium text-slate-300">
                                            {{ number_format($monthly_ee_socso, 2) }}</td>
                                        <td
                                            class="px-6 py-4 text-right font-medium text-slate-300 border-r border-slate-700/50">
                                            {{ number_format($monthly_er_socso, 2) }}</td>
                                        <td class="px-6 py-4 text-right font-black text-cyan-400 bg-cyan-900/10">
                                            {{ number_format($monthly_ee_socso + $monthly_er_socso, 2) }}</td>
                                        <td
                                            class="px-6 py-4 text-right text-slate-400 text-xs font-semibold border-l border-slate-700/50">
                                            {{ number_format($ytd_ee_socso, 2) }}</td>
                                        <td class="px-6 py-4 text-right text-slate-400 text-xs font-semibold">
                                            {{ number_format($ytd_er_socso, 2) }}</td>
                                    </tr>
                                    <tr class="hover:bg-slate-700/30 transition-colors group cursor-default">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="w-8 h-8 rounded-lg bg-slate-700 flex items-center justify-center text-xs font-black text-slate-300 border border-slate-600 group-hover:border-cyan-500/50 group-hover:text-cyan-400 transition-colors">
                                                    EIS</div>
                                                <span class="font-bold text-slate-200">Employment Ins.</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-right font-medium text-slate-300">
                                            {{ number_format($monthly_ee_eis, 2) }}</td>
                                        <td
                                            class="px-6 py-4 text-right font-medium text-slate-300 border-r border-slate-700/50">
                                            {{ number_format($monthly_er_eis, 2) }}</td>
                                        <td class="px-6 py-4 text-right font-black text-cyan-400 bg-cyan-900/10">
                                            {{ number_format($monthly_ee_eis + $monthly_er_eis, 2) }}</td>
                                        <td
                                            class="px-6 py-4 text-right text-slate-400 text-xs font-semibold border-l border-slate-700/50">
                                            {{ number_format($ytd_ee_eis, 2) }}</td>
                                        <td class="px-6 py-4 text-right text-slate-400 text-xs font-semibold">
                                            {{ number_format($ytd_er_eis, 2) }}</td>
                                    </tr>
                                    <tr
                                        class="hover:bg-slate-700/40 transition-colors group cursor-default bg-slate-800/40">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="w-8 h-8 rounded-lg bg-red-900/50 flex items-center justify-center text-xs font-black text-red-400 border border-red-800/50 group-hover:border-red-500/50 transition-colors">
                                                    PCB</div>
                                                <span class="font-bold text-red-400">Monthly Tax (PCB)</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-right font-bold text-red-300">
                                            {{ number_format($monthly_ee_pcb, 2) }}</td>
                                        <td
                                            class="px-6 py-4 text-right text-slate-600 border-r border-slate-700/50 font-bold">
                                            -</td>
                                        <td class="px-6 py-4 text-right font-black text-cyan-400 bg-cyan-900/10">
                                            {{ number_format($monthly_ee_pcb, 2) }}</td>
                                        <td
                                            class="px-6 py-4 text-right text-slate-400 text-xs font-semibold border-l border-slate-700/50">
                                            {{ number_format($ytd_ee_pcb, 2) }}</td>
                                        <td class="px-6 py-4 text-right text-slate-600 text-xs font-bold">-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <style>
        /* Custom hover animation utility */
        .animate-spin-slow {
            animation: spin 3s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>
@endsection
