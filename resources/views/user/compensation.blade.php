@extends('output.layout')



@section('content')
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm relative mb-6">
            {{-- Header Section --}}
            <div class="flex justify-between items-start mb-6">
                <h3 class="text-gray-900 font-bold text-lg uppercase tracking-tight">Bank Details</h3>

                <button onclick="toggleBankModal()"
                    class="px-6 py-1.5 border-2 border-cyan-400 text-cyan-500 rounded-lg text-sm font-semibold hover:bg-cyan-50 transition-colors">
                    Edit
                </button>
            </div>

            {{-- Info Grid --}}
            <div class="grid grid-cols-2 gap-x-12 gap-y-4">
                {{-- Bank Name --}}
                <div class="flex items-center">
                    <span class="w-1/2 text-gray-400 text-sm">Bank Name</span>
                    <span class="w-1/2 text-gray-700 text-sm">{{ $user->getDetail('bank_name') }}</span>
                </div>

                {{-- Bank Account No. --}}
                <div class="flex items-center">
                    <span class="w-1/2 text-gray-400 text-sm">Bank Account No.</span>
                    <span class="w-1/2 text-gray-700 text-sm">{{ $user->getDetail('bank_account_no') }}</span>
                </div>

                {{-- Bank Account Type --}}
                <div class="flex items-center">
                    <span class="w-1/2 text-gray-400 text-sm">Bank Account Type</span>
                    <span class="w-1/2 text-gray-700 text-sm font-medium">{{ $user->getDetail('bank_account_type') }}</span>
                </div>

                {{-- ASNB Account No. --}}
                <div class="flex items-center">
                    <span class="w-1/2 text-gray-400 text-sm">ASNB Account No.</span>
                    <span class="w-1/2 text-gray-700 text-sm">{{ $user->getDetail('asnb_account_no') }}</span>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 p-8 shadow-sm">
            {{-- Header --}}
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-gray-900 font-bold text-lg uppercase">COMPENSATION DETAILS</h3>
                <button id="edit-compensation-btn"
                    class="px-6 py-1.5 border border-cyan-500 text-cyan-500 rounded-md hover:bg-cyan-50">Edit</button>
            </div>

            {{-- Tabs --}}
            <div class="flex mb-8">
                <button id="tab-info"
                    class="px-6 py-2 bg-cyan-50 border border-cyan-500 text-cyan-600 rounded-l-lg font-medium text-sm transition-all">
                    Compensation Info
                </button>
                <button id="tab-history"
                    class="px-8 py-2 bg-white border border-l-0 border-gray-300 text-gray-700 rounded-r-lg font-medium text-sm hover:bg-gray-50 transition-all">
                    History
                </button>
            </div>

            <div id="content-info" class="block animate-fadeIn">
                <div class="grid grid-cols-2 gap-x-12 gap-y-4">
                    <div class="space-y-4">
                        <div class="flex"><span class="w-1/2 text-gray-400">Effective Date</span><span
                                class="w-1/2 font-semibold">{{ $user->getDetail('effective_date') }}</span></div>
                        <div class="flex"><span class="w-1/2 text-gray-400">Salary Type</span><span
                                class="w-1/2 font-semibold">{{$user->getDetail('salary_type')}}</span></div>
                        <div class="flex"><span class="w-1/2 text-gray-400">Reason</span><span
                                class="w-1/2 font-semibold text-sm">{{$user->getDetail('reason')}}</span></div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex"><span class="w-1/3 text-gray-400">Payment</span><span
                                class="w-2/3 font-semibold">{{$user->getDetail('payment_method')}}</span></div>
                        <div class="flex"><span class="w-1/3 text-gray-400">Salary</span><span
                                class="w-2/3 font-bold text-cyan-600">{{$user->getDetail('salary')}}</span></div>
                    </div>
                </div>
            </div>

            <div id="content-history" class="hidden animate-fadeIn">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-gray-100 text-gray-400 text-sm">
                            <th class="pb-3 font-medium">Date</th>
                            <th class="pb-3 font-medium">Reason</th>
                            <th class="pb-3 font-medium">Amount</th>
                            <th class="pb-3 font-medium text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        <tr class="border-b border-gray-50">
                            <td class="py-4">2024-10-09</td>
                            <td class="py-4">Annual Increment</td>
                            <td class="py-4 font-semibold text-gray-800">RM 2,600.00</td>
                            <td class="py-4 text-right"><span
                                    class="px-2 py-1 bg-green-50 text-green-600 rounded text-xs">Active</span></td>
                        </tr>
                        <tr class="border-b border-gray-50">
                            <td class="py-4 text-gray-500">2023-10-09</td>
                            <td class="py-4 text-gray-500">New Joiner</td>
                            <td class="py-4 text-gray-500">RM 2,300.00</td>
                            <td class="py-4 text-right"><span
                                    class="px-2 py-1 bg-gray-100 text-gray-500 rounded text-xs">Superseded</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div id="compensationModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-2xl overflow-hidden">
            {{-- Modal Header --}}
            <div class="flex justify-between items-center p-6 border-b border-gray-50">
                <h3 class="text-gray-900 font-bold text-lg uppercase">Edit Compensation Details</h3>
                <button id="close-compensation-modal" class="text-gray-400 hover:text-gray-600 border rounded-md p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            {{-- Modal Form --}}
            <form action="{{ route('user.details', $user->id) }}" method="POST" class="p-6">
                @csrf
                <div class="grid grid-cols-2 gap-6">
                    {{-- Effective Date --}}
                    <div class="col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Effective Date</label>
                        <input type="date" name="effective_date"
                            class="w-full border border-gray-200 rounded-lg p-2.5 focus:ring-cyan-500" value="2026-03-25">
                    </div>

                    {{-- Pay by Attendance --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Pay by Attendance</label>
                        <select name="pay_by_attendance"
                            class="w-full border border-gray-200 rounded-lg p-2.5 focus:ring-cyan-500">
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>

                    {{-- Payment Method --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Payment Method</label>
                        <select name="payment_method"
                            class="w-full border border-gray-200 rounded-lg p-2.5 focus:ring-cyan-500">
                            <option value="Cheque">Cheque</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                        </select>
                    </div>

                    {{-- Salary --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Salary</label>
                        <input type="number" name="salary" class="w-full border border-gray-200 rounded-lg p-2.5"
                            value="2600">
                    </div>

                    {{-- Salary Type --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Salary Type / Pay Interval</label>
                        <select name="salary_type"
                            class="w-full border border-gray-200 rounded-lg p-2.5 focus:ring-cyan-500">
                            <option value="Monthly">Monthly</option>
                            <option value="Daily">Daily</option>
                        </select>
                    </div>

                    {{-- Reason --}}
                    <div class="col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Reason</label>
                        <textarea name="reason" placeholder="i.e. Promotion" class="w-full border border-gray-200 rounded-lg p-2.5 h-20"></textarea>
                    </div>
                </div>

                {{-- Buttons --}}
                <div class="flex justify-end gap-3 mt-8">
                    <button type="button" id="cancel-compensation-modal"
                        class="px-8 py-2 border border-gray-300 text-gray-500 rounded-lg font-semibold hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-8 py-2 bg-cyan-500 text-white rounded-lg font-semibold hover:bg-cyan-600 transition-colors">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="bankModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-2xl overflow-hidden">
            <div class="flex justify-between items-center p-6 border-b border-gray-50">
                <h3 class="text-gray-900 font-bold text-lg uppercase">Edit Bank Details</h3>
                <button onclick="toggleBankModal()"
                    class="text-cyan-500 border border-cyan-500 rounded-md p-1 hover:bg-cyan-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form action="{{ route('user.updateBankDetail', $user->id) }}" method="POST" class="p-6">
                @csrf
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Bank Account Type</label>
                        <select name="bank_account_type"
                            class="w-full border border-gray-200 rounded-lg p-2.5 text-gray-500 focus:ring-cyan-500">
                            <option value="Saving"
                                {{ $user->getDetail('bank_account_type') == 'Saving' ? 'selected' : '' }}>Saving
                            </option>
                            <option value="Current"
                                {{ $user->getDetail('bank_account_type') == 'Current' ? 'selected' : '' }}>Current</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Bank Name</label>
                        <select name="bank_name"
                            class="w-full border border-gray-200 rounded-lg p-2.5 focus:ring-cyan-500">
                            <option value="" disabled {{ !$user->getDetail('bank_name') ? 'selected' : '' }}>Select
                                Bank</option>
                            <optgroup label="Mainstream Banks">
                                <option value="MAYBANK"
                                    {{ ($user->getDetail('bank_name') ?? '') == 'MAYBANK' ? 'selected' : '' }}>
                                    MAYBANK</option>
                                <option value="CIMB BANK"
                                    {{ ($user->getDetail('bank_name') ?? '') == 'CIMB BANK' ? 'selected' : '' }}>
                                    CIMB BANK</option>
                                <option value="PUBLIC BANK"
                                    {{ ($user->getDetail('bank_name') ?? '') == 'PUBLIC BANK' ? 'selected' : '' }}>PUBLIC
                                    BANK</option>
                                <option value="RHB BANK"
                                    {{ ($user->getDetail('bank_name') ?? '') == 'RHB BANK' ? 'selected' : '' }}>RHB
                                    BANK</option>
                                <option value="HONG LEONG BANK"
                                    {{ ($user->getDetail('bank_name') ?? '') == 'HONG LEONG BANK' ? 'selected' : '' }}>HONG
                                    LEONG BANK
                                </option>
                                <option value="AMBANK"
                                    {{ ($user->getDetail('bank_name') ?? '') == 'AMBANK' ? 'selected' : '' }}>AMBANK
                                </option>
                                <option value="AFFIN BANK"
                                    {{ ($user->getDetail('bank_name') ?? '') == 'AFFIN BANK' ? 'selected' : '' }}>AFFIN
                                    BANK</option>
                                <option value="ALLIANCE BANK"
                                    {{ ($user->getDetail('bank_name') ?? '') == 'ALLIANCE BANK' ? 'selected' : '' }}>
                                    ALLIANCE BANK
                                </option>
                            </optgroup>
                            <optgroup label="Islamic Banks">
                                <option value="BANK ISLAM"
                                    {{ ($user->getDetail('bank_name') ?? '') == 'BANK ISLAM' ? 'selected' : '' }}>BANK
                                    ISLAM</option>
                                <option value="BANK MUAMALAT"
                                    {{ ($user->getDetail('bank_name') ?? '') == 'BANK MUAMALAT' ? 'selected' : '' }}>BANK
                                    MUAMALAT
                                </option>
                                <option value="BANK RAKYAT"
                                    {{ ($user->getDetail('bank_name') ?? '') == 'BANK RAKYAT' ? 'selected' : '' }}>BANK
                                    RAKYAT</option>
                            </optgroup>
                            <optgroup label="International / Others">
                                <option value="UOB BANK"
                                    {{ ($user->getDetail('bank_name') ?? '') == 'UOB BANK' ? 'selected' : '' }}>UOB
                                    BANK</option>
                                <option value="OCBC BANK"
                                    {{ ($user->getDetail('bank_name') ?? '') == 'OCBC BANK' ? 'selected' : '' }}>
                                    OCBC BANK</option>
                                <option value="HSBC BANK"
                                    {{ ($user->getDetail('bank_name') ?? '') == 'HSBC BANK' ? 'selected' : '' }}>
                                    HSBC BANK</option>
                                <option value="STANDARD CHARTERED"
                                    {{ ($user->getDetail('bank_name') ?? '') == 'STANDARD CHARTERED' ? 'selected' : '' }}>
                                    STANDARD
                                    CHARTERED</option>
                            </optgroup>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">ASNB Account No.</label>
                        <input type="text" name="asnb_account_no" value="{{ $user->getDetail('asnb_account_no') }}"
                            placeholder="i.e. 000006345"
                            class="w-full border border-gray-200 rounded-lg p-2.5 placeholder-gray-300">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Bank Account No.</label>
                        <input type="text" name="bank_account_no" value="{{ $user->getDetail('bank_account_no') }}"
                            placeholder="i.e. 112383456345"
                            class="w-full border border-gray-200 rounded-lg p-2.5 placeholder-gray-300">
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-8">
                    <button type="button" onclick="toggleBankModal()"
                        class="px-8 py-2 border border-gray-300 text-gray-500 rounded-lg font-semibold hover:bg-gray-50">Cancel</button>
                    <button type="submit" id="saveBankBtn"
                        class="px-8 py-2 bg-gray-100 text-gray-300 rounded-lg font-semibold cursor-not-allowed">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
