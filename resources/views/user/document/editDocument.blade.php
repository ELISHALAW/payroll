@php
    use Carbon\Carbon;
@endphp
@extends('output.layout')

@section('content')
    <div
        class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden bg-slate-900/40 backdrop-blur-sm p-4">

        <div class="relative w-full max-w-4xl animate-in fade-in zoom-in duration-300">

            <div class="mb-4">
                <a href="{{ route('user.document', $user->id) }}"
                    class="text-sm text-white drop-shadow-md hover:text-cyan-200 font-bold flex items-center inline-flex">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back to Assets
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-2xl overflow-hidden border border-gray-100">
                <div class="flex items-center justify-between px-8 py-6 bg-slate-50 border-b border-gray-100">
                    <h3 class="text-lg font-black text-[#1a2b3c] uppercase tracking-wide">
                        Update Company Asset
                    </h3>
                    <a href="{{ route('user.document', $user->id) }}" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M6 18L18 6M6 6l12 12" stroke-width="2"></path>
                        </svg>
                    </a>
                </div>

                {{-- Action points to the update route and sends record id for group update --}}
                <form id="update-asset-form" method="POST" action="{{ route('user.updateCompanyAsset', $asset->id) }}"
                    class="px-8 py-8 space-y-6">
                    @csrf

                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-gray-800">Asset Type</label>
                        <input type="text" name="asset_type" value="{{ $asset->asset_type }}"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm text-gray-700 focus:ring-2 focus:ring-cyan-500 outline-none">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-800">Date Received</label>
                            <input type="date" name="date_received" value="{{ $asset->date_received }}"
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm text-gray-700 focus:ring-2 focus:ring-cyan-500 outline-none">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-800">Date Released</label>
                            <input type="date" name="date_released" value="{{ $asset->date_released }}"
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm text-gray-700 focus:ring-2 focus:ring-cyan-500 outline-none">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-gray-800">Asset Details</label>
                        <textarea name="asset_details" rows="5"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm text-gray-700 focus:ring-2 focus:ring-cyan-500 outline-none resize-none">{{ $asset->asset_details }}</textarea>
                    </div>

                    <div class="flex justify-end items-center space-x-4 pt-6">
                        <button type="submit"
                            class="px-12 py-3 bg-[#00bcd4] hover:bg-cyan-600 text-white text-sm font-bold rounded-lg shadow-lg">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
