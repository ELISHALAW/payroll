@php
    use Carbon\Carbon;
@endphp

@extends('output.layout')

@section('content')
    <div class="bg-gray-100 min-h-screen py-10">
        <div class="max-w-[1100px] mx-auto bg-white shadow-md border border-gray-200 rounded-sm">

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

                <input type="hidden" name="ytd_ee_epf" value="{{ $ytd_ee_epf }}">
                <input type="hidden" name="ytd_ee_socso" value="{{ $ytd_ee_socso }}">
                <input type="hidden" name="ytd_ee_eis" value="{{ $ytd_ee_eis }}">

                <input type="hidden" name="ytd_er_epf" value="{{ $ytd_er_epf }}">
                <input type="hidden" name="ytd_er_socso" value="{{ $ytd_er_socso }}">
                <input type="hidden" name="ytd_er_eis" value="{{ $ytd_er_eis }}">

                <input type="hidden" name="total_epf" value="{{ $total_epf }}">
                <input type="hidden" name="total_socso" value="{{ $total_socso }}">
                <input type="hidden" name="total_eis" value="{{ $total_eis }}">

                {{-- TOP HEADER BAR --}}
                <div class="flex justify-between items-start p-6 border-b border-gray-100">
                    <div>
                        <h1 class="text-xl font-bold text-cyan-600 mb-1">{{ $user->name }}</h1>
                        <div class="flex items-center gap-4">
                            <div>
                                <span class="text-[11px] font-bold text-gray-400 uppercase tracking-tight">Salary
                                    Type</span>
                                <select class="text-[11px] border-gray-300 rounded p-1 bg-gray-50 block mt-0.5">
                                    <option>Monthly</option>
                                </select>
                            </div>
                            <div>
                                <span class="text-[11px] font-bold text-gray-400 uppercase tracking-tight">Month</span>
                                <select name="selected_month"
                                    onchange="document.getElementById('formAction').value='fetch'; this.form.submit()"
                                    class="text-[11px] border-gray-300 rounded p-1 bg-gray-50 text-cyan-600 font-bold focus:ring-0 block mt-0.5">
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
                            <button type="button"
                                onclick="const btn = this; const form = btn.form; form.action='{{ route('payslip.download') }}'; form.submit();"
                                class="bg-white border border-gray-300 text-gray-700 text-[10px] px-4 py-1.5 rounded font-black tracking-widest hover:bg-gray-50 transition-all flex items-center gap-2">
                                GENERATE PAYSLIP
                            </button>
                            <button type="submit" formaction="{{ route('payroll.save') }}"
                                class="bg-cyan-600 text-white text-[10px] px-4 py-1.5 rounded font-black tracking-widest hover:bg-cyan-700 transition-all">
                                SAVE TO MONTH
                            </button>
                        </div>
                    </div>
                </div>

                {{-- MAIN 4-COLUMN GRID --}}
                <div class="grid grid-cols-1 md:grid-cols-4 divide-x divide-gray-200">
                    {{-- COLUMN 1: BASIC EARNINGS --}}
                    <div class="p-5 space-y-6">
                        <h2 class="text-[11px] font-bold text-gray-400 uppercase tracking-tighter border-b pb-2">Basic
                            earnings</h2>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Full amount (RM)</label>
                            <input type="number" name="basic_salary" value="{{ $basic_salary }}" step="0.01"
                                class="w-full border-gray-300 rounded text-sm p-2 focus:ring-1 focus:ring-cyan-500">
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
                            <div class="flex justify-between items-center">
                                <span class="text-xs text-gray-500">General Allowance</span>
                                <div class="flex items-center gap-1">
                                    <span class="text-[10px] text-gray-400">RM</span>
                                    <input type="number" name="allowance" value="{{ $allowance }}"
                                        class="w-16 border-b border-dotted border-gray-400 text-right text-xs text-cyan-600 bg-transparent outline-none">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- COLUMN 3: DEDUCTIONS --}}
                    <div class="p-5">
                        <h2 class="text-[11px] font-bold text-gray-400 uppercase tracking-tighter border-b pb-2">Deductions
                        </h2>
                        <div class="mt-4 space-y-5">
                            <div class="flex justify-between">
                                <span class="text-xs text-gray-600">EPF (11%)</span>
                                <span class="text-xs font-bold text-gray-800">RM
                                    {{ number_format($monthly_ee_epf, 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-xs text-gray-600">SOCSO</span>
                                <span class="text-xs font-bold text-gray-800">RM
                                    {{ number_format($monthly_ee_socso, 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-xs text-gray-600">EIS</span>
                                <span class="text-xs font-bold text-gray-800">RM
                                    {{ number_format($monthly_ee_eis, 2) }}</span>
                            </div>
                           
                            <div class="flex justify-between">
                                <span class="text-xs text-gray-600">PCB</span>
                                <span class="text-xs font-bold text-gray-800">RM
                                    {{ number_format($monthly_ee_pcb, 2) }}</span>
                            </div>
                            <button type="submit"
                                class="w-full py-2 border border-cyan-500 text-cyan-500 text-[10px] font-black tracking-widest hover:bg-cyan-50 transition-all">
                                CALCULATE
                            </button>
                        </div>
                    </div>

                    {{-- COLUMN 4: PAY AMOUNT --}}
                    <div class="p-5 bg-gray-50/40">
                        <h2 class="text-[11px] font-bold text-gray-400 uppercase tracking-tighter border-b pb-2">Pay amount
                        </h2>
                        <div class="mt-4 space-y-4">
                            <div class="flex justify-between text-xs font-bold">
                                <span class="text-gray-400 uppercase">Gross Pay</span>
                                <span class="text-gray-700">RM {{ number_format($basic_salary + $allowance, 2) }}</span>
                            </div>
                            <div class="py-4 border-b border-gray-100">
                                <span class="text-[10px] uppercase font-bold text-gray-400">Net pay</span>
                                <p class="text-3xl font-light text-cyan-400">RM {{ number_format(round($net_pay, 0), 2) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- NEW STATUTORY SUMMARY TABLE (FULL WIDTH) --}}
                <div class="border-t border-gray-200 bg-gray-50/50 p-6">
                    <h2
                        class="text-[11px] font-black text-gray-400 uppercase tracking-widest mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-cyan-500" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm2 10a1 1 0 10-2 0v3a1 1 0 102 0v-3zm2-3a1 1 0 011 1v5a1 1 0 11-2 0v-5a1 1 0 011-1zm4-1a1 1 0 10-2 0v7a1 1 0 102 0V8z"
                                clip-rule="evenodd" />
                        </svg>
                        Monthly Statutory Breakdown
                    </h2>

                    <div class="bg-white border border-gray-200 rounded-sm overflow-hidden shadow-sm">
                        <table class="w-full text-left text-[11px]">
                            <thead class="bg-gray-50 border-b border-gray-200 text-gray-400 uppercase font-bold">
                                <tr>
                                    <th class="px-5 py-3">Contribution</th>
                                    <th class="px-5 py-3 text-center">Employee (EE)</th>
                                    <th class="px-5 py-3 text-center">Employer (ER)</th>
                                    <th class="px-5 py-3 text-right text-cyan-600">Total Payable</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-gray-600">
                                <tr class="hover:bg-cyan-50/10 transition-colors">
                                    <td class="px-5 py-4 font-bold text-gray-700">EPF (KWSP)</td>
                                    <td class="px-5 py-4 text-center">RM {{ number_format($monthly_ee_epf, 2) }}</td>
                                    <td class="px-5 py-4 text-center">RM {{ number_format($monthly_er_epf, 2) }}
                                    </td>
                                    <td class="px-5 py-4 text-right font-bold text-gray-800">RM
                                        {{ number_format($monthly_ee_epf + $monthly_er_epf, 2) }}</td>
                                </tr>
                                <tr class="hover:bg-cyan-50/10 transition-colors">
                                    <td class="px-5 py-4 font-bold text-gray-700">SOCSO (PERKESO)</td>
                                    <td class="px-5 py-4 text-center">RM {{ number_format($monthly_ee_socso, 2) }}</td>
                                    <td class="px-5 py-4 text-center">RM {{ number_format($monthly_er_socso, 2) }}
                                    </td>
                                    <td class="px-5 py-4 text-right font-bold text-gray-800">RM
                                        {{ number_format($monthly_ee_socso + $monthly_er_socso, 2) }}</td>
                                </tr>
                                <tr class="hover:bg-cyan-50/10 transition-colors">
                                    <td class="px-5 py-4 font-bold text-gray-700">EIS (SIP)</td>
                                    <td class="px-5 py-4 text-center">RM {{ number_format($monthly_ee_eis, 2) }}</td>
                                    <td class="px-5 py-4 text-center">RM {{ number_format($monthly_er_eis, 2) }}
                                    </td>
                                    <td class="px-5 py-4 text-right font-bold text-gray-800">RM
                                        {{ number_format($monthly_ee_eis + $monthly_er_eis, 2) }}</td>
                                </tr>
                            </tbody>
                            <tfoot class="bg-gray-900 text-white">
                                <tr>
                                    <td class="px-5 py-4 font-black uppercase italic tracking-widest">Total Monthly
                                        Liability</td>
                                    <td colspan="3" class="px-5 py-4 text-right">
                                        <span class="text-[10px] text-gray-400 mr-2 font-bold">TOTAL PORTAL PAYMENT:</span>
                                        <span class="text-xl font-light text-cyan-400">
                                            RM
                                            {{ number_format($monthly_ee_epf + $monthly_er_epf + ($monthly_ee_socso + $monthly_er_socso) + ($monthly_ee_eis + $monthly_er_eis), 2) }}
                                        </span>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
