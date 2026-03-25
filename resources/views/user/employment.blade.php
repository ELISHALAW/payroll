@extends('output.layout')

@section('content')
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">

            <div class="flex items-center justify-between px-8 py-4 border-b bg-gray-50/50">
                <h3 class="text-md font-bold text-gray-800 uppercase tracking-tight">Employment Information</h3>
                <button id="openEmploymentModal"
                    class="px-4 py-1.5 border-2 border-cyan-500 text-cyan-500 text-sm font-bold rounded-lg hover:bg-cyan-50 transition-all active:scale-95">
                    Edit
                </button>
            </div>
            <div class="px-8 py-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-4">

                    <div class="space-y-2">
                        <div class="flex flex-col border-b border-gray-50 pb-1">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Employee No.</span>
                            <span
                                class="text-sm font-semibold text-gray-800">{{ $user->getDetail('employee_no') ?? '-' }}</span>
                        </div>
                        <div class="flex flex-col border-b border-gray-50 pb-1">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Employment
                                Type</span>
                            <span
                                class="text-sm font-semibold text-gray-800">{{ $user->getDetail('employment_type') ?? '-' }}</span>
                        </div>
                        <div class="flex flex-col border-b border-gray-50 pb-1">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Position</span>
                            <span
                                class="text-sm font-semibold text-gray-800">{{ $user->getDetail('position') ?? '-' }}</span>
                        </div>
                        <div class="flex flex-col border-b border-gray-50 pb-1">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Position Level</span>
                            <span
                                class="text-sm font-semibold text-gray-800">{{ $user->getDetail('position_level') ?? '-' }}</span>
                        </div>
                        <div class="flex flex-col border-b border-gray-50 pb-1">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Department</span>
                            <span
                                class="text-sm font-semibold text-gray-800">{{ $user->getDetail('department') ?? '-' }}</span>
                        </div>
                        <div class="flex flex-col border-b border-gray-50 pb-1">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Cost Center</span>
                            <span
                                class="text-sm font-semibold text-gray-800">{{ $user->getDetail('cost_center') ?? '-' }}</span>
                        </div>
                        <div class="flex flex-col border-b border-gray-50 pb-1">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Subsidiary</span>
                            <span
                                class="text-sm font-semibold text-gray-800">{{ $user->getDetail('subsidiary') ?? '-' }}</span>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <div class="flex flex-col border-b border-gray-50 pb-1">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Employment
                                Status</span>
                            <span
                                class="inline-flex items-center text-sm font-semibold {{ $user->getDetail('employment_status') == 'Active - Confirmed' ? 'text-green-700' : 'text-gray-800' }}">
                                <span
                                    class="w-1.5 h-1.5 {{ $user->getDetail('employment_status') == 'Active - Confirmed' ? 'bg-green-500' : 'bg-gray-400' }} rounded-full mr-2"></span>
                                {{ $user->getDetail('employment_status') ?? '-' }}
                            </span>
                        </div>
                        <div class="flex flex-col border-b border-gray-50 pb-1">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Date of
                                Confirmation</span>
                            <span
                                class="text-sm font-semibold text-gray-800">{{ $user->getDetail('date_of_confirmation') ?? '-' }}</span>
                        </div>
                        <div class="flex flex-col border-b border-gray-50 pb-1">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Reports To</span>
                            <span
                                class="text-sm font-semibold text-gray-800">{{ $user->getDetail('reports_to') ?? '-' }}</span>
                        </div>
                        <div class="flex flex-col border-b border-gray-50 pb-1">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Location</span>
                            <span
                                class="text-sm font-semibold text-gray-800">{{ $user->getDetail('location') ?? '-' }}</span>
                        </div>
                        <div class="flex flex-col border-b border-gray-50 pb-1">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Pay Group</span>
                            <span
                                class="text-sm font-semibold text-gray-800">{{ $user->getDetail('pay_group') ?? '-' }}</span>
                        </div>
                        <div class="flex flex-col border-b border-gray-50 pb-1">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Functional
                                Group</span>
                            <span
                                class="text-sm font-semibold text-gray-800">{{ $user->getDetail('functional_group') ?? '-' }}</span>
                        </div>
                        <div class="flex flex-col border-b border-gray-50 pb-1">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Knowledge
                                Worker</span>
                            <span
                                class="text-sm font-semibold text-gray-800">{{ $user->getDetail('knowledge_worker') ?? 'No' }}</span>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <div class="flex flex-col border-b border-gray-50 pb-1">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Duration of
                                Service</span>
                            <span
                                class="text-sm font-semibold text-gray-800">{{ $user->getDetail('Duration of Service') ?? '0 y 0 m 0 d' }}</span>
                        </div>
                        <div class="flex flex-col border-b border-gray-50 pb-1">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Join Date</span>
                            <span
                                class="text-sm font-semibold text-gray-800">{{ $user->getDetail('join_date') ?? '-' }}</span>
                        </div>
                        <div class="flex flex-col border-b border-gray-50 pb-1">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Status Effective
                                From</span>
                            <span
                                class="text-sm font-semibold text-gray-800">{{ $user->getDetail('Employment Status Effective From') ?? '-' }}</span>
                        </div>
                        <div class="flex flex-col border-b border-gray-50 pb-1">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Notice Period</span>
                            <span
                                class="text-sm font-semibold text-gray-800">{{ $user->getDetail('Notice Period (days)') ?? '-' }}
                                Days</span>
                        </div>
                        <div class="flex flex-col border-b border-gray-50 pb-1">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Work Permit
                                No.</span>
                            <span
                                class="text-sm font-semibold text-gray-800">{{ $user->getDetail('Work Permit No.') ?? '-' }}</span>
                        </div>
                        <div class="flex flex-col border-b border-gray-50 pb-1">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Work Permit
                                Expiry</span>
                            <span
                                class="text-sm font-semibold text-gray-800">{{ $user->getDetail('Work Permit Expiry Date') ?? '-' }}</span>
                        </div>
                        <div class="flex flex-col border-b border-gray-50 pb-1">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Retirement/End
                                Date</span>
                            <span
                                class="text-sm font-semibold text-gray-800">{{ $user->getDetail('Date of Retirement / End of Contract') ?? 'Not applicable' }}</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="w-full bg-white rounded-xl shadow-sm border border-gray-100 p-6 mt-10">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h2 class="text-lg font-bold text-gray-800 uppercase tracking-tight">Organizational History</h2>
                    <p class="text-sm text-gray-500">Job records in the current company</p>
                </div>
                <button id="addHistoryBtn" type="button"
                    class="flex items-center gap-1 px-4 py-1.5 border border-cyan-400 text-cyan-500 rounded-lg font-medium hover:bg-cyan-50 transition-colors">
                    <span class="text-xl leading-none">+</span> Add History
                </button>
            </div>
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-gray-100 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-xs font-bold text-gray-600 uppercase">Type</th>
                            <th class="px-6 py-3 text-xs font-bold text-gray-600 uppercase">Status</th>
                            <th class="px-6 py-3 text-xs font-bold text-gray-600 uppercase">Department</th>
                            <th class="px-6 py-3 text-xs font-bold text-gray-600 uppercase">Position</th>
                            <th class="px-6 py-3 text-xs font-bold text-gray-600 uppercase">Level</th>
                            <th class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        {{-- We use the name of the function but in "snake_case" --}}
                        @foreach ($user->org_history as $history)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm flex items-center">
                                    @if ($loop->first)
                                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                    @else
                                        <span class="w-2 h-2 mr-2"></span>
                                    @endif
                                    {{ $history->type }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $history->status }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $history->department }}</td>
                                <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $history->position }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $history->level }}</td>
                                <td class="px-6 py-4 text-right">
                                    <button class="text-gray-400 hover:text-cyan-600">...</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <div class="w-full bg-white rounded-xl shadow-sm border border-gray-80 p-6 mt-8">
            {{-- Header Section --}}
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h2 class="text-lg font-bold text-gray-800 uppercase tracking-tight">Career Progression</h2>
                    <p class="text-sm text-gray-400">Job records before the current company</p>
                </div>
                <button id="addPastJobBtn"
                    class="flex items-center gap-1 px-4 py-1.5 border border-cyan-400 text-cyan-500 rounded-lg font-medium hover:bg-cyan-50 transition-colors">
                    <span class="text-xl leading-none">+</span> Past Job Information
                </button>


            </div>

            {{-- Empty State Content --}}
            <div class="w-full bg-white rounded-xl shadow-sm border border-gray-100 p-6">

                {{-- Header remains the same --}}


                @php
                    // Replace this with your actual database check, e.g., $user->history->isEmpty()
                    $hasHistory = true;
                @endphp

                @if (!$hasHistory)
                    {{-- 1. EMPTY STATE VIEW --}}
                    <div
                        class="flex flex-col items-center justify-center py-10 border-2 border-dashed border-gray-50 rounded-lg">
                        <div class="w-12 h-12 bg-gray-50 rounded-full flex items-center justify-center mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <p class="text-gray-500 text-sm font-medium">No history records found</p>
                    </div>
                @else
                    {{-- 2. DATA LIST VIEW (Using your Div-Grid approach) --}}
                    <div class="flex flex-col gap-y-3">
                        {{-- Header Row --}}
                        <div
                            class="grid grid-cols-5 bg-gray-50 p-4 font-bold text-xs text-gray-500 uppercase tracking-wider rounded-lg">
                            <div>Job-Title</div>
                            <div>Company Name</div>
                            <div>Start date </div>
                            <div>End Date</div>
                            <div>Leave Reason</div>
                        </div>

                        {{-- Data Row - You can loop this with @foreach --}}
                        @foreach ($careerHistory as $job)
                            <div class="grid grid-cols-5 p-2 border-b border-gray-100 items-center">
                                <div class="font-medium">{{ $job->job_title }}</div>
                                <div class="text-gray-600">{{ $job->company_name }}</div>
                                <div class="text-gray-500">{{ $job->start_date }}</div>
                                <div class="text-gray-500">{{ $job->end_date }}</div>
                                <div class="italic text-cyan-600">{{ $job->leave_reason }}</div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>





    <div id="employmentModal" class="fixed inset-0 z-[100] hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 py-6">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                onclick="toggleEmploymentModal(false)">
            </div>

            <div class="relative bg-white rounded-xl shadow-2xl transform transition-all max-w-4xl w-full overflow-hidden">
                <form id="employmentForm" method="POST" action="{{ route('user.updateEmploymentInfo', $user->id) }}">
                    @csrf
                    <div class="px-6 py-4 border-b flex justify-between items-center">
                        <h3 class="text-lg font-bold text-gray-800 uppercase tracking-tight">Edit Employment Info</h3>
                        <button type="button" onclick="toggleEmploymentModal(false)"
                            class="text-gray-400 hover:text-gray-600 border rounded-md p-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="px-8 py-6 max-h-[75vh] overflow-y-auto">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-6">

                            {{-- Left Column --}}
                            <div class="space-y-5">
                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-1">Employee No.</label>
                                    <input type="text" name="employee_no" placeholder="i.e. 001"
                                        value="{{ $user->getDetail('employee_no') }}"
                                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 text-sm"
                                        required>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-1">Cost Center</label>
                                    <input type="text" name="cost_center" placeholder="i.e. New"
                                        value="{{ $user->getDetail('cost_detail') }}"
                                        class="w-full border-gray-300 rounded-md shadow-sm text-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-1">Work Permit No.</label>
                                    <input type="text" name="work_permit_no" placeholder="i.e. 1234"
                                        value="{{ $user->getDetail('Work Permit No.') }}"
                                        class="w-full border-gray-300 rounded-md shadow-sm text-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-1">Functional Group</label>
                                    <input type="text" name="functional_group" placeholder="i.e. 1234"
                                        value="{{ $user->getDetail('Functional Group') }}"
                                        class="w-full border-gray-300 rounded-md shadow-sm text-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-1">Subsidiary</label>
                                    <input type="text" name="subsidiary" placeholder="i.e. 1234"
                                        value="{{ $user->getDetail('Subsidiary') }}"
                                        class="w-full border-gray-300 rounded-md shadow-sm text-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-1">Employment Type</label>
                                    <select name="employment_type"
                                        class="w-full border-gray-300 rounded-md shadow-sm text-sm">
                                        <option value="Full Time"
                                            {{ $user->getDetail('employment_type') == 'Full Time' ? 'selected' : '' }}>
                                            Full Time
                                        </option>
                                        <option value="Director"
                                            {{ $user->getDetail('employment_type') == 'Director' ? 'selected' : '' }}>
                                            Director
                                        </option>
                                        <option value="Contract"
                                            {{ $user->getDetail('employment_type') == 'Contract' ? 'selected' : '' }}>
                                            Contract
                                        </option>
                                        <option value="Intern"
                                            {{ $user->getDetail('employment_type') == 'Intern' ? 'selected' : '' }}>
                                            Intern
                                        </option>
                                        <option value="Part Time"
                                            {{ $user->getDetail('employment_type') == 'Part Time' ? 'selected' : '' }}>
                                            Part Time
                                        </option>
                                        <option value="Apprentice"
                                            {{ $user->getDetail('employment_type') == 'Apprentice' ? 'selected' : '' }}>
                                            Apprentice
                                        </option>
                                        <option value="Expatriate"
                                            {{ $user->getDetail('employment_type') == 'Expatriate' ? 'selected' : '' }}>
                                            Expatriate
                                        </option>
                                        <option value="Non Employee"
                                            {{ $user->getDetail('employment_type') == 'Non Employee' ? 'selected' : '' }}>
                                            Non Employee
                                        </option>
                                        <option value="Contact After Retirement"
                                            {{ $user->getDetail('employment_type') == 'Contract After Retirement' ? 'selected' : '' }}>
                                            Contract After Retirement
                                        </option>
                                        <option value="Fixed Contract"
                                            {{ $user->getDetail('employment_type') == 'Fixed Contract' ? 'selected' : '' }}>
                                            Fixed Contract
                                        </option>
                                        <option value="Permanent"
                                            {{ $user->getDetail('employment_type') == 'Permanent' ? 'selected' : '' }}>
                                            Permanent
                                        </option>
                                        <option value="Practical Student"
                                            {{ $user->getDetail('employment_type') == 'Practical Student' ? 'selected' : '' }}>
                                            Practical Student
                                        </option>
                                        <option value="Other"
                                            {{ $user->getDetail('employment_type') == 'Other' ? 'selected' : '' }}>
                                            Other
                                        </option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-1">Date of Confirmation</label>
                                    <input type="date" name="date_of_confirmation"
                                        value="{{ $user->getDetail('date_of_confirmation') }}"
                                        class="w-full border-gray-300 rounded-md shadow-sm text-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-1">Employment Status</label>
                                    <select name="employment_status"
                                        class="w-full border-gray-300 rounded-md shadow-sm text-sm">
                                        <option value="Active - Confirmed"
                                            {{ $user->getDetail('employment_status') == 'Active - Confirmed' ? 'selected' : '' }}>
                                            Active - Confirmed</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-1">Reports to</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>
                                        </span>
                                        <input type="text" name="reports_to"
                                            value="{{ $user->getDetail('Reports To') }}"
                                            class="w-full pl-10 border-gray-300 rounded-md shadow-sm text-sm">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-1">Position Level</label>
                                    <input type="text" name="position_level"
                                        value="{{ $user->getDetail('Position Level') }}"
                                        class="w-full border-gray-300 rounded-md shadow-sm text-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-1 text-xs">Knowledge Worker (at
                                        Specified Region)</label>
                                    <div class="flex items-center gap-4 mt-2">
                                        <label class="flex items-center text-sm"><input type="radio"
                                                name="knowledge_worker" value="Yes" class="text-cyan-600 mr-2">
                                            Yes</label>
                                        <label class="flex items-center text-sm"><input type="radio"
                                                name="knowledge_worker" value="No" checked
                                                class="text-cyan-600 mr-2"> No</label>
                                    </div>
                                </div>
                            </div>

                            {{-- Right Column --}}
                            <div class="space-y-5">
                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-1">Join Date</label>
                                    <input type="date" name="join_date" value="{{ $user->getDetail('Join Date') }}"
                                        class="w-full border-gray-300 rounded-md shadow-sm text-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-1">Date of Retirement / End of
                                        Contract</label>
                                    <input type="date" name="retirement_date"
                                        class="w-full border-gray-300 rounded-md shadow-sm text-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-1">Work Permit Expiry
                                        Date</label>
                                    <input type="date" name="work_permit_expiry"
                                        class="w-full border-gray-300 rounded-md shadow-sm text-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-1">Employment Status Effective
                                        From</label>
                                    <input type="date" name="status_effective_from" value="2026-03-19"
                                        class="w-full border-gray-300 rounded-md shadow-sm text-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-1">Employment Status Effective
                                        To</label>
                                    <input type="date" name="status_effective_to" value="2026-03-19"
                                        class="w-full border-gray-300 rounded-md shadow-sm text-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-1">Pay Group</label>
                                    <input type="text" name="pay_group" placeholder="i.e. 1234"
                                        value="{{ $user->getDetail('Pay Group') }}"
                                        class="w-full border-gray-300 rounded-md shadow-sm text-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-1">Location</label>
                                    <select name="location" class="w-full border-gray-300 rounded-md shadow-sm text-sm">
                                        <option value="Kuala Lumpur">i.e. Kuala Lumpur</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-1">Position</label>
                                    <input type="text" name="position" value="{{ $user->getDetail('position') }}"
                                        class="w-full border-gray-300 rounded-md shadow-sm text-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-1">Department</label>
                                    <input type="text" name="department" value="{{ $user->getDetail('department') }}"
                                        class="w-full border-gray-300 rounded-md shadow-sm text-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-1">Notice Period (days)</label>
                                    <input type="number" name="notice_period" placeholder="i.e. 60"
                                        value="{{ $user->getDetail('Notice Period (days)') }}"
                                        class="w-full border-gray-300 rounded-md shadow-sm text-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-1">Returning Expert
                                        Program</label>
                                    <div class="flex items-center gap-4 mt-2">
                                        <label class="flex items-center text-sm"><input type="radio"
                                                name="returning_expert" value="Yes" class="text-cyan-600 mr-2">
                                            Yes</label>
                                        <label class="flex items-center text-sm"><input type="radio"
                                                name="returning_expert" value="No" checked
                                                class="text-cyan-600 mr-2"> No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-8 py-4 flex justify-end gap-3 border-t">
                        <button type="button" id="closeEmploymentModal"
                            class="px-6 py-2 text-sm font-bold text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50">Cancel</button>
                        <button type="submit"
                            class="px-8 py-2 bg-gray-100 text-gray-400 font-bold rounded-md cursor-allowed"
                            id="submitBtn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>






    <div id="historyModal"
        class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/40 p-4 backdrop-blur-sm">

        <div class="w-full max-w-2xl bg-white rounded-xl shadow-2xl overflow-hidden border border-gray-200">

            <div class="flex items-center justify-between px-6 py-4 border-b">
                <h2 class="text-md font-bold text-gray-800 uppercase tracking-wide">Update Organizational History</h2>
                <button id="closeModalIcon" type="button"
                    class="text-cyan-500 border border-cyan-400 rounded-md p-1 hover:bg-cyan-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form action="{{ route('user.createOrganizationalDetails', $user->id) }}" method="POST">
                @csrf
                <div class="px-8 py-6 space-y-5">
                    <div class="grid grid-cols-2 gap-x-8 gap-y-4">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Effective From</label>
                            <div class="relative">
                                <input type="date" name="effective_from"
                                    value="{{ $user->getDetail('Effective From') }}"
                                    class="w-full border rounded-lg px-3 py-2 outline-none focus:border-cyan-400" required>
                                <span class="absolute right-3 top-2.5 text-gray-400 text-xs cursor-pointer">✕</span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Effective To</label>
                            <div class="relative">
                                <input type="date" name="effective_to" value="{{ $user->getDetail('effective_to') }}"
                                    class="w-full border rounded-lg px-3 py-2 outline-none focus:border-cyan-400" required>
                                <span class="absolute right-3 top-2.5 text-gray-400 text-xs cursor-pointer">✕</span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Employment Type</label>
                            <select name="history_employment_type"
                                class="w-full border rounded-lg px-3 py-2 bg-white appearance-none outline-none focus:border-cyan-400"
                                required>
                                <option value="Full Time"
                                    {{ $user->getDetail('history_employment_type') == 'Full Time' ? 'selected' : '' }}>
                                    Full Time
                                </option>
                                <option value="Director"
                                    {{ $user->getDetail('history_employment_type') == 'Director' ? 'selected' : '' }}>
                                    Director
                                </option>
                                <option value="Contract"
                                    {{ $user->getDetail('history_employment_type') == 'Contract' ? 'selected' : '' }}>
                                    Contract
                                </option>
                                <option value="Intern"
                                    {{ $user->getDetail('history_employment_type') == 'Intern' ? 'selected' : '' }}>
                                    Intern
                                </option>
                                <option value="Part Time"
                                    {{ $user->getDetail('history_employment_type') == 'Part Time' ? 'selected' : '' }}>
                                    Part Time
                                </option>
                                <option value="Apprentice"
                                    {{ $user->getDetail('history_employment_type') == 'Apprentice' ? 'selected' : '' }}>
                                    Apprentice
                                </option>
                                <option value="Expatriate"
                                    {{ $user->getDetail('history_employment_type') == 'Expatriate' ? 'selected' : '' }}>
                                    Expatriate
                                </option>
                                <option value="Non Employee"
                                    {{ $user->getDetail('history_employment_type') == 'Non Employee' ? 'selected' : '' }}>
                                    Non Employee
                                </option>
                                <option value="Contact After Retirement"
                                    {{ $user->getDetail('history_employment_type') == 'Contract After Retirement' ? 'selected' : '' }}>
                                    Contact After Retirement
                                </option>
                                <option value="Fixed Contract"
                                    {{ $user->getDetail('history_employment_type') == 'Fixed Contract' ? 'selected' : '' }}>
                                    Fixed Contact
                                </option>
                                <option value="Permanent"
                                    {{ $user->getDetail('history_employment_type') == 'Permanent' ? 'selected' : '' }}>
                                    Permanent
                                </option>
                                <option value="Practical Student"
                                    {{ $user->getDetail('history_employment_type') == 'Practical Student' ? 'selected' : '' }}>
                                    Practical Student
                                </option>
                                <option value="Other"
                                    {{ $user->getDetail('history_employment_type') == 'Other' ? 'selected' : '' }}>
                                    Other
                                </option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Employment Status</label>
                            <select name="history_employment_status"
                                class="w-full border rounded-lg px-3 py-2 bg-white appearance-none outline-none focus:border-cyan-400"
                                required>
                                <option value="Active - Confirmed"
                                    {{ $user->getDetail('history_employment_status') == 'Active - Confirmed' ? 'selected' : '' }}>
                                    Active - Confirmed
                                </option>
                                <option value="Active - Probation"
                                    {{ $user->getDetail('history_employment_status') == 'Active - Probation' ? 'selected' : '' }}>
                                    Active - Probation
                                </option>
                                <option value="Resigned"
                                    {{ $user->getDetail('history_employment_status') == 'Resigned' ? 'selected' : '' }}>
                                    Resigned
                                </option>
                                <option value="Terminated"
                                    {{ $user->getDetail('history_employment_status') == 'Terminated' ? 'selected' : '' }}>
                                    Terminated
                                </option>
                                <option value="Suspended"
                                    {{ $user->getDetail('history_employment_status') == 'Suspended' ? 'selected' : '' }}>
                                    Suspended
                                </option>
                                <option value="Other"
                                    {{ $user->getDetail('history_employment_status') == 'Other' ? 'selected' : '' }}>
                                    Other
                                </option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Position</label>
                            <input type="text" name="history_position" placeholder="Tech Lead"
                                class="w-full border rounded-lg px-3 py-2 outline-none focus:border-cyan-400"
                                value="{{ $user->getDetail('history_position') }}" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Position Level</label>
                            <input type="text" name="history_position_level" placeholder="Senior"
                                class="w-full border rounded-lg px-3 py-2 outline-none focus:border-cyan-400"
                                value="{{ $user->getDetail('history_position_level') }}" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Department</label>
                            <input type="text" name="history_department" placeholder="Tech"
                                class="w-full border rounded-lg px-3 py-2 outline-none focus:border-cyan-400"
                                value="{{ $user->getDetail('history_department') }}" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Reports to</label>
                            <div class="relative">
                                <span class="absolute left-3 top-2.5 text-gray-400">🔍</span>
                                <input type="text" name="history_reports_to" placeholder="Daniel Law Seong Chun"
                                    class="w-full border rounded-lg pl-9 pr-3 py-2 outline-none focus:border-cyan-400"
                                    value="{{ $user->getDetail('history_reports_to') }}" required>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Remarks <span
                                class="text-red-500">*</span></label>
                        <textarea name="history_remarks" placeholder="i.e. Change Position"
                            class="w-full border rounded-lg px-3 py-2 h-20 outline-none focus:border-cyan-400 resize-none" required>
                            {{ $user->getDetail('history_remarks') }}
                        </textarea>
                    </div>
                </div>

                <div class="flex justify-end gap-3 px-8 py-6 border-t bg-gray-50/30">
                    <button id="cancelModalBtn" type="button"
                        class="px-6 py-2 border border-gray-300 rounded-lg text-gray-500 font-semibold hover:bg-gray-100 transition-colors">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-8 py-2 bg-cyan-500 text-white rounded-lg font-bold shadow-md hover:bg-cyan-600 transition-colors">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>



    <div id="careerModal"
        class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">

        <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl overflow-hidden transform transition-all">

            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 uppercase tracking-tight">Career Progression</h3>
                <button type="button" id="closeModalBtn" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form action="{{ route('user.createCareerProgression', $user->id) }}" method="POST" class="p-6">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-1">
                        <label class="block text-sm font-bold text-gray-700 mb-1">Job Title</label>
                        <input type="text" name="job_title" placeholder="i.e. Manager"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 outline-none focus:border-cyan-400">
                    </div>
                    <div class="col-span-1">
                        <label class="block text-sm font-bold text-gray-700 mb-1">Company Name</label>
                        <input type="text" name="company_name" placeholder="Enter company name"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 outline-none focus:border-cyan-400">
                    </div>
                    <div class="col-span-1">
                        <label class="block text-sm font-bold text-gray-700 mb-1">Start Date</label>
                        <input type="date" name="start_date"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 outline-none">
                    </div>
                    <div class="col-span-1">
                        <label class="block text-sm font-bold text-gray-700 mb-1">End Date</label>
                        <input type="date" name="end_date"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 outline-none">
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-1">Leave Reason</label>
                        <textarea name="leave_reason" placeholder="Add a leave reason" rows="2"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 outline-none focus:border-cyan-400"></textarea>
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit"
                        class="bg-cyan-500 text-white px-8 py-2 rounded-lg font-bold hover:bg-cyan-600 transition-all">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
