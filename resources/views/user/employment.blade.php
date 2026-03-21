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
    </div>



    <div id="employmentModal" class="fixed inset-0 z-[100] hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 py-6">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="toggleEmploymentModal(false)">
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
                                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 text-sm">
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
                                        <option value="Director"
                                            {{ $user->getDetail('Employment Type') == 'Director' ? 'selected' : '' }}>
                                            Director</option>
                                        <option value="Full-time"
                                            {{ $user->getDetail('Employment Type') == 'Full-time' ? 'selected' : '' }}>
                                            Full-time</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-1">Date of Confirmation</label>
                                    <input type="date" name="date_of_confirmation"
                                        value="{{ $user->getDetail('Date of Confirmation') }}"
                                        class="w-full border-gray-300 rounded-md shadow-sm text-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-1">Employment Status</label>
                                    <select name="employment_status"
                                        class="w-full border-gray-300 rounded-md shadow-sm text-sm">
                                        <option value="Active - Confirmed"
                                            {{ $user->getDetail('Employment Status') == 'Active - Confirmed' ? 'selected' : '' }}>
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
@endsection
