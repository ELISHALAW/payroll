@extends('output.layout')

@section('content')
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
            <div>
                <a href="{{ route('payroll.index') }}"
                    class="inline-flex items-center gap-2 text-slate-400 hover:text-cyan-600 transition-all text-xs font-bold tracking-widest uppercase mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back to Dashboard
                </a>
                <h1 class="text-2xl font-black text-slate-800 tracking-tight">Onboarding <span
                        class="text-cyan-600">Accumulation</span></h1>
                <p class="text-sm text-slate-500 font-medium">Aggregated data from Jan to Mar {{ date('Y') }} for MTD
                    precision.</p>
            </div>

            <div class="flex items-center gap-3">
                <button
                    class="group flex items-center gap-2 px-4 py-2.5 bg-white border border-slate-200 text-slate-600 text-xs font-bold rounded-xl hover:border-cyan-200 hover:text-cyan-600 transition-all shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400 group-hover:text-cyan-500"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    TEMPLATE
                </button>
                <button
                    class="flex items-center gap-2 px-5 py-2.5 bg-slate-900 text-white text-xs font-bold rounded-xl hover:bg-cyan-600 shadow-lg shadow-slate-200 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    BATCH IMPORT
                </button>
            </div>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl shadow-xl shadow-slate-100/50 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-separate border-spacing-0">
                    <thead>
                        <tr class="bg-slate-50">
                            <th
                                class="sticky left-0 z-20 bg-slate-50 px-6 py-4 border-b border-r border-slate-200 text-[10px] font-black text-slate-500 uppercase tracking-widest">
                                Employee Detail
                            </th>

                            <th colspan="3"
                                class="px-4 py-2 border-b border-r border-slate-200 text-center text-[10px] font-bold text-emerald-700 bg-emerald-50/50 uppercase tracking-widest">
                                Earnings (YTD)
                            </th>

                            <th colspan="6"
                                class="px-4 py-2 border-b border-slate-200 text-center text-[10px] font-bold text-blue-700 bg-blue-50/50 uppercase tracking-widest">
                                Statutory Contributions (YTD)
                            </th>
                        </tr>
                        <tr class="bg-white">
                            <th class="sticky left-0 z-20 bg-white border-b border-r border-slate-100"></th>

                            <th
                                class="px-4 py-3 border-b border-r border-slate-100 text-[10px] font-bold text-slate-400 uppercase text-center">
                                Accumulated Salary</th>
                            <th
                                class="px-4 py-3 border-b border-r border-slate-100 text-[10px] font-bold text-slate-400 uppercase text-center">
                                Accumulated Allowance</th>
                            <th
                                class="px-4 py-3 border-b border-r border-slate-100 text-[10px] font-bold text-slate-400 uppercase text-center">
                                Commission</th>

                            <th
                                class="px-4 py-3 border-b border-r border-slate-100 text-[10px] font-bold text-slate-400 uppercase text-center bg-blue-50/20">
                                Accumulated EPF EE</th>
                            <th
                                class="px-4 py-3 border-b border-r border-slate-100 text-[10px] font-bold text-slate-400 uppercase text-center bg-blue-50/20">
                                Accumulated EPF ER</th>
                            <th
                                class="px-4 py-3 border-b border-r border-slate-100 text-[10px] font-bold text-slate-400 uppercase text-center">
                                Accumulated SOCSO EE</th>
                            <th
                                class="px-4 py-3 border-b border-r border-slate-100 text-[10px] font-bold text-slate-400 uppercase text-center">
                                Accumulated SOCSO ER</th>
                            <th
                                class="px-4 py-3 border-b border-r border-slate-100 text-[10px] font-bold text-slate-400 uppercase text-center bg-slate-50/30 text-slate-500">
                                AccumulatedEIS EE</th>
                            <th
                                class="px-4 py-3 border-b border-slate-100 text-[10px] font-bold text-slate-400 uppercase text-center bg-slate-50/30 text-slate-500">
                                Accumulated EIS ER</th>
                            <th
                                class="px-4 py-3 border-b border-slate-100 text-[10px] font-bold text-slate-400 uppercase text-center bg-slate-50/30 text-slate-500">
                                Accumulated PCB</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <tr class="hover:bg-cyan-50/40 transition-colors group">
                            <td
                                class="sticky left-0 z-10 bg-white group-hover:bg-slate-50/80 transition-all px-6 py-4 border-r border-slate-100 shadow-[4px_0_10px_-5px_rgba(0,0,0,0.05)]">
                                <div class="flex items-center gap-4">
                                    <div class="relative shrink-0">
                                        <div
                                            class="h-10 w-10 rounded-xl bg-slate-900 flex items-center justify-center text-white font-bold text-xs shadow-md shadow-slate-200 border border-slate-800 ring-2 ring-white">
                                            {{ substr($user->name, 0, 2) }}
                                        </div>
                                        <span
                                            class="absolute -bottom-1 -right-1 h-3.5 w-3.5 bg-emerald-500 border-2 border-white rounded-full shadow-sm"></span>
                                    </div>

                                    <div class="flex flex-col min-w-0">
                                        <div
                                            class="text-sm font-black text-slate-800 hover:text-cyan-600 transition-colors truncate tracking-tight mb-0.5">
                                            {{ $user->name }}
                                        </div>

                                        <div class="flex items-center gap-2">
                                            <span
                                                class="inline-flex items-center px-2 py-0.5 rounded-md bg-cyan-50 text-cyan-700 text-[10px] font-bold uppercase tracking-wider border border-cyan-100/50">
                                                #{{ $user->getDetail('employee_no') }}
                                            </span>

                                            <span class="text-[10px] text-slate-400 font-medium">
                                                {{ $user->getDetail('department') ?? 'Staff' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-4 py-4 text-center cursor-pointer hover:bg-white hover:shadow-inner">
                                <span class="text-[10px] text-slate-400 font-bold mr-0.5">RM</span>
                                <span
                                    class="text-sm font-mono font-bold text-slate-700">{{ number_format($totalAccumulateSalary, 2) }}</span>
                            </td>
                            <td
                                class="px-4 py-4 text-center cursor-pointer hover:bg-white hover:shadow-inner border-r border-slate-50">
                                <span class="text-[10px] text-slate-400 font-bold mr-0.5">RM</span>
                                <span
                                    class="text-sm font-mono font-bold text-slate-700">{{ number_format($allowanceTotalSum, 2) }}</span>
                            </td>
                            <td
                                class="px-4 py-4 text-center cursor-pointer hover:bg-white hover:shadow-inner border-r border-slate-100">
                                <span class="text-[10px] text-slate-400 font-bold mr-0.5">RM</span>
                                <span class="text-sm font-mono font-bold text-slate-700">0.00</span>
                            </td>

                            <td class="px-4 py-4 text-center bg-blue-50/10 border-r border-slate-50">
                                <span
                                    class="text-sm font-mono font-bold text-blue-600">{{ number_format($epfTotal, 2) }}</span>
                            </td>
                            <td class="px-4 py-4 text-center bg-blue-50/10 border-r border-slate-100">
                                <span
                                    class="text-sm font-mono font-medium text-slate-400">{{ number_format($epfTotalErSum, 2) }}</span>
                            </td>
                            <td class="px-4 py-4 text-center border-r border-slate-50">
                                <span
                                    class="text-sm font-mono font-bold text-blue-600">{{ number_format($socsoTotalEeSum, 2) }}</span>
                            </td>
                            <td class="px-4 py-4 text-center border-r border-slate-100">
                                <span
                                    class="text-sm font-mono font-medium text-slate-400">{{ number_format($socsoTotalErSum, 2) }}</span>
                            </td>
                            <td class="px-4 py-4 text-center bg-slate-50/30 border-r border-slate-50">
                                <span
                                    class="text-sm font-mono font-bold text-slate-600">{{ number_format($eisTotalEeSum, 2) }}</span>
                            </td>
                            <td class="px-4 py-4 text-center bg-slate-50/30">
                                <span
                                    class="text-sm font-mono font-medium text-slate-400">{{ number_format($eisTotalErSum, 2) }}</span>
                            </td>
                            <td class="px-4 py-4 text-center bg-slate-50/30">
                                <span
                                    class="text-sm font-mono font-medium text-slate-400">{{ number_format($pcbTotalEmployee, 2) }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">1 Records Found</span>
                <div class="flex gap-2">
                    <button
                        class="px-4 py-1.5 text-[10px] font-black uppercase tracking-widest bg-white border border-slate-200 rounded-lg text-slate-400 cursor-not-allowed">Prev</button>
                    <button
                        class="px-4 py-1.5 text-[10px] font-black uppercase tracking-widest bg-white border border-slate-200 rounded-lg text-slate-400 cursor-not-allowed">Next</button>
                </div>
            </div>
        </div>
    </div>
@endsection
