@php
    use Carbon\Carbon;
@endphp

@extends('output.layout')

@section('content')
    <div id="updateCareerModal"
        class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 transition-all duration-300">

        <div class="relative w-full max-w-2xl transform transition-all animate-in zoom-in duration-200">

            {{-- 1. BACK ANCHOR --}}
            <div class="mb-4">
                <a href="{{ route('user.employment', $user->id) }}"
                    class="text-sm text-white/90 hover:text-cyan-200 font-bold flex items-center transition-colors drop-shadow-sm">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back to Employment
                </a>
            </div>

            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-slate-200">

                <div class="flex justify-between items-center px-8 py-5 bg-slate-50/50 border-b border-slate-100">
                    <div>
                        <h3 class="text-xl font-extrabold text-slate-800 tracking-tight uppercase">Update Career Progression
                        </h3>
                        <p class="text-xs text-slate-500 font-medium mt-0.5">Modify your previous employment details</p>
                    </div>

                    <a href="{{ route('user.employment', $user->id) }}"
                        class="p-2 rounded-full text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>
                </div>

                {{-- 2. ACTION URL: Change to an UPDATE route --}}
                <form id="careerForm" action="{{ route('user.updateCareerProgression', $editJob->id) }}" method="POST"
                    class="p-8">
                    @csrf

                    <div class="grid grid-cols-2 gap-x-6 gap-y-5">

                        {{-- 3. VALUES: Use $editJob instead of $user->getDetail --}}
                        <div class="col-span-1">
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Job
                                Title</label>
                            <input type="text" name="job_title" value="{{ $editJob->job_title }}"
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-cyan-500/20 focus:border-cyan-500 transition-all outline-none text-slate-600">
                        </div>

                        <div class="col-span-1">
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Company
                                Name</label>
                            <input type="text" name="company_name" value="{{ $editJob->company_name }}"
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-cyan-500/20 focus:border-cyan-500 transition-all outline-none text-slate-600">
                        </div>

                        <div class="col-span-1">
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Start
                                Date</label>
                            <input type="date" name="start_date"
                                value="{{ $editJob->start_date ? Carbon::parse($editJob->start_date)->format('Y-m-d') : '' }}"
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-cyan-500/20 focus:border-cyan-500 transition-all outline-none text-slate-600">
                        </div>

                        <div class="col-span-1">
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">End
                                Date</label>
                            <input type="date" name="end_date"
                                value="{{ $editJob->end_date ? Carbon::parse($editJob->end_date)->format('Y-m-d') : '' }}"
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-cyan-500/20 focus:border-cyan-500 transition-all outline-none text-slate-600">
                        </div>

                        <div class="col-span-2">
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Reason for
                                Leaving</label>
                            <textarea name="leave_reason" rows="3"
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-cyan-500/20 focus:border-cyan-500 transition-all outline-none text-slate-600 resize-none">{{ $editJob->leave_reason }}</textarea>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-slate-100">
                        <a href="{{ route('user.employment', $user->id) }}"
                            class="px-6 py-2.5 text-sm font-bold text-slate-500 hover:text-slate-700 hover:bg-slate-100 rounded-lg transition-all">
                            Cancel
                        </a>
                        <button type="submit"
                            class="px-8 py-2.5 bg-cyan-600 hover:bg-cyan-700 text-white text-sm font-bold rounded-lg shadow-lg shadow-cyan-600/20 transform active:scale-95 transition-all">
                            Update Record
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
