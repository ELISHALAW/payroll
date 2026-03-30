@extends('output.layout')

@section('content')
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 mt-6 px-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg font-bold text-gray-800 uppercase tracking-tight">Entitlements</h2>
            </div>

            <div class="space-y-6">
                <div class="flex items-center justify-between group">
                    <div class="space-y-1">
                        <p class="text-sm font-bold text-gray-900">Annual Leave</p>
                        <p class="text-xs text-gray-400 uppercase tracking-wider">Paid Time Off</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="text-right">
                            <span class="text-lg font-bold text-cyan-600">{{ $user->getDetail('days_taken') }}</span>
                            <span class="text-sm text-gray-400">/ 8 available</span>
                        </div>
                        <button id="btn-open-edit"
                            class="p-2 text-gray-300 hover:text-cyan-500 transition-colors flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <hr class="border-gray-50">

                <div class="flex items-center justify-between group">
                    <div class="space-y-1">
                        <p class="text-sm font-bold text-gray-900">Hospitalization</p>
                        <p class="text-xs text-gray-400 uppercase tracking-wider">Medical Leave</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="text-right">
                            <span
                                class="text-lg font-bold text-gray-700">{{ $user->getDetail('hospitalization_days') ?? 0 }}</span>
                            <span class="text-sm text-gray-400">/ 60 available</span>
                        </div>
                        <button id="btn-open-hosp"
                            class="p-2 text-gray-300 hover:text-cyan-500 transition-colors flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <hr class="border-gray-50">

                <div class="flex items-center justify-between group">
                    <div class="space-y-1">
                        <p class="text-sm font-bold text-gray-900">Sick Leave</p>
                        <p class="text-xs text-gray-400 uppercase tracking-wider">Outpatient Leave</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="text-right">
                            <span
                                class="text-lg font-bold text-gray-700">{{ $user->getDetail('sick_days_taken') ?? 0 }}</span>
                            <span class="text-sm text-gray-400">/ 14 available</span>
                        </div>
                        <button id="btn-open-sick"
                            class="p-2 text-gray-300 hover:text-cyan-500 transition-colors flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="edit-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 px-4">

        <div class="w-full max-w-md bg-white rounded-lg shadow-xl overflow-hidden">

            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
                <h3 class="text-sm font-bold text-gray-700 uppercase tracking-wider">EDIT Annual</h3>
                <button id="btn-x-close" type="button"
                    class="text-gray-400 hover:text-cyan-500 border border-gray-200 rounded p-1 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <form id="payroll-edit-form" action="{{ route('user.updateDaysTaken', $user->id) }}" method="POST"
                class="p-6">
                @csrf
                <div class="mb-6">
                    <label for="days_taken" class="block text-sm font-medium text-gray-600 mb-2">
                        Update Days Taken
                    </label>
                    <div class="relative">
                        <input type="number" name="days_taken" id="days_taken" step="1" min="0"
                            value="{{ $user->getDetail('days_taken') ?? 0 }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-cyan-500 focus:border-cyan-500 outline-none text-gray-700 transition-all"
                            value="1">
                    </div>
                </div>

                <div class="flex justify-end items-center space-x-3">
                    <button type="button" id="btn-close-modal"
                        class="px-5 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded hover:bg-gray-50 transition-colors">
                        Cancel
                    </button>
                    <button type="submit" id="btn-confirm-update"
                        class="px-5 py-2 text-sm font-medium text-blue-600 bg-blue-50 rounded hover:bg-blue-100 transition-colors">
                        Confirm Update
                    </button>
                </div>
            </form>
        </div>
    </div>



    <div id="hospitalization-modal"
        class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 px-4">
        <div class="w-full max-w-lg bg-white rounded-lg shadow-2xl overflow-hidden">

            <div class="flex items-center justify-between px-6 py-4">
                <h3 class="text-lg font-bold text-gray-800">EDIT Hospitalization</h3>
                <button id="close-hosp-modal" type="button"
                    class="text-gray-400 hover:text-cyan-500 border-2 border-cyan-500 rounded-lg p-1 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <form id="hospitalization-form" method="POST"
                action="{{ route('user.updateHospitalizationDays', $user->id) }}">
                @csrf
                <div class="px-6 pb-6">
                    <label for="hosp_days_input" class="block text-base font-medium text-gray-700 mb-4">
                        Update Days Taken
                    </label>

                    <input type="number" id="hosp_days_input" name="hosp_days_taken" step="1" min="0"
                        max="60"
                        class="w-full px-4 py-3 border border-gray-200 rounded-md focus:ring-1 focus:ring-cyan-500 focus:border-cyan-500 outline-none text-gray-700 text-lg transition-all"
                        value="{{ $user->getDetail('hospitalization_days') ?? 0 }}" min="0" required>

                    <div class="flex justify-end items-center mt-8 space-x-3">
                        <button type="button" id="btn-cancel-hospitalization"
                            class="px-6 py-2.5 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                            Cancel
                        </button>
                        <button type="submit" id="btn-confirm-hospitalization"
                            class="px-6 py-2.5 text-sm font-medium text-white bg-cyan-600 rounded-md hover:bg-cyan-700 transition-colors">
                            Confirm Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>




    <div id="sick-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 px-4">
        <div class="w-full max-w-lg bg-white rounded-lg shadow-2xl overflow-hidden">

            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-50">
                <h3 class="text-lg font-bold text-gray-800">EDIT Sick</h3>
                <button id="close-sick-modal" type="button"
                    class="text-gray-400 hover:text-cyan-500 border-2 border-cyan-500 rounded-lg p-1 transition-colors focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <form id="sick-form" method="POST" action="{{ route('user.updateSickDays', $user->id) }}">
                @csrf
                <div class="px-6 py-6">
                    <label for="sick_days_input" class="block text-base font-medium text-gray-700 mb-4">
                        Update Days Taken
                    </label>

                    <input type="number" id="sick_days_input" name="sick_days_taken" step="1" min="0"
                        max="14"
                        class="w-full px-4 py-3 border border-gray-200 rounded-md focus:ring-1 focus:ring-cyan-500 focus:border-cyan-500 outline-none text-gray-700 text-lg transition-all"
                        value="{{ $user->getDetail('sick_days_taken') ?? 0 }}" required>

                    <div class="flex justify-end items-center mt-8 space-x-3">
                        <button type="button" id="btn-cancel-sick"
                            class="px-6 py-2.5 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                            Cancel
                        </button>
                        <button type="submit" id="btn-confirm-sick"
                            class="px-6 py-2.5 text-sm font-medium text-white bg-cyan-600 rounded-md hover:bg-cyan-700 transition-colors shadow-sm">
                            Confirm Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
