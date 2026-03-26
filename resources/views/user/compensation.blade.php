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
                                class="w-1/2 font-semibold">{{ $user->getDetail('salary_type') }}</span></div>
                        <div class="flex"><span class="w-1/2 text-gray-400">Reason</span><span
                                class="w-1/2 font-semibold text-sm">{{ $user->getDetail('reason') }}</span></div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex"><span class="w-1/3 text-gray-400">Payment</span><span
                                class="w-2/3 font-semibold">{{ $user->getDetail('payment_method') }}</span></div>
                        <div class="flex"><span class="w-1/3 text-gray-400">Salary</span><span
                                class="w-2/3 font-bold text-cyan-600">{{ $user->getDetail('salary') }}</span></div>
                    </div>
                </div>
            </div>

            <div id="content-history" class="hidden animate-fadeIn">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-gray-100 text-gray-400 text-sm">
                            <th class="py-4 px-6 font-semibold text-left">Date</th>
                            <th class="py-4 px-6 font-semibold text-left">Reason</th>
                            <th class="py-4 px-6 font-semibold text-left">Amount</th>
                            <th class="py-4 px-6 font-semibold text-left">Payment Method</th>
                            <th class="py-4 px-6 font-semibold text-left">Salary Type</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-50">
                        @foreach ($user->compensation_history as $history)
                            <tr class="hover:bg-gray-50/50 transition-colors duration-200">
                                {{-- Date with subtle weight --}}
                                <td class="py-4 px-4 text-gray-600 font-medium">
                                    {{ $history->date }}
                                </td>

                                {{-- Reason with a slightly lighter color --}}
                                <td class="py-4 px-4 text-gray-500">
                                    {{ $history->reason }}
                                </td>

                                {{-- Amount highlighted in Cyan to match your theme --}}
                                <td class="py-4 px-4 font-bold text-cyan-600">
                                    RM {{ number_format($history->salary, 2) }}
                                </td>

                                {{-- Payment Method --}}
                                <td class="py-4 px-4 text-gray-600">
                                    <span class="px-2 py-1 bg-gray-100 rounded-md text-xs">
                                        {{ $history->payment }}
                                    </span>
                                </td>

                                {{-- Salary Type aligned right --}}
                                <td class="py-4 px-4 text-gray-500 text-left font-medium">
                                    {{ $history->salary_type }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 mt-10">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg font-bold text-gray-800 uppercase tracking-tight">Income Tax Information</h2>
                <button id="openTaxModal"
                    class="px-6 py-1.5 border border-cyan-500 text-cyan-500 rounded-md hover:bg-cyan-50 transition-colors text-sm font-medium">
                    Edit
                </button>
            </div>

            <div class="mb-8">
                <h3 class="text-sm font-bold text-gray-900 border-b-2 border-gray-900 inline-block mb-4 pb-0.5">
                    Income Tax Details
                </h3>

                <div class="grid grid-cols-2 gap-x-20 gap-y-3">
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-400">Pay Tax</span>
                            <span class="font-semibold text-gray-700">Yes</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Tax Borne By Employer</span>
                            <span class="font-semibold text-gray-700">No</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Spouse is Working</span>
                            <span class="font-semibold text-gray-700">No</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Spouse is Disabled</span>
                            <span class="font-semibold text-gray-700">No</span>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-400">Income Tax No.</span>
                            <span class="font-semibold text-gray-700">-</span>
                        </div>
                        <div class="flex justify-between items-center group relative">
                            <span class="text-gray-400">Malaysian Tax Resident</span>
                            <div class="flex items-center gap-1">
                                <span class="font-semibold text-gray-700">Yes</span>
                                <i class="fas fa-info-circle text-orange-400 text-xs"></i>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Disabled Person</span>
                            <span class="font-semibold text-gray-700">No</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">LHDNM State</span>
                            <span class="font-semibold text-gray-700">-</span>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-sm font-bold text-gray-900 border-b-2 border-gray-900 inline-block mb-4 pb-0.5">
                    Children
                </h3>

                <div class="grid grid-cols-2 gap-x-20 gap-y-3">
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-400">Children (Below 18 years)</span>
                            <span class="font-semibold text-gray-700">0</span>
                        </div>
                        <div class="flex justify-between text-left">
                            <span class="text-gray-400 w-2/3">Disabled Children in Tertiary Education (Above 18
                                years)</span>
                            <span class="font-semibold text-gray-700 w-1/3 text-right">0</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Deductible Child Relief Point</span>
                            <span class="font-semibold text-gray-700">0</span>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <div class="flex justify-between text-left">
                            <span class="text-gray-400 w-2/3">Children in Tertiary Education (Above 18 years)</span>
                            <span class="font-semibold text-gray-700 w-1/3 text-right">0</span>
                        </div>
                        <div class="flex justify-between text-left">
                            <span class="text-gray-400 w-2/3">Disabled Children (Below 18 years)</span>
                            <span class="font-semibold text-gray-700 w-1/3 text-right">0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="p-6 rounded-xl border border-gray-100 shadow-sm mt-10">
            <div class="flex items-center justify-between mb-8 border-b pb-4">
                <div class="flex items-center space-x-3">

                    <h2 class="text-lg font-bold text-gray-800 tracking-tight uppercase">Statutory Details</h2>
                </div>

                <button type="button" id="openTaxModal"
                    class="flex items-center space-x-2 px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-all shadow-sm">
                    <svg class="w-4 h-4 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                        </path>
                    </svg>
                    <span>Edit Information</span>
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-5 rounded-lg border-l-4 border-cyan-500 shadow-sm">
                    <h3 class="font-bold text-gray-900 mb-4">EPF Details</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between"><span class="text-gray-500">Pay EPF</span> <span
                                class="font-medium text-green-600">Yes</span></div>
                        <div class="flex justify-between"><span class="text-gray-500">Employee Rate</span> <span
                                class="font-bold text-cyan-600">11%</span></div>
                        <div class="flex justify-between"><span class="text-gray-500">Account No.</span> <span
                                class="font-medium">-</span></div>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-lg border-l-4 border-blue-500 shadow-sm">
                    <h3 class="font-bold text-gray-900 mb-4">SOCSO & EIS</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between"><span class="text-gray-500">Pay SOCSO</span> <span
                                class="font-medium text-green-600">Yes</span></div>
                        <div class="flex justify-between"><span class="text-gray-500">EIS Borne by Emp.</span> <span
                                class="font-medium">No</span></div>
                        <div class="flex justify-between"><span class="text-gray-500">SOCSO Acc.</span> <span
                                class="font-medium">-</span></div>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-lg border-l-4 border-emerald-500 shadow-sm">
                    <h3 class="font-bold text-gray-900 mb-4">Zakat & HRDF</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between"><span class="text-gray-500">Pay Zakat</span> <span
                                class="font-medium">RM 0</span></div>
                        <div class="flex justify-between"><span class="text-gray-500">Pay HRDF</span> <span
                                class="font-medium text-green-600">Yes</span></div>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-lg border-l-4 border-orange-400 shadow-sm lg:col-span-3">
                    <h3 class="font-bold text-gray-900 mb-4">PTPTN Details</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm bg-gray-50 p-4 rounded-md">
                        <div>
                            <p class="text-gray-400 text-xs font-bold uppercase">Monthly</p>
                            <p class="text-lg font-bold text-orange-600">RM 0</p>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs font-bold uppercase">Start Date</p>
                            <p class="font-medium">-</p>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs font-bold uppercase">End Date</p>
                            <p class="font-medium">-</p>
                        </div>
                    </div>
                </div>
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
                        <input type="date" name="effective_date" value="{{ $user->getDetail('effective_date') }}"
                            class="w-full border border-gray-200 rounded-lg p-2.5 focus:ring-cyan-500" value="2026-03-25">
                    </div>

                    {{-- Pay by Attendance --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Pay by Attendance</label>
                        <select name="pay_by_attendance"
                            class="w-full border border-gray-200 rounded-lg p-2.5 focus:ring-cyan-500">
                            <option value="No" {{ $user->getDetail('pay_by_attendance') == 'No' ? 'selected' : '' }}>
                                No
                            </option>
                            <option value="Yes" {{ $user->getDetail('pay_by_attendance') == 'Yes' ? 'selected' : '' }}>
                                Yes</option>
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
                        <input type="number" name="salary" value="{{ $user->getDetail('salary') }}"
                            class="w-full border border-gray-200 rounded-lg p-2.5" value="2600">
                    </div>

                    {{-- Salary Type --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Salary Type / Pay Interval</label>
                        <select name="salary_type"
                            class="w-full border border-gray-200 rounded-lg p-2.5 focus:ring-cyan-500">
                            <option value="Monthly" {{ $user->getDetail('salary_type') == 'Monthly' ? 'selected' : '' }}>
                                Monthly</option>
                            <option value="Daily" {{ $user->getDetail('salary_type') == 'Daily' ? 'selected' : '' }}>
                                Daily</option>
                        </select>
                    </div>

                    {{-- Reason --}}
                    <div class="col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Reason</label>
                        <textarea name="reason" placeholder="i.e. Promotion" class="w-full border border-gray-200 rounded-lg p-2.5 h-20">{{ $user->getDetail('reason') }}</textarea>
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

    <div id="incomeTaxModal" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" id="modalBackdrop"></div>

        <div class="relative flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-lg shadow-2xl w-full max-w-4xl overflow-hidden transform transition-all">

                <div class="flex justify-between items-center p-5 border-b bg-white sticky top-0 z-10">
                    <h2 class="text-lg font-bold text-gray-800 uppercase tracking-tight">Edit Income Tax Information</h2>
                    <button id="closeModalX" class="text-cyan-500 hover:text-cyan-600 border border-cyan-500 rounded p-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <form id="taxUpdateForm" class="p-8 space-y-8 max-h-[70vh] overflow-y-auto">
                    <div>
                        <h3 class="text-sm font-bold text-gray-900 border-b-2 border-gray-900 inline-block mb-6 pb-1">
                            Income Tax Details</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Pay Tax</label>
                                <select name="pay_tax"
                                    class="w-full border border-gray-300 rounded-md p-2.5 focus:ring-1 focus:ring-cyan-500 outline-none">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Malaysian Tax Resident</label>
                                <select name="tax_resident"
                                    class="w-full border border-gray-300 rounded-md p-2.5 focus:ring-1 focus:ring-cyan-500 outline-none">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-sm font-bold text-gray-900 border-b-2 border-gray-900 inline-block mb-6 pb-1">Child
                            Relief</h3>
                        <div class="border rounded-lg overflow-hidden">
                            <table class="w-full text-left border-collapse">
                                <thead class="bg-gray-200 text-gray-800">
                                    <tr>
                                        <th class="p-4 text-sm font-bold">Condition</th>
                                        <th class="p-4 text-sm font-bold text-center w-32">No. of Children 100%</th>
                                        <th class="p-4 text-sm font-bold text-center w-32">No. of Children 50%</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 text-sm">
                                    <tr>
                                        <td class="p-4">
                                            <p class="font-semibold text-gray-800">Children (Below 18 years old)</p>
                                            <p class="text-[11px] text-gray-400 mt-1 leading-tight">Same relief point as 18
                                                years and above and studying (included certificate/matriculation)</p>
                                        </td>
                                        <td class="p-4"><input type="number" value="0"
                                                class="w-full border rounded p-1.5 text-center"></td>
                                        <td class="p-4"><input type="number" value="0"
                                                class="w-full border rounded p-1.5 text-center"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>

                <div class="flex justify-end space-x-3 p-5 border-t bg-gray-50">
                    <button type="button" id="cancelBtn"
                        class="px-8 py-2 border border-gray-300 rounded-md text-gray-600 hover:bg-gray-50 font-semibold transition-colors">Cancel</button>
                    <button type="submit" form="taxUpdateForm"
                        class="px-8 py-2 bg-cyan-500 text-white rounded-md hover:bg-cyan-600 font-semibold shadow-md transition-colors">Save
                        Changes</button>
                </div>
            </div>
        </div>
    </div>


    <div id="taxModal" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
        <div id="modalBackdrop" class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>

        <div class="relative flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-lg shadow-2xl w-full max-w-4xl overflow-hidden transform transition-all">

                <div class="flex justify-between items-center p-5 border-b">
                    <h2 class="text-lg font-bold text-gray-800 uppercase tracking-tight">Edit Income Tax Information</h2>

                </div>

                <form id="taxUpdateForm" class="p-8 space-y-8 max-h-[70vh] overflow-y-auto">
                    <div>
                        <h3 class="text-sm font-bold text-gray-900 border-b-2 border-gray-900 inline-block mb-6 pb-1">
                            Income Tax Details</h3>
                        <div class="grid grid-cols-2 gap-x-10 gap-y-6 text-sm">
                            <div class="flex flex-col">
                                <label class="font-bold text-gray-700 mb-2">Pay Tax</label>
                                <select
                                    class="border border-gray-300 rounded-md p-2 outline-none focus:ring-1 focus:ring-cyan-500">
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </div>
                            <div class="flex flex-col">
                                <label class="font-bold text-gray-700 mb-2">Malaysian Tax Resident</label>
                                <select
                                    class="border border-gray-300 rounded-md p-2 outline-none focus:ring-1 focus:ring-cyan-500">
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </div>
                            <div class="flex flex-col">
                                <label class="font-bold text-gray-700 mb-2">Tax Borneo By Employee</label>
                                <select
                                    class="border border-gray-300 rounded-md p-2 outline-none focus:ring-1 focus:ring-cyan-500">
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </div>
                            <div class="flex flex-col">
                                <label class="font-bold text-gray-700 mb-2">Disabled person</label>
                                <select
                                    class="border border-gray-300 rounded-md p-2 outline-none focus:ring-1 focus:ring-cyan-500">
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </div>
                            <div class="flex flex-col">
                                <label class="font-bold text-gray-700 mb-2">Spouse is working</label>
                                <select
                                    class="border border-gray-300 rounded-md p-2 outline-none focus:ring-1 focus:ring-cyan-500">
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </div>
                            <div class="flex flex-col">
                                <label class="font-bold text-gray-700 mb-2">Income Tax Number</label>
                                <select
                                    class="border border-gray-300 rounded-md p-2 outline-none focus:ring-1 focus:ring-cyan-500">
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </div>
                            <div class="flex flex-col">
                                <label class="font-bold text-gray-700 mb-2">Spouse is Disabled</label>
                                <select
                                    class="border border-gray-300 rounded-md p-2 outline-none focus:ring-1 focus:ring-cyan-500">
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </div>
                            <div class="flex flex-col">
                                <label class="font-bold text-gray-700 mb-2">LHDNM State</label>
                                <select
                                    class="border border-gray-300 rounded-md p-2 outline-none focus:ring-1 focus:ring-cyan-500">
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-sm font-bold text-gray-900 border-b-2 border-gray-900 inline-block mb-4 pb-1">Child
                            Relief</h3>
                        <div class="border rounded-lg overflow-hidden">
                            <table class="w-full text-left text-sm">
                                <thead class="bg-gray-100 text-gray-800 font-bold">
                                    <tr>
                                        <th class="p-4">Condition</th>
                                        <th class="p-4 text-center w-32">100%</th>
                                        <th class="p-4 text-center w-32">50%</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    <tr>
                                        <td class="p-4">
                                            <p class="font-semibold">Children (Below 18 years old)</p>
                                            <p class="text-[10px] text-gray-400 mt-1 leading-tight">Same relief point as 18
                                                years and above and studying...</p>
                                        </td>
                                        <td class="p-4 text-center"><input type="number" value="0"
                                                class="w-20 border rounded p-1 text-center"></td>
                                        <td class="p-4 text-center"><input type="number" value="0"
                                                class="w-20 border rounded p-1 text-center"></td>
                                    </tr>
                                    <tr>
                                        <td class="p-4">
                                            <p class="font-semibold">Disabled Children (Below 18 years old)</p>

                                        </td>
                                        <td class="p-4 text-center"><input type="number" value="0"
                                                class="w-20 border rounded p-1 text-center"></td>
                                        <td class="p-4 text-center"><input type="number" value="0"
                                                class="w-20 border rounded p-1 text-center"></td>
                                    </tr>
                                    <tr>
                                        <td class="p-4">
                                            <p class="font-semibold">Children in Tertiary Education (Above 18 years old)
                                            </p>

                                        </td>
                                        <td class="p-4 text-center"><input type="number" value="0"
                                                class="w-20 border rounded p-1 text-center"></td>
                                        <td class="p-4 text-center"><input type="number" value="0"
                                                class="w-20 border rounded p-1 text-center"></td>
                                    </tr>
                                    <tr>
                                        <td class="p-4">
                                            <p class="font-semibold">Disabled Children in Tertiary Education(Above 18 years
                                                old)</p>

                                        </td>
                                        <td class="p-4 text-center"><input type="number" value="0"
                                                class="w-20 border rounded p-1 text-center"></td>
                                        <td class="p-4 text-center"><input type="number" value="0"
                                                class="w-20 border rounded p-1 text-center"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>

                <div class="flex justify-end space-x-3 p-5 border-t bg-gray-50">
                    <button type="button" id="closeTaxModal"
                        class="px-8 py-2 border rounded-md text-gray-600 hover:bg-gray-100 font-semibold transition-colors">Cancel</button>
                    <button type="submit" form="taxUpdateForm"
                        class="px-8 py-2 bg-cyan-500 text-white rounded-md hover:bg-cyan-600 font-semibold shadow-md transition-colors">Save
                        Changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
