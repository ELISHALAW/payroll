@extends('output.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
        {{-- Header --}}
        <div class="px-6 py-4 bg-gradient-to-r from-blue-600 to-indigo-700 flex justify-between items-center">
            <div>
                <h2 class="text-xl font-bold text-white">Edit Company Details</h2>
                <p class="text-blue-100 text-xs mt-1">Modifying: {{ $company->name }}</p>
            </div>
            <a href="{{ route('companies.index') }}" class="bg-white/20 hover:bg-white/30 text-white px-3 py-1 rounded-md text-sm transition">
                &larr; Cancel
            </a>
        </div>

        {{-- Form --}}
        <form action="{{ route('companies.update', $company->id) }}" method="POST" class="p-8 space-y-6">
            @csrf
            @method('PUT') {{-- 关键：HTML表单不支持PUT，必须手动指定 --}}

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Company Name --}}
                <div class="col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Company Name</label>
                    <input type="text" name="name" value="{{ old('name', $company->name) }}" required
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-2.5">
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Registration No --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Registration No (SSM)</label>
                    <input type="text" name="registration_no" value="{{ old('registration_no', $company->registration_no) }}" required
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 p-2.5 bg-gray-50">
                    @error('registration_no') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- SST No --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">SST No (Optional)</label>
                    <input type="text" name="sst_no" value="{{ old('sst_no', $company->sst_no) }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 p-2.5">
                </div>

                {{-- Full Address --}}
                <div class="col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Business Address</label>
                    <textarea name="address" rows="3" required
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 p-2.5">{{ old('address', $company->address) }}</textarea>
                </div>

                {{-- City --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">City</label>
                    <input type="text" name="city" value="{{ old('city', $company->city) }}" required
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 p-2.5">
                </div>

                {{-- Postcode --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Postcode</label>
                    <input type="text" name="postcode" value="{{ old('postcode', $company->postcode) }}" required
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 p-2.5">
                </div>

                {{-- State --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">State</label>
                    <select name="state" required class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 p-2.5">
                        @foreach(['Selangor', 'Kuala Lumpur', 'Johor', 'Penang', 'Perak', 'Pahang', 'Negeri Sembilan', 'Melaka', 'Kedah', 'Terengganu', 'Kelantan', 'Perlis', 'Sabah', 'Sarawak'] as $state)
                            <option value="{{ $state }}" {{ old('state', $company->state) == $state ? 'selected' : '' }}>
                                {{ $state }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Country --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Country</label>
                    <input type="text" name="country" value="{{ old('country', $company->country) }}" required
                        class="w-full border-gray-300 rounded-lg shadow-sm p-2.5 bg-gray-100 cursor-not-allowed" readonly>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-100">
                <button type="reset" class="text-gray-500 hover:text-gray-700 font-medium">Reset Changes</button>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2.5 px-8 rounded-lg shadow-md transition transform hover:-translate-y-0.5">
                    Update Company
                </button>
            </div>
        </form>
    </div>
</div>
@endsection