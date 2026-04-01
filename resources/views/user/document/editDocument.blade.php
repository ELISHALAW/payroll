@extends('output.layout')

@section('content')
    <div class="max-w-4xl mx-auto py-10 px-4">
        <div class="mb-6">
            <a href="{{ route('user.document', $user->id) }}"
                class="text-sm text-cyan-600 hover:text-cyan-700 font-bold flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Assets
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <div class="flex items-center justify-between px-8 py-6 bg-slate-50 border-b border-gray-100">
                <h3 class="text-lg font-black text-[#1a2b3c] uppercase tracking-wide">
                    Update Company Asset
                </h3>
            </div>

            <form id="update-asset-form" method="POST" action="{{ route('user.updateCompanyAsset', $user->id) }}"
                class="px-8 py-8 space-y-6">
                @csrf
                @method('PUT')

                <div class="space-y-2">
                    <label class="block text-sm font-bold text-gray-800">Asset Type</label>
                    <input type="text" name="asset_type" value="{{ $user->getDetail('asset_type') }}"
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm text-gray-700 focus:ring-2 focus:ring-cyan-500 focus:border-transparent outline-none transition-all">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-gray-800">Date Received</label>
                        <input type="date" name="date_received" value="{{ $user->getDetail('date_received') }}"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm text-gray-700 focus:ring-2 focus:ring-cyan-500 outline-none">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-gray-800">Date Released</label>
                        <input type="date" name="date_released" value="{{ $user->getDetail('date_released') ?? '' }}"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm text-gray-700 focus:ring-2 focus:ring-cyan-500 outline-none">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-bold text-gray-800">Asset Details</label>
                    <textarea name="asset_details" rows="5"
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm text-gray-700 focus:ring-2 focus:ring-cyan-500 outline-none resize-none">{{ $user->getDetail('asset_details') }}</textarea>
                </div>

                <div class="flex justify-end items-center space-x-4 pt-6 border-t border-gray-50">
                    <a href="{{ route('user.document', $user->id) }}"
                        class="px-8 py-3 text-sm font-bold text-gray-500 hover:text-gray-700 hover:bg-gray-50 rounded-lg transition-all">
                        Cancel
                    </a>

                    <button type="submit"
                        class="px-12 py-3 bg-[#00bcd4] hover:bg-cyan-600 text-white text-sm font-bold rounded-lg shadow-lg shadow-cyan-500/20 transform active:scale-95 transition-all duration-200">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
