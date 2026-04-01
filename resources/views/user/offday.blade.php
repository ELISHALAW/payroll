@php 
use Carbon\Carbon;
@endphp
@extends('output.layout')


@section('content')
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto p-6 space-y-6 bg-gray-50/50 min-h-screen">

            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-8">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                    <div class="flex flex-1 items-center gap-4">
                        <div class="flex-1 max-w-[240px]">
                            <label class="block text-sm font-bold text-slate-800 mb-2">From</label>
                            <div class="relative">
                                <input type="text" value="{{ now()->startOfMonth()->format('F j, Y') }}" readonly
                                    class="w-full bg-white border border-gray-200 rounded-lg px-4 py-2.5 text-slate-700 outline-none cursor-default">
                                <span class="absolute right-3 top-3 text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="flex-1 max-w-[240px]">
                            <label class="block text-sm font-bold text-slate-800 mb-2">To</label>
                            <div class="relative">
                                <input type="text" value="{{ now()->endOfMonth()->format('F j, Y') }}" readonly
                                    class="w-full bg-white border border-gray-200 rounded-lg px-4 py-2.5 text-slate-700 outline-none cursor-default">
                                <span class="absolute right-3 top-3 text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>

                    <button id="openAddOffdayModalBtn"
                        class="flex items-center space-x-2 border border-[#00bcd4] text-[#00bcd4] px-6 py-2 rounded-lg text-sm font-bold hover:bg-cyan-50 transition-all active:scale-95 whitespace-nowrap">
                        <span>Add Off Day</span>
                    </button>
                </div>

                <hr class="mt-8 border-gray-100">

                <div class="mt-6">
                    {{-- Check if offdays exist (Replace $offdays with your actual variable) --}}
                    @if (isset($offdays) && $offdays->count() > 0)
                        <div class="w-full bg-white rounded-xl border border-gray-200 overflow-hidden">
                            <div class="bg-slate-50 px-6 py-3 border-b border-gray-200 flex items-center">
                                <span class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Date</span>
                            </div>

                            @foreach ($offdays as $offday)
                                <div
                                    class="px-6 py-4 flex items-center justify-between hover:bg-gray-50/50 border-b border-gray-100 last:border-0 transition-colors">
                                    <div class="flex items-baseline gap-3">
                                        <span class="text-sm font-bold text-slate-700">
                                            {{ \Carbon\Carbon::parse($offday->value)->format('d F Y') }}
                                        </span>
                                        <span class="text-xs italic text-slate-400 font-medium">
                                            ({{ \Carbon\Carbon::parse($offday->value)->format('l') }})
                                        </span>
                                    </div>

                                    <button type="button"
                                        class="flex items-center gap-2 text-red-400 hover:text-red-500 transition-colors font-bold text-xs">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Delete
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="py-20 flex flex-col items-center justify-center text-center">
                            <div
                                class="w-20 h-20 bg-cyan-50 text-cyan-500 rounded-full flex items-center justify-center mb-6">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h4 class="text-lg font-bold text-slate-800">No Off Days Assigned</h4>
                            <p class="text-slate-400 text-sm mt-1">Adjust your filters or add a new record.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>



    <div id="offdayModalContainer" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4">
        <div class="fixed inset-0 bg-gray-900/40 backdrop-blur-md"></div>
        <div class="relative w-full max-w-md bg-white border border-gray-200 rounded-2xl shadow-2xl overflow-hidden z-10">

            <div class="px-6 py-5 flex justify-between items-center bg-gray-50/50 border-b border-gray-100">
                <div>
                    <h2 class="text-sm font-bold text-gray-900 uppercase tracking-widest">Assign Date</h2>
                    <p class="text-[10px] text-gray-400 font-medium mt-0.5">UPDATE USER DETAIL</p>
                </div>
                <button type="button" id="closeAddOffdayModalBtn"
                    class="text-2xl leading-none text-gray-400 hover:text-gray-900 transition-all duration-200 focus:outline-none px-2 pb-1 rounded-lg hover:bg-gray-100">&times;</button>
            </div>

            <form id="offdayForm" action="{{ route('user.createOffday', $user->id) }}" method="POST">
                @csrf
                <div class="p-6 space-y-6">
                    <div class="relative">
                        <label class="block text-[11px] font-bold text-cyan-600 uppercase mb-2 ml-1">Add Offday</label>
                        <input type="date" name="offday_base_date"
                            class="w-full px-4 py-3 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-cyan-500 text-gray-700 font-medium shadow-sm">
                    </div>

                    <label class="flex items-center group cursor-pointer p-1">
                        <div class="relative flex items-center">
                            <input type="checkbox" id="isRecurrentCheckbox" name="is_recurrent"
                                class="h-6 w-6 rounded-md border-gray-300 text-cyan-500 focus:ring-cyan-500 cursor-pointer shadow-sm">
                        </div>
                        <span class="ml-4 text-sm font-bold text-gray-700 group-hover:text-cyan-600 transition-colors">Make
                            it recurrent</span>
                    </label>

                    <div id="recurrentSection"
                        class="hidden space-y-3 bg-cyan-50/50 p-4 rounded-xl border border-cyan-100 transition-all duration-300">

                        <div class="flex items-center justify-between">
                            <label class="flex items-center text-sm font-medium text-gray-600">
                                <input type="radio" name="recurrence_mode" value="times" checked
                                    class="mode-radio text-cyan-600 focus:ring-cyan-500">
                                <span class="ml-3">Repeat for</span>
                            </label>
                            <div class="flex items-center bg-white rounded-lg border border-cyan-200 px-2 py-1 shadow-sm">
                                <input type="number" id="repeatCountInput" name="repeat_count" min="1"
                                    value="1" class="w-12 text-center border-none focus:ring-0 text-sm font-bold p-0"
                                    placeholder="0">
                                <span class="text-[10px] font-bold text-gray-400 uppercase ml-1">Times</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <label class="flex items-center text-sm font-medium text-gray-600">
                                <input type="radio" name="recurrence_mode" value="until"
                                    class="mode-radio text-cyan-600 focus:ring-cyan-500">
                                <span class="ml-3">Until date</span>
                            </label>
                            <input type="date" id="repeatUntilInput" name="repeat_until_date" disabled
                                class="bg-white border border-cyan-200 rounded-lg text-xs py-1 px-2 focus:ring-cyan-500 disabled:opacity-40">
                        </div>
                    </div>
                </div>

                <div class="px-6 py-5 bg-gray-50 border-t border-gray-100 flex gap-3">
                    <button type="button" id="cancelOffdayBtn"
                        class="flex-1 px-4 py-3 text-sm font-bold text-gray-500 hover:text-gray-700 transition">Cancel</button>
                    <button type="submit"
                        class="flex-[2] bg-cyan-500 hover:bg-cyan-600 text-white text-sm font-bold py-3 rounded-xl shadow-lg shadow-cyan-200 transition-all active:scale-95">Save
                        Schedule</button>
                </div>
            </form>
        </div>
    </div>
@endsection
