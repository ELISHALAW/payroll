@php
    use Carbon\Carbon;
@endphp
@extends('output.layout')

@section('content')
    <div class="max-w-6xl mx-auto p-6 space-y-8 bg-gray-50/50 min-h-screen">

        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            <div class="px-8 py-6 flex justify-between items-center border-b border-gray-50">
                <h3 class="text-lg font-extrabold text-slate-800 uppercase tracking-tight">
                    Employee Documents
                </h3>
                <button
                    class="bg-[#00bcd4] hover:bg-[#00acc1] text-white px-5 py-2 rounded-lg text-sm font-bold shadow-md transition-all active:scale-95">
                    Buy Premium HRIS
                </button>
            </div>

            <div class="p-12 flex flex-col items-center justify-center text-center">
                <div class="mb-4 text-slate-800">
                    <svg class="w-16 h-16 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </div>
                <h4 class="text-xl font-bold text-slate-800 mb-1">No Documents Yet</h4>
                <p class="text-slate-400 text-sm">Keep your info up to date by uploading new documents here</p>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            <div class="px-8 py-6 flex justify-between items-center border-b border-gray-50">
                <h3 class="text-lg font-extrabold text-slate-800 uppercase tracking-tight">
                    Company Assets
                </h3>
                <button id="open-company-asset-modal"
                    class="flex items-center space-x-2 border border-[#00bcd4] text-[#00bcd4] px-4 py-1.5 rounded-lg text-sm font-bold hover:bg-cyan-50 transition-colors">
                    <span>+</span>
                    <span>Add</span>
                </button>
            </div>

            <div class="px-8 py-4 flex justify-between items-center bg-gray-50/30 border-b border-gray-100">
                <div class="flex items-center space-x-2">
                    <button class="p-2 border border-gray-200 rounded text-gray-500 hover:bg-white">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-4 text-xs font-medium text-slate-500">
                    <div class="flex items-center space-x-2">
                        <span>Page size:</span>
                        <select class="border border-gray-200 rounded px-2 py-1 outline-none">
                            <option>10</option>
                        </select>
                    </div>
                    <span>1 - 1 of 1</span>
                    <div class="flex space-x-1">
                        <button
                            class="px-2 py-1 border border-gray-100 rounded text-gray-300 pointer-events-none">&lt;</button>
                        <button class="px-2 py-1 bg-[#00bcd4] text-white rounded font-bold">1</button>
                        <button
                            class="px-2 py-1 border border-gray-100 rounded text-gray-300 pointer-events-none">&gt;</button>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-100 border-b border-gray-200">
                        <tr>
                            <th class="px-8 py-4 text-[11px] font-bold text-slate-600 uppercase tracking-wider">Asset type
                            </th>
                            <th class="px-8 py-4 text-[11px] font-bold text-slate-600 uppercase tracking-wider">Asset
                                details</th>
                            <th class="px-8 py-4 text-[11px] font-bold text-slate-600 uppercase tracking-wider">Date
                                received</th>
                            <th class="px-8 py-4 text-[11px] font-bold text-slate-600 uppercase tracking-wider">Date
                                released</th>
                            <th class="px-8 py-4 w-10"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($assets as $asset)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-8 py-4 text-sm font-medium text-slate-700">{{ $asset->asset_type }}</td>
                                <td class="px-8 py-4 text-sm text-slate-500">{{ $asset->asset_details }}</td>
                                <td class="px-8 py-4 text-sm text-slate-500">
                                    {{ Carbon::parse($asset->date_received)->format('d-m-Y') }}</td>
                                <td class="px-8 py-4 text-sm text-slate-500">
                                    {{ Carbon::parse($asset->date_released)->format('d-m-Y') }}</td>
                                <td class="px-8 py-4">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('user.document.editDocument', $asset->id) }}"
                                            class="text-cyan-500 hover:bg-cyan-50 p-1.5 rounded-lg transition-colors flex items-center justify-center"
                                            title="Edit Asset">
                                            &#128221;
                                        </a>
                                        <button
                                            class="text-red-500 hover:bg-red-50 p-1.5 rounded-lg transition-colors flex items-center justify-center"
                                            title="Delete">
                                            &#x1F5D1;
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <div id="new-asset-modal"
        class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/40 backdrop-blur-sm">
        <div class="relative bg-white w-full max-w-lg rounded-xl shadow-2xl overflow-hidden border border-gray-100">

            <div class="flex items-center justify-between px-6 py-5">
                <h3 class="text-[15px] font-black text-[#1a2b3c] uppercase tracking-wide">
                    New Company Asset
                </h3>
                <button id="close-company-asset-modal"
                    class="w-8 h-8 flex items-center justify-center rounded-lg border-2 border-cyan-500 text-cyan-500 hover:bg-cyan-50 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form action="{{ route('user.createCompanyAsset', $user->id) }}" method="POST" class="px-6 pb-6 space-y-4">
                @csrf

                <div class="space-y-1.5">
                    <label class="block text-[13px] font-bold text-gray-800">Asset Type</label>
                    <input type="text" name="asset_type" placeholder="i.e. MacBook Air"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm placeholder-gray-300 focus:ring-2 focus:ring-cyan-500/20 focus:border-cyan-500 outline-none transition-all">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-1.5">
                        <label class="block text-[13px] font-bold text-gray-800">Date Received</label>
                        <div class="relative">
                            <input type="date" name="date_received" value="March 31, 2026"
                                class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700 bg-white">
                        </div>
                    </div>
                    <div class="space-y-1.5">
                        <label class="block text-[13px] font-bold text-gray-800">Date Released</label>
                        <div class="relative group">
                            <input type="date" name="date_released" value="March 31, 2026"
                                class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700 bg-white">

                        </div>
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-[13px] font-bold text-gray-800">Asset Details</label>
                    <textarea name="asset_details" placeholder="i.e. Company Laptop" rows="3"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm placeholder-gray-300 focus:ring-2 focus:ring-cyan-500/20 focus:border-cyan-500 outline-none transition-all resize-none"></textarea>
                </div>

                <div class="flex justify-end items-center space-x-3 pt-4">
                    <button type="button" id="btn-cancel-new-asset"
                        class="px-6 py-2.5 text-sm font-bold text-gray-400 border border-gray-200 rounded-lg hover:bg-gray-50 transition-all">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-10 py-2.5 bg-[#00bcd4] text-white text-sm font-bold rounded-lg shadow-sm hover:bg-cyan-600 transition-all">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
