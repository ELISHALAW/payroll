@php
    use Carbon\Carbon;
@endphp

@extends('output.layout')

@section('content')
    <div class="bg-gray-100 min-h-screen py-10">
        <div class="max-w-[1100px] mx-auto bg-white shadow-md border border-gray-200 rounded-sm">

            {{-- FORM START (Wrapped around entire grid) --}}
            <form action="{{ route('payroll.calculate') }}" method="POST" id="payrollForm">
                @csrf
                <input type="hidden" name="action" id="formAction" value="calculate">


                {{-- NEW: Hidden inputs to send data to the PDF generator --}}
                <input type="hidden" name="user_name" value="{{ $user->name }}">
                <input type="hidden" name="epf_amount" value="{{ $epf }}">
                <input type="hidden" name="socso_amount" value="{{ $socso }}">
                <input type="hidden" name="eis_amount" value="{{ $eis }}">
                <input type="hidden" name="net_pay_amount" value="{{ $net_pay }}">

                {{-- TOP HEADER BAR --}}
                <div class="flex justify-between items-start p-6 border-b border-gray-100">
                    <div>
                        <h1 class="text-xl font-bold text-cyan-600 mb-1">{{ $user->name }}</h1>
                        <div class="flex items-center gap-4">
                            <div>
                                <span class="text-[11px] font-bold text-gray-400 uppercase">Salary Type</span>
                                <select class="text-[11px] border-gray-300 rounded p-1 bg-gray-50">
                                    <option>Monthly</option>
                                </select>
                            </div>
                            {{-- MONTH INPUT FIELD --}}
                            <div>
                                <span class="text-[11px] font-bold text-gray-400 uppercase">Month</span>
                                <select name="selected_month"
                                    onchange="document.getElementById('formAction').value='fetch'; this.form.submit()"
                                    class="text-[11px] border-gray-300 rounded p-1 bg-gray-50 text-cyan-600 font-bold focus:ring-0">
                                    @foreach (range(1, 12) as $m)
                                        <option value="{{ $m }}" {{ $selected_month == $m ? 'selected' : '' }}>
                                            {{ Carbon::create()->month($m)->format('F') }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="text-right flex flex-col items-end gap-2">
                        <button type="button" class="text-cyan-500 text-xs hover:underline">
                            Reset this person's payroll
                        </button>

                        <div class="flex gap-2">
                            {{-- GENERATE PAYSLIP BUTTON --}}
                            <button type="submit" formaction="{{ route('payslip.download') }}"
                                class="bg-white border border-gray-300 text-gray-700 text-[10px] px-4 py-1.5 rounded font-black tracking-widest hover:bg-gray-50 transition-all flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-gray-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                </svg>
                                GENERATE PAYSLIP
                            </button>

                            {{-- SAVE BUTTON --}}
                            <button type="submit" formaction="{{ route('payroll.save') }}"
                                class="bg-cyan-600 text-white text-[10px] px-4 py-1.5 rounded font-black tracking-widest hover:bg-cyan-700 transition-all">
                                SAVE TO MONTH
                            </button>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 divide-x divide-gray-200">

                    {{-- COLUMN 1: BASIC EARNINGS --}}
                    <div class="p-5 space-y-6">
                        <h2 class="text-[11px] font-bold text-gray-400 uppercase tracking-tighter border-b pb-2">Basic
                            earnings</h2>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Full amount (RM)</label>
                            <input type="number" name="basic_salary" value="{{ $basic_salary }}" step="0.01"
                                class="w-full border-gray-300 rounded text-sm p-2 focus:ring-1 focus:ring-cyan-500"
                                placeholder="e.g. 2600.00">

                            <div class="mt-4 flex items-center gap-2">
                                <input type="checkbox" checked class="rounded text-cyan-600">
                                <label class="text-[11px] text-gray-600 font-bold">Include in payroll</label>
                            </div>
                        </div>

                        <div class="pt-2">
                            <p class="text-[10px] font-bold text-gray-400 uppercase">Amount:</p>
                            <p class="text-2xl font-light text-gray-600">RM {{ number_format($basic_salary, 2) }}</p>
                        </div>
                    </div>

                    {{-- COLUMN 2: ADDITIONAL EARNINGS --}}
                    <div class="p-5 bg-gray-50/20">
                        <h2 class="text-[11px] font-bold text-gray-400 uppercase tracking-tighter border-b pb-2">Additional
                            earnings</h2>
                        <div class="mt-4 space-y-3">
                            <div class="flex justify-between items-center group">
                                <span class="text-xs text-gray-500">General Allowance</span>
                                <div class="flex items-center gap-1">
                                    <span class="text-[10px] text-gray-400">RM</span>
                                    <input type="number" name="allowance" min="0" value="{{ $allowance }}"
                                        class="w-16 border-b border-dotted border-gray-400 focus:border-cyan-500 outline-none text-right text-xs text-cyan-600 bg-transparent">
                                </div>
                            </div>
                            <p class="text-[10px] text-cyan-600 cursor-pointer">+ Add basic earning</p>
                        </div>
                    </div>

                    {{-- COLUMN 3: DEDUCTIONS --}}
                    <div class="p-5">
                        <h2 class="text-[11px] font-bold text-gray-400 uppercase tracking-tighter border-b pb-2">Deductions
                        </h2>
                        <div class="mt-4 space-y-5">
                            <div class="flex justify-between items-start">
                                <span class="text-xs text-gray-600">EPF <br><small class="text-gray-400">~11%</small></span>
                                <span class="text-xs font-bold text-gray-800">RM {{ $epf }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-xs text-gray-600">SOCSO</span>
                                <span class="text-xs font-bold text-gray-800">RM {{ $socso }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-xs text-gray-600">EIS</span>
                                <span class="text-xs font-bold text-gray-800">RM {{ $eis }}</span>
                            </div>

                            <div class="pt-4">
                                <button type="submit"
                                    class="w-full py-2 bg-white border border-cyan-500 text-cyan-500 hover:bg-cyan-50 rounded text-[10px] font-black tracking-widest transition-all">
                                    CALCULATE
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- COLUMN 4: PAY AMOUNT --}}
                    <div class="p-5 bg-gray-50/40">
                        <h2 class="text-[11px] font-bold text-gray-400 uppercase tracking-tighter border-b pb-2">Pay amount
                        </h2>
                        <div class="mt-4 space-y-4">
                            <div class="flex justify-between text-xs">
                                <span class="text-gray-400 font-bold uppercase">Gross Pay</span>
                                <span class="font-bold text-gray-700">RM
                                    {{ number_format($basic_salary + $allowance, 2) }}</span>
                            </div>

                            <div class="py-4 border-b border-gray-100">
                                <span class="text-[10px] uppercase font-bold text-gray-400">Net pay</span>
                                <p class="text-3xl font-light text-cyan-400">RM {{ $net_pay }}</p>
                            </div>

                            <div class="pt-2">
                                <h3 class="text-[10px] font-bold text-gray-400 uppercase mb-3">Company contribution</h3>
                                <div class="space-y-3 text-[11px]">
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-500 font-semibold uppercase">EPF</span>
                                        <div class="flex items-center gap-1">
                                            <span class="text-[10px] text-gray-400">RM</span>
                                            <input type="number" name="epf_employer" min="0" step="0.01"
                                                value="{{ $epf_employer_cumulative }}"
                                                class="w-20 border-b border-dotted border-gray-400 focus:border-cyan-500 outline-none text-right text-xs text-gray-700 bg-transparent">
                                        </div>
                                    </div>

                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-500 font-semibold uppercase">SOCSO</span>
                                        <div class="flex items-center gap-1">
                                            <span class="text-[10px] text-gray-400">RM</span>
                                            <input type="number" name="socso_employer" min="0" step="0.01"
                                                value="{{ $socso_employer_cumulative }}"
                                                class="w-20 border-b border-dotted border-gray-400 focus:border-cyan-500 outline-none text-right text-xs text-gray-700 bg-transparent">
                                        </div>
                                    </div>

                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-500 font-semibold uppercase">EIS</span>
                                        <div class="flex items-center gap-1">
                                            <span class="text-[10px] text-gray-400">RM</span>
                                            <input type="number" name="eis_employer" min="0" step="0.01"
                                                value="{{ $eis_employer_cumulative }}"
                                                class="w-20 border-b border-dotted border-gray-400 focus:border-cyan-500 outline-none text-right text-xs text-gray-700 bg-transparent">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
