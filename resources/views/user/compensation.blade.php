@php 
    use Carbon\Carbon;
@endphp

@extends('output.layout')

@section('content')
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm relative mb-6">
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
        <div class="bg-white rounded-xl border border-gray-200 p-8 shadow-sm">
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
                                class="w-1/2 font-semibold">{{ Carbon::parse($user->getDetail('effective_date'))->format('d-M-Y') }}</span>
                        </div>
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


        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 mt-10">
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
                            <span class="font-semibold text-gray-700">{{ $user->getDetail('pay_tax') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Tax Borne By Employer</span>
                            <span class="font-semibold text-gray-700">{{ $user->getDetail('tax_borne_exployer') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Spouse is Working</span>
                            <span class="font-semibold text-gray-700">{{ $user->getDetail('spouse_working') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Spouse is Disabled</span>
                            <span class="font-semibold text-gray-700">{{ $user->getDetail('spouse_disabled') }}</span>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-400">Income Tax No.</span>
                            <span class="font-semibold text-gray-700">{{ $user->getDetail('income_tax_no') }}</span>
                        </div>
                        <div class="flex justify-between items-center group relative">
                            <span class="text-gray-400">Malaysian Tax Resident</span>
                            <div class="flex items-center gap-1">
                                <span class="font-semibold text-gray-700">{{ $user->getDetail('tax_resident') }}</span>
                                <i class="fas fa-info-circle text-orange-400 text-xs"></i>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Disabled Person</span>
                            <span class="font-semibold text-gray-700">{{ $user->getDetail('disabled_person') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">LHDNM State</span>
                            <span class="font-semibold text-gray-700">{{ $user->getDetail('LHDNM_state') }}</span>
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
                            <span class="font-semibold text-gray-700">{{ $totalChildrenUnder18 }}</span>
                        </div>
                        <div class="flex justify-between text-left">
                            <span class="text-gray-400 w-2/3">Disabled Children in Tertiary Education (Above 18
                                years)</span>
                            <span
                                class="font-semibold text-gray-700 w-1/3 text-right">{{ $totalChildrenOver18EduDisabled }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Deductible Child Relief Point</span>
                            <span class="font-semibold text-gray-700">{{ $reliefPoints }}</span>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <div class="flex justify-between text-left">
                            <span class="text-gray-400 w-2/3">Children in Tertiary Education (Above 18 years)</span>
                            <span
                                class="font-semibold text-gray-700 w-1/3 text-right">{{ $totalChildrenOver18Edu }}</span>
                        </div>
                        <div class="flex justify-between text-left">
                            <span class="text-gray-400 w-2/3">Disabled Children (Below 18 years)</span>
                            <span
                                class="font-semibold text-gray-700 w-1/3 text-right">{{ $totalDisabledChildrenUnder18 }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="p-6 rounded-xl border border-gray-2 00 shadow-sm mt-10">
            <div class="flex items-center justify-between mb-8 border-b pb-4">
                <div class="flex items-center space-x-3">

                    <h2 class="text-lg font-bold text-gray-800 tracking-tight uppercase">Statutory Details</h2>
                </div>

                <button type="button" id="openTaxesModal"
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
                                class="font-medium text-green-600">{{ $user->getDetail('pay_epf') ? 'Yes' : 'No' }}</span>
                        </div>
                        <div class="flex justify-between"><span class="text-gray-500">EPF Borne by Employer</span> <span
                                class="font-bold text-cyan-600">{{ $user->getDetail('epf_borne_employer') ? 'Yes' : 'No' }}</span>
                        </div>
                        <div class="flex justify-between"><span class="text-gray-500">EPF Account No.</span> <span
                                class="font-medium">{{ $user->getDetail('epf_no') }}</span></div>
                        <div class="flex justify-between"><span class="text-gray-500">Extra EPF On Top of Normal Employer
                                EPF</span> <span class="font-medium">{{ $user->getDetail('extra_epf_employer') }}</span>
                        </div>
                        <div class="flex justify-between"><span class="text-gray-500">Extra EPF On Top of Normal Employer
                                EPF</span> <span class="font-medium">{{ $user->getDetail('extra_epf_employee') }}</span>
                        </div>
                        <div class="flex justify-between"><span class="text-gray-500">EPF Employee Rate
                                EPF</span> <span class="font-medium">{{ $user->epf_rate * 100 }}%</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-lg border-l-4 border-blue-500 shadow-sm">
                    <h3 class="font-bold text-gray-900 mb-4">SOCSO & EIS</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between"><span class="text-gray-500">Pay SOCSO</span> <span
                                class="font-medium text-green-600">{{ $user->getDetail('pay_socso') == 1 ? 'Yes' : 'No' }}</span>
                        </div>
                        <div class="flex justify-between"><span class="text-gray-500">EIS Borne by Emp.</span> <span
                                class="font-medium">{{ $user->getDetail('socso_borne_employer') == 1 ? 'Yes' : 'No' }}</span>
                        </div>
                        <div class="flex justify-between"><span class="text-gray-500">SOCSO Acc.</span> <span
                                class="font-medium">{{ $user->getDetail('socso_no') }}</span></div>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-lg border-l-4 border-emerald-500 shadow-sm">
                    <h3 class="font-bold text-gray-900 mb-4">Zakat & HRDF</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between"><span class="text-gray-500">Pay Zakat</span> <span
                                class="font-medium">{{ $user->getDetail('zakat_amount') }}</span></div>
                        <div class="flex justify-between"><span class="text-gray-500">Pay HRDF</span> <span
                                class="font-medium text-green-600">{{ $user->getDetail('pay_hrdf') == 1 ? 'Yes' : 'No' }}</span>
                        </div>
                        <div class="flex justify-between"><span class="text-gray-500">Zakar Account</span> <span
                                class="font-medium">{{ $user->getDetail('zakat_no') }}</span></div>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-lg border-l-4 border-orange-400 shadow-sm lg:col-span-3">
                    <h3 class="font-bold text-gray-900 mb-4">PTPTN Details</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm bg-gray-50 p-4 rounded-md">
                        <div>
                            <p class="text-gray-400 text-xs font-bold uppercase">Monthly</p>
                            <p class="text-lg font-bold text-orange-600">RM {{ $user->getDetail('ptptn_amount') }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs font-bold uppercase">Start Date</p>
                            <p class="text-lg font-bold text-orange-600">{{ Carbon::parse($user->getDetail('ptptn_start'))->format('d-M-Y') }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs font-bold uppercase">End Date</p>
                            <p class="text-lg font-bold text-orange-600">{{ Carbon::parse($user->getDetail('ptptn_end'))->format('d-M-Y') }}</p>
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
                    <button type="button" id="closeModalX"
                        class="text-gray-400 hover:text-gray-600 transition-all p-2 rounded-full hover:bg-gray-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <form id="taxUpdateForm" method="POST" action="{{ route('user.updateIncomeTax', $user->id) }}"
                    class="p-8 space-y-8 max-h-[70vh] overflow-y-auto">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div>
                        <h3 class="text-sm font-bold text-gray-900 border-b-2 border-gray-900 inline-block mb-6 pb-1">
                            Income Tax Details</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Pay Tax</label>
                                <select name="pay_tax"
                                    class="w-full border border-gray-300 rounded-md p-2.5 focus:ring-1 focus:ring-cyan-500 outline-none">
                                    <option value="Yes" {{ $user->getDetail('pay_tax') == 'Yes' ? 'selected' : '' }}>
                                        Yes</option>
                                    <option value="No" {{ $user->getDetail('pay_tax') == 'No' ? 'selected' : '' }}>No
                                    </option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Malaysian Tax Resident</label>
                                <select name="tax_resident"
                                    class="w-full border border-gray-300 rounded-md p-2.5 focus:ring-1 focus:ring-cyan-500 outline-none">
                                    <option value="Yes"
                                        {{ $user->getDetail('tax_resident') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No"
                                        {{ $user->getDetail('tax_resident') == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Tax Borne By Employer</label>
                                <select name="tax_borne_exployer"
                                    class="w-full border border-gray-300 rounded-md p-2.5 focus:ring-1 focus:ring-cyan-500 outline-none">
                                    <option value="Yes"
                                        {{ $user->getDetail('tax_borne_employer') == 'Yes' ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="No"
                                        {{ $user->getDetail('tax_borne_employer') == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Disabled Person</label>
                                <select name="disabled_person"
                                    class="w-full border border-gray-300 rounded-md p-2.5 focus:ring-1 focus:ring-cyan-500 outline-none">
                                    <option value="Yes"
                                        {{ $user->getDetail('disabled_person') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No"
                                        {{ $user->getDetail('disabled_person') == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Spouse is working</label>
                                <select name="spouse_working"
                                    class="w-full border border-gray-300 rounded-md p-2.5 focus:ring-1 focus:ring-cyan-500 outline-none">
                                    <option value="Yes"
                                        {{ $user->getDetail('spouse_working') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No"
                                        {{ $user->getDetail('spouse_working') == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Income Tax No.</label>
                                <div
                                    class="flex border border-gray-300 rounded-md overflow-hidden focus-within:ring-1 focus-within:ring-cyan-500">
                                    <select name="tax_no"
                                        class="bg-gray-50 border-r border-gray-300 px-3 py-2.5 text-sm text-gray-600 outline-none cursor-pointer">
                                        <option value="IG" {{ $user->getDetail('tax_no') == 'IG' ? 'selected' : '' }}>
                                            IG</option>
                                        <option value="OG" {{ $user->getDetail('tax_no') == 'OG' ? 'selected' : '' }}>
                                            OG</option>
                                        <option value="SG" {{ $user->getDetail('tax_no') == 'SG' ? 'selected' : '' }}>
                                            SG</option>
                                    </select>

                                    <input type="text" name="income_tax_no" placeholder="i.e. IG12345678901"
                                        class="w-full p-2.5 text-sm outline-none placeholder-gray-300"
                                        value="{{ $user->getDetail('income_tax_no') }}">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Spouse is Disabled</label>
                                <select name="spouse_disabled"
                                    class="w-full border border-gray-300 rounded-md p-2.5 focus:ring-1 focus:ring-cyan-500 outline-none">
                                    <option value="Yes"
                                        {{ $user->getDetail('spouse_disabled') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No"
                                        {{ $user->getDetail('spouse_disabled') == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">LHDNM State</label>
                                <select name="LHDNM_state"
                                    class="w-full border border-gray-300 rounded-md p-2.5 focus:ring-1 focus:ring-cyan-500 outline-none">
                                    <option value="Yes"
                                        {{ $user->getDetail('LHDNM_state') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No"
                                        {{ $user->getDetail('LHDNM_state') == 'No' ? 'selected' : '' }}>No</option>
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
                                        <td class="p-4"><input type="number" name="child_under_18_full"
                                                value="{{ $user->getDetail('child_under_18_full') }}"
                                                class="w-full border rounded p-1.5 text-center"></td>
                                        <td class="p-4"><input type="number" name="child_under_18_half"
                                                value="{{ $user->getDetail('child_under_18_half') }}"
                                                class="w-full border rounded p-1.5 text-center"></td>
                                    </tr>
                                    <tr>
                                        <td class="p-4">
                                            <p class="font-semibold text-gray-800">Disabled Children(Below 18 years old)
                                            </p>
                                        </td>
                                        <td class="p-4"><input type="number"
                                                value="{{ $user->getDetail('disabled_child_under_18_full') }}"
                                                name="disabled_child_under_18_full"
                                                class="w-full border rounded p-1.5 text-center"></td>
                                        <td class="p-4"><input type="number"
                                                value="{{ $user->getDetail('disabled_child_under_18_half') }}"
                                                name="disabled_child_under_18_half"
                                                class="w-full border rounded p-1.5 text-center"></td>
                                    </tr>
                                    <tr>
                                        <td class="p-4">
                                            <p class="font-semibold text-gray-800">Children in Tertiary Education(Above 18
                                                years old)</p>

                                        </td>
                                        <td class="p-4"><input type="number"
                                                value="{{ $user->getDetail('child_over_18_edu_full') }}"
                                                name="child_over_18_edu_full"
                                                class="w-full border rounded p-1.5 text-center"></td>
                                        <td class="p-4"><input type="number"
                                                value="{{ $user->getDetail('child_over_18_edu_half') }}"
                                                name="child_over_18_edu_half"
                                                class="w-full border rounded p-1.5 text-center"></td>
                                    </tr>
                                    <tr>
                                        <td class="p-4">
                                            <p class="font-semibold text-gray-800">Disabled Children in Tertiary Education
                                                (Below 18 years old)</p>
                                        </td>
                                        <td class="p-4"><input type="number"
                                                value="{{ $user->getDetail('disabled_child_over_18_edu_full') }}"
                                                name="disabled_child_over_18_edu_full"
                                                class="w-full border rounded p-1.5 text-center"></td>
                                        <td class="p-4"><input type="number"
                                                value="{{ $user->getDetail('disabled_child_over_18_edu_half') }}"
                                                name="disabled_child_over_18_edu_half"
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




    <div id="statutory-modal-container" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
        <div id="statutory-modal-backdrop"
            class="fixed inset-0 bg-gray-900 bg-opacity-60 backdrop-blur-sm transition-opacity"></div>

        <div class="relative flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl overflow-hidden transform transition-all">

                <div class="flex justify-between items-center p-6 border-b bg-gray-50">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800 uppercase tracking-tight">Edit Statutory Details</h2>
                        <p class="text-xs text-gray-500 mt-1">Update employee contributions and account numbers.</p>
                    </div>
                    <button type="button" id="statutory-modal-x"
                        class="text-gray-400 hover:text-gray-600 p-2 rounded-full hover:bg-gray-100 transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <form action="{{ route('user.updateStatutory', $user->id) }}" method="POST" id="statutory-form"
                    class="p-8 space-y-10 max-h-[70vh] overflow-y-auto">
                    @csrf

                    <section>
                        <div class="flex items-center space-x-2 mb-6 border-b border-cyan-100 pb-2">
                            <span class="w-2 h-6 bg-cyan-500 rounded-full"></span>
                            <h3 class="font-bold text-gray-800 uppercase text-sm tracking-wider">EPF Details</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-6">
                            <div class="flex flex-col">
                                <label class="text-xs font-bold text-gray-600 mb-3">Pay EPF</label>
                                <div class="flex items-center space-x-6">
                                    <label class="flex items-center space-x-2 cursor-pointer group">
                                        <input type="radio" name="pay_epf" value="1"
                                            class="w-4 h-4 text-cyan-600 focus:ring-cyan-500"
                                            {{ $user->getDetail('pay_epf') == 1 ? 'checked' : '' }}>
                                        <span class="text-sm font-medium text-gray-700">Yes</span>
                                    </label>
                                    <label class="flex items-center space-x-2 cursor-pointer group">
                                        <input type="radio" name="pay_epf" value="0"
                                            class="w-4 h-4 text-cyan-600 focus:ring-cyan-500"
                                            {{ $user->getDetail('pay_epf') == 0 ? 'checked' : '' }}>
                                        <span class="text-sm font-medium text-gray-700">No</span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex flex-col">
                                <label class="text-xs font-bold text-gray-600 mb-3">EPF Borne by Employer</label>
                                <div class="flex items-center space-x-6">
                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="radio" name="epf_borne_employer" value="1"
                                            class="w-4 h-4 text-cyan-600"
                                            {{ $user->getDetail('epf_borne_employer') == 1 ? 'checked' : '' }}>
                                        <span class="text-sm font-medium text-gray-700">Yes</span>
                                    </label>
                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="radio" name="epf_borne_employer" value="0"
                                            class="w-4 h-4 text-cyan-600"
                                            {{ $user->getDetail('epf_borne_employer') == 0 ? 'checked' : '' }}>
                                        <span class="text-sm font-medium text-gray-700">No</span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex flex-col">
                                <label class="text-xs font-bold text-gray-600 mb-2">EPF Account Number</label>
                                <input type="text" name="epf_no" value="{{ $user->getDetail('epf_no') }}"
                                    placeholder="EPF number can only contain numeric values"
                                    class="border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-cyan-500 outline-none text-sm">
                            </div>

                            <div class="flex flex-col">
                                <label class="text-xs font-bold text-gray-600 mb-2">Extra EPF On Top Of Normal
                                    Employer</label>
                                <input type="number" name="extra_epf_employer"
                                    value="{{ $user->getDetail('extra_epf_employer') ?? 0 }}"
                                    class="border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-cyan-500 outline-none text-sm">
                            </div>

                            <div class="flex flex-col md:col-span-2">
                                <label class="text-xs font-bold text-gray-600 mb-2">Extra EPF On Top Of Normal Employee
                                    EPF</label>
                                <input type="number" name="extra_epf_employee"
                                    value="{{ $user->getDetail('extra_epf_employee') ?? 0 }}"
                                    class=" border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-cyan-500 outline-none text-sm">
                            </div>

                        </div>
                    </section>

                    <section>
                        <div class="flex items-center space-x-2 mb-6 border-b border-blue-100 pb-2">
                            <span class="w-2 h-6 bg-blue-500 rounded-full"></span>
                            <h3 class="font-bold text-gray-800 uppercase text-sm tracking-wider">SOCSO Details</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-6">
                            <div class="flex flex-col">
                                <label class="text-xs font-bold text-gray-600 mb-3">Pay SOCSO</label>
                                <div class="flex items-center space-x-6">
                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="radio" name="pay_socso" value="1"
                                            class="w-4 h-4 text-blue-600"
                                            {{ $user->getDetail('pay_socso') == 1 ? 'checked' : '' }}>
                                        <span class="text-sm font-medium text-gray-700">Yes</span>
                                    </label>
                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="radio" name="pay_socso" value="0"
                                            class="w-4 h-4 text-blue-600"
                                            {{ $user->getDetail('pay_socso') == 0 ? 'checked' : '' }}>
                                        <span class="text-sm font-medium text-gray-700">No</span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex flex-col">
                                <label class="text-xs font-bold text-gray-600 mb-3">SOCSO Borne By Employer</label>
                                <div class="flex items-center space-x-6">
                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="radio" name="socso_borne_employer" value="1"
                                            class="w-4 h-4 text-blue-600"
                                            {{ $user->getDetail('socso_borne_employer') == 1 ? 'checked' : '' }}>
                                        <span class="text-sm font-medium text-gray-700">Yes</span>
                                    </label>
                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="radio" name="socso_borne_employer" value="0"
                                            class="w-4 h-4 text-blue-600"
                                            {{ $user->getDetail('socso_borne_employer') == 0 ? 'checked' : '' }}>
                                        <span class="text-sm font-medium text-gray-700">No</span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex flex-col md:col-span-2">
                                <label class="text-xs font-bold text-gray-600 mb-2">SOCSO Account No.</label>
                                <input type="text" name="socso_no" value="{{ $user->getDetail('socso_no') }}"
                                    placeholder="e.g. 910304119999"
                                    class="border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 outline-none text-sm">
                            </div>
                        </div>
                    </section>

                    <section>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                            <div>
                                <div class="flex items-center space-x-2 mb-6 border-b border-emerald-100 pb-2">
                                    <span class="w-2 h-6 bg-emerald-500 rounded-full"></span>
                                    <h3 class="font-bold text-gray-800 uppercase text-sm tracking-wider">Zakat Details</h3>
                                </div>
                                <div class="space-y-4">
                                    <div class="flex flex-col">
                                        <label class="text-xs font-bold text-gray-600 mb-2">Pay Zakat (Monthly RM)</label>
                                        <input type="number" name="zakat_amount" step="0.01"
                                            value="{{ $user->getDetail('zakat_amount') ?? 0 }}"
                                            class="border border-gray-300 rounded-lg p-2.5 text-sm">
                                    </div>
                                    <div class="flex flex-col">
                                        <label class="text-xs font-bold text-gray-600 mb-2">Zakat Account No.</label>
                                        <input type="text" name="zakat_no"
                                            value="{{ $user->getDetail('zakat_no') }}" placeholder="e.g. 0040001024999"
                                            class="border border-gray-300 rounded-lg p-2.5 text-sm">
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-10">
                                <div>
                                    <div class="flex items-center space-x-2 mb-4 border-b border-gray-100 pb-2">
                                        <h3 class="font-bold text-gray-800 uppercase text-sm">EIS Details</h3>
                                    </div>
                                    <label class="text-xs font-bold text-gray-600 mb-3 block">EIS Borne by Employer</label>
                                    <div class="flex items-center space-x-6">
                                        <label class="flex items-center space-x-2 cursor-pointer">
                                            <input type="radio" name="eis_borne_employer" value="1"
                                                class="w-4 h-4"
                                                {{ $user->getDetail('eis_borne_employer') == 1 ? 'checked' : '' }}>
                                            <span class="text-sm">Yes</span>
                                        </label>
                                        <label class="flex items-center space-x-2 cursor-pointer">
                                            <input type="radio" name="eis_borne_employer" value="0"
                                                class="w-4 h-4"
                                                {{ $user->getDetail('eis_borne_employer') == 0 ? 'checked' : '' }}>
                                            <span class="text-sm">No</span>
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex items-center space-x-2 mb-4 border-b border-gray-100 pb-2">
                                        <h3 class="font-bold text-gray-800 uppercase text-sm">HRDF Details</h3>
                                    </div>
                                    <label class="text-xs font-bold text-gray-600 mb-3 block">Pay HRDF</label>
                                    <div class="flex items-center space-x-6">
                                        <label class="flex items-center space-x-2 cursor-pointer">
                                            <input type="radio" name="pay_hrdf" value="1" class="w-4 h-4"
                                                {{ $user->getDetail('pay_hrdf') == 1 ? 'checked' : '' }}>
                                            <span class="text-sm">Yes</span>
                                        </label>
                                        <label class="flex items-center space-x-2 cursor-pointer">
                                            <input type="radio" name="pay_hrdf" value="0" class="w-4 h-4"
                                                {{ $user->getDetail('pay_hrdf') == 0 ? 'checked' : '' }}>
                                            <span class="text-sm">No</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="bg-orange-50 p-6 rounded-xl border border-orange-100">
                        <div class="flex items-center space-x-2 mb-6 border-b border-orange-200 pb-2">
                            <span class="w-2 h-6 bg-orange-400 rounded-full"></span>
                            <h3 class="font-bold text-gray-800 uppercase text-sm tracking-wider">PTPTN Repayment</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="flex flex-col">
                                <label class="text-xs font-bold text-gray-600 mb-2">Monthly Amount (RM)</label>
                                <input type="number" name="ptptn_amount" step="0.01"
                                    value="{{ $user->getDetail('ptptn_amount') ?? 0 }}"
                                    class="border border-gray-300 rounded-lg p-2.5 text-sm bg-white">
                            </div>
                            <div class="flex flex-col">
                                <label class="text-xs font-bold text-gray-600 mb-2">Start Date</label>
                                <input type="date" name="ptptn_start" value="{{ $user->getDetail('ptptn_start') }}"
                                    class="border border-gray-300 rounded-lg p-2.5 text-sm bg-white">
                            </div>
                            <div class="flex flex-col">
                                <label class="text-xs font-bold text-gray-600 mb-2">End Date</label>
                                <input type="date" name="ptptn_end" value="{{ $user->getDetail('ptptn_end') }}"
                                    class="border border-gray-300 rounded-lg p-2.5 text-sm bg-white">
                            </div>
                        </div>
                    </section>
                </form>

                <div class="flex justify-end items-center space-x-4 p-6 border-t bg-gray-50">
                    <button type="button" id="statutory-modal-cancel"
                        class="px-6 py-2.5 text-sm font-bold text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition-all">Discard
                        Changes</button>
                    <button type="submit" form="statutory-form"
                        class="px-10 py-2.5 bg-cyan-600 text-white rounded-lg font-bold text-sm shadow-lg shadow-cyan-100 hover:bg-cyan-700 active:scale-95 transition-all">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
