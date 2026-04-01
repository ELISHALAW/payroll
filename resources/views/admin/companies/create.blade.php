@extends('output.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4 bg-gray-800 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-white">Register New Company</h2>
            <a href="{{ route('admin.companies.index') }}" class="text-gray-400 hover:text-white text-sm">
                &larr; Back to List
            </a>
        </div>

        <form action="{{ route('admin.companies.store') }}" method="POST" class="p-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                {{-- Company Name --}}
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Company Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" 
                        class="mt-1 block w-full border @error('name') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                {{-- Registration No (SSM) --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Registration No (SSM)</label>
                    <input type="text" name="registration_no" value="{{ old('registration_no') }}" 
                        class="mt-1 block w-full border @error('registration_no') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm p-2">
                    @error('registration_no') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                {{-- SST No --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">SST No (Optional)</label>
                    <input type="text" name="sst_no" value="{{ old('sst_no') }}" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm p-2">
                </div>

                {{-- Address --}}
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Full Address</label>
                    <textarea name="address" rows="3" 
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">{{ old('address') }}</textarea>
                </div>

                {{-- City --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">City</label>
                    <input type="text" name="city" value="{{ old('city') }}" 
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>

                {{-- Postcode --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Postcode</label>
                    <input type="text" name="postcode" value="{{ old('postcode') }}" 
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>

                {{-- State --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">State</label>
                    <select name="state" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        <option value="">Select State</option>
                        @foreach(['Selangor', 'Kuala Lumpur', 'Johor', 'Penang', 'Perak', 'Pahang', 'Negeri Sembilan', 'Melaka', 'Kedah', 'Terengganu', 'Kelantan', 'Perlis', 'Sabah', 'Sarawak', 'Labuan', 'Putrajaya'] as $state)
                            <option value="{{ $state }}" {{ old('state') == $state ? 'selected' : '' }}>{{ $state }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Country --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Country</label>
                    <input type="text" name="country" value="{{ old('country', 'Malaysia') }}" 
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 bg-gray-50">
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full bg-gray-900 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded transition duration-200">
                    Create Company
                </button>
            </div>
        </form>
    </div>
</div>
@endsection