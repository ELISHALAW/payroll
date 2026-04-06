@extends('output.layout')

@section('content')
    <div class="bg-gray-100 min-h-screen py-10">
        <div class="max-w-[1100px] mx-auto bg-white shadow-md border border-gray-200 rounded-sm">

            {{-- TOP HEADER BAR --}}
            <div class="flex justify-between items-start p-6 border-b border-gray-100">
                <div>
                    <h1 class="text-xl font-bold text-cyan-600 mb-1">{{ $user->name }}</h1>
                    <div class="flex items-center gap-2">
                        <span class="text-[11px] font-bold text-gray-400 uppercase">Salary Type</span>
                        <select class="text-[11px] border-gray-300 rounded p-1 bg-gray-50">
                            <option>Monthly</option>
                        </select>
                    </div>
                </div>
                <div class="text-right">
                    <button type="button" class="text-cyan-500 text-xs hover:underline">Reset this person's payroll</button>
                </div>
            </div>

            <form action="{{ route('payroll.calculate') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-4 divide-x divide-gray-200">

                    {{-- COLUMN 1: INPUT FIELD --}}
                    <div class="p-5 space-y-6">
                        <h2 class="text-[11px] font-bold text-gray-400 uppercase tracking-tighter border-b pb-2">Basic
                            earnings</h2>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Full amount (RM)</label>
                            <input type="number" name="basic_salary" value="{{ $basic_salary ?? '0.00' }}" step="0.01"
                                class="w-full border-gray-300 rounded text-sm p-2 focus:ring-1 focus:ring-cyan-500"
                                placeholder="e.g. 2600.00">

                            <div class="mt-4 flex items-center gap-2">
                                <input type="checkbox" checked class="rounded text-cyan-600">
                                <label class="text-[11px] text-gray-600 font-bold">Include in payroll</label>
                            </div>
                        </div>

                        <div class="pt-2">
                            <p class="text-[10px] font-bold text-gray-400 uppercase">Amount:</p>
                            <p class="text-2xl font-light text-gray-600">RM {{ number_format($basic_salary ?? 0, 2) }}</p>
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
                                    <input type="number" name="allowance" value="{{ $allowance ?? '0.00' }}"
                                        class="w-16 border-b border-dotted border-gray-400 focus:border-cyan-500 outline-none text-right text-xs text-cyan-600 bg-transparent">
                                </div>
                            </div>
                            <p class="text-[10px] text-cyan-600 cursor-pointer">+ Add basic earning</p>
                        </div>
                    </div>

                    {{-- COLUMN 3: DEDUCTIONS (DYNAMIC CALCULATIONS) --}}
                    <div class="p-5">
                        <h2 class="text-[11px] font-bold text-gray-400 uppercase tracking-tighter border-b pb-2">Deductions
                        </h2>
                        <div class="mt-4 space-y-5">
                            <div class="flex justify-between items-start">
                                <span class="text-xs text-gray-600">EPF <br><small class="text-gray-400">~11%</small></span>
                                <span class="text-xs font-bold text-gray-800">RM {{ $epf ?? '0.00' }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-xs text-gray-600">SOCSO</span>
                                <span class="text-xs font-bold text-gray-800">RM {{ $socso ?? '0.00' }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-xs text-gray-600">EIS</span>
                                <span class="text-xs font-bold text-gray-800">RM {{ $eis ?? '0.00' }}</span>
                            </div>

                            <div class="pt-4">
                                <button type="submit"
                                    class="w-full py-2 bg-white border border-cyan-500 text-cyan-500 hover:bg-cyan-50 rounded text-[10px] font-black tracking-widest transition-all">
                                    CALCULATE
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- COLUMN 4: PAY AMOUNT (TOTALS) --}}
                    <div class="p-5 bg-gray-50/40">
                        <h2 class="text-[11px] font-bold text-gray-400 uppercase tracking-tighter border-b pb-2">Pay amount
                        </h2>
                        <div class="mt-4 space-y-4">
                            <div class="flex justify-between text-xs">
                                <span class="text-gray-400 font-bold uppercase">Gross Pay</span>
                                <span class="font-bold text-gray-700">RM
                                    {{ number_format(($basic_salary ?? 0) + ($allowance ?? 0), 2) }}</span>
                            </div>

                            <div class="py-4 border-b border-gray-100">
                                <span class="text-[10px] uppercase font-bold text-gray-400">Net pay</span>
                                <p class="text-3xl font-light text-cyan-400">RM {{ $net_pay ?? '0.00' }}</p>
                            </div>

                            {{-- EMPLOYER CONTRIBUTION SECTION --}}
                            <div class="pt-2">
                                <h3 class="text-[10px] font-bold text-gray-400 uppercase mb-3">Company contribution</h3>
                                <div class="space-y-3 text-[11px]">
                                    <div class="flex justify-between">
                                        <span class="text-gray-500 font-semibold uppercase">EPF</span>
                                        <span class="font-bold text-gray-700">RM {{ $epf_employer ?? '0.00' }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-500 font-semibold uppercase">SOCSO</span>
                                        <span class="font-bold text-gray-700">RM {{ $socso_employer ?? '0.00' }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-500 font-semibold uppercase">EIS</span>
                                        <span class="font-bold text-gray-700">RM {{ $eis_employer ?? '0.00' }}</span>
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
