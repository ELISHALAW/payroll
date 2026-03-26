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
                            <span class="text-lg font-bold text-cyan-600">7</span>
                            <span class="text-sm text-gray-400">/ 8 available</span>
                        </div>
                        <button
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
                            <span class="text-lg font-bold text-gray-700">60</span>
                            <span class="text-sm text-gray-400">/ 60 available</span>
                        </div>
                        <button
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
                            <span class="text-lg font-bold text-gray-700">14</span>
                            <span class="text-sm text-gray-400">/ 14 available</span>
                        </div>
                        <button
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
@endsection
