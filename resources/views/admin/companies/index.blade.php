@extends('output.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-xl font-bold text-gray-800">Company Management</h1>
        <a href="{{ route('companies.create') }}" class="bg-gray-900 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded transition duration-200 text-xs">
            + Add New Company
        </a>
    </div>

    {{-- Success/Error Messages --}}
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr class="bg-gray-100 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider ">
                    <th class="px-5 py-3">Actions</th>
                    <th class="px-5 py-3">Company Name</th>
                    <th class="px-5 py-3">Reg No (SSM)</th>
                    <th class="px-5 py-3">Location</th>
                    <th class="px-5 py-3">SST No</th>
                </tr>
            </thead>
            <tbody>
                @forelse($companies as $company)
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition duration-150">
                        <td class="py-4 px-4">
                            <div class="flex items-center space-x-3">
                                <a href="{{ route('companies.edit', $company->id) }}" title="Edit" class="hover:scale-110 transition-transform">
                                    <span class="text-xs">&#128270;</span>
                                </a>
                                
                                <form action="{{ route('companies.destroy', $company->id) }}" method="POST" onsubmit="return confirm('Confirm Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Delete" class="hover:scale-110 transition-transform">
                                        <span class="text-xs">&#10060;</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                        <td class="px-5 py-5 text-sm">
                            <p class="text-gray-900 whitespace-no-wrap font-medium">{{ $company->name }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $company->registration_no }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm">
                            <p class="text-gray-600">{{ $company->city }}, {{ $company->state }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm">
                            <span class="px-3 py-1 font-semibold text-blue-900 bg-blue-100 rounded-full text-xs">
                                {{ $company->sst_no ?? 'N/A' }}
                            </span>
                        </td>
                        
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-5 py-10 text-center text-gray-500 italic">
                            No companies found. Click "Add New Company" to get started.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection