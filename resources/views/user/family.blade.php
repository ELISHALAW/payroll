@php
    use Carbon\Carbon;
    use App\Models\UserDetail;
@endphp
@extends('output.layout')

@section('content')
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100 bg-gray-50/30">
                <h3 class="text-lg font-bold text-gray-800 uppercase tracking-wider flex items-center">
                    <span class="w-1.5 h-5 bg-cyan-500 rounded-full mr-2"></span>
                    Family Members Details
                </h3>
                <a href="#family-member-modal"
                    class="border border-cyan-500 text-cyan-600 hover:bg-cyan-50 px-4 py-2 rounded-lg text-xs font-bold transition-all flex items-center">
                    <span class="text-lg mr-1 leading-none">+</span> Add a family member
                </a>
            </div>
            <div class="divide-y divide-gray-100">
                @forelse($familyMembers as $family)
                    <div class="p-8 hover:bg-gray-50/50 transition-colors">
                        <div class="flex flex-col lg:flex-row lg:items-center justify-between">

                            <div class="flex items-center space-x-6 min-w-[220px]">
                                <div
                                    class="w-12 h-12 bg-cyan-100 text-cyan-600 rounded-full flex items-center justify-center font-bold text-xs shadow-sm">
                                    {{ strtoupper(substr($family->name, 0, 1)) }}
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-gray-900 leading-tight">{{ $family->name }}</h4>
                                    <span
                                        class="text-xs font-bold uppercase text-cyan-500 tracking-tight">{{ $family->relationship }}</span>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 md:grid-cols-4 gap-x-12 gap-y-6 flex-grow mt-6 lg:mt-0 lg:ml-12">
                                <div class="flex flex-col">
                                    <span
                                        class="text-[10px] uppercase font-bold text-gray-400 tracking-widest">Birthday</span>
                                    <span class="text-xs font-semibold text-gray-700">{{ $family->dob }}</span>
                                </div>

                                <div class="flex flex-col">
                                    <span
                                        class="text-[10px] uppercase font-bold text-gray-400 tracking-widest">Nationality</span>
                                    <span class="text-xs font-semibold text-gray-700">{{ $family->nationality }}</span>
                                </div>

                                <div class="flex flex-col">
                                    <span class="text-[10px] uppercase font-bold text-gray-400 tracking-widest">Phone</span>
                                    <span class="text-xs font-semibold text-gray-700">{{ $family->phone }}</span>
                                </div>

                                <div class="flex flex-col">
                                    <span class="text-[10px] uppercase font-bold text-gray-400 tracking-widest">NRIC</span>
                                    <span class="text-xs font-semibold text-gray-700">{{ $family->nric }}</span>
                                </div>
                            </div>

                            <div class="flex items-center justify-end">
                                <div class="relative inline-block text-left">

                                    <button id="menuButton"
                                        class="p-2 text-cyan-600 bg-gray-50 rounded-lg hover:bg-gray-100 transition-all focus:outline-none">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                        </svg>
                                    </button>

                                    <div id="dropdownMenu"
                                        class="hidden absolute left-full top-0 ml-2 w-48 bg-white rounded-xl shadow-2xl border border-gray-100 z-[100] overflow-hidden transform opacity-0 -translate-x-2 transition-all duration-200 origin-left">
                                        <div class="py-1">
                                            <a href="#"
                                                class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-cyan-50 hover:text-cyan-600 transition-colors border-b border-gray-50">
                                                <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                                Edit Record
                                            </a>

                                            <form action="#" method="POST">
                                                <button type="submit"
                                                    class="flex items-center w-full text-left px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                                    <svg class="w-4 h-4 mr-3 text-red-400" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                    Delete Record
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-8 text-gray-400 italic text-sm bg-gray-50/20 text-center">
                        No family records found...
                    </div>
                @endforelse
            </div>
        </div>

        <div
            class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden mt-8 items-center justify-center sm:p-6 lg:p-8">
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100 bg-gray-50/30">
                <h3 class="text-lg font-bold text-gray-800 uppercase tracking-wider flex items-center">
                    <span class="w-1.5 h-5 bg-cyan-500 rounded-full mr-2"></span>
                    Next of Kin
                </h3>
                <button id="btn-edit-nok"
                    class="border border-cyan-500 text-cyan-600 hover:bg-cyan-50 px-8 py-2 rounded-lg text-sm font-bold transition-all">
                    Edit
                </button>
            </div>

            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-8 gap-x-12">
                    <div class="flex items-center">
                        <span class="w-32 text-gray-400 font-medium text-sm">Full Name</span>
                        <span class="text-gray-700 font-semibold">{{ $user->getDetail('nok_name') }}</span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-32 text-gray-400 font-medium text-sm">Relationship</span>
                        <span class="text-gray-700 font-semibold">{{ $user->getDetail('nok_relationship') }}</span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-32 text-gray-400 font-medium text-sm">Phone Number</span>
                        <span class="text-gray-700 font-semibold">{{ $user->getDetail('nok_phone') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="family-member-modal"
        class="hidden target:flex fixed inset-0 z-50 overflow-y-auto items-center justify-center p-4">
        <a href="#" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm cursor-default"></a>
        <div
            class="relative bg-white w-full max-w-4xl rounded-2xl shadow-2xl border border-gray-100 overflow-hidden transform transition-all">
            <div class="flex items-center justify-between px-8 py-5 border-b border-gray-100">
                <h3 class="text-xl font-bold text-gray-800 uppercase tracking-tight">Family Member Details</h3>
                <a href="#"
                    class="text-cyan-500 border-2 border-cyan-500 rounded-lg p-1 hover:bg-cyan-50 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </a>
            </div>

            <form action="{{ route('user.updateFamilyDetails', $user->id) }}" method="POST" class="p-10">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-8">
                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-gray-900">Relationship</label>
                        <select name="relationship"
                            class="w-full px-4 py-3 bg-white border border-gray-300 rounded-xl text-gray-500 focus:ring-4 focus:ring-cyan-500/10 focus:border-cyan-500 outline-none transition-all">
                            <option value="">Select Relationship</option>
                            <option value="Children">Children</option>
                            <option value="Spouse">Spouse</option>
                            <option value="Parents">Parents</option>
                            <option value="Siblings">Siblings</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-gray-900">Name</label>
                        <input type="text" placeholder="i.e. Jared" name="family_name"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl placeholder-gray-300 focus:ring-4 focus:ring-cyan-500/10 focus:border-cyan-500 outline-none transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-gray-900">Nationality</label>
                        <select name="family_nationality"
                            class="w-full px-4 py-3 bg-white border border-gray-300 rounded-xl text-gray-500 focus:ring-4 focus:ring-cyan-500/10 focus:border-cyan-500 outline-none transition-all">
                            @foreach ($countries as $country)
                                <option value="{{ $country['country_name'] }}">
                                    {{ $user->getDetail('family_nationality') == $country['country_name'] ? 'selected' : '' }}
                                    {{ $country['country_name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-gray-900">Date of Birth</label>
                        <input type="date" name="family_dob"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl text-gray-700 focus:ring-4 focus:ring-cyan-500/10 focus:border-cyan-500 outline-none transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-gray-900">Phone</label>
                        <input type="text" placeholder="i.e. 012-5664334" name="family_phone"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl placeholder-gray-300 focus:ring-4 focus:ring-cyan-500/10 focus:border-cyan-500 outline-none transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-gray-900">NRIC / Passport No.</label>
                        <input type="text" placeholder="i.e. 911010-10-1010" name="family_nric"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl placeholder-gray-300 focus:ring-4 focus:ring-cyan-500/10 focus:border-cyan-500 outline-none transition-all">
                    </div>
                </div>

                <div class="flex justify-end items-center mt-12 space-x-4">
                    <a href="#"
                        class="px-12 py-3 border border-gray-300 rounded-xl text-gray-500 font-bold hover:bg-gray-50 transition-all">Cancel</a>
                    <button type="submit"
                        class="px-12 py-3 bg-cyan-500 text-white rounded-xl font-bold hover:bg-cyan-600 shadow-lg shadow-cyan-200 transition-all">Add</button>
                </div>
            </form>
        </div>
    </div>




    <div id="edit-nok-modal"
        class="hidden target:flex fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 sm:p-6 lg:p-8">

        <a href="#" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm cursor-default"></a>

        <div
            class="relative bg-white w-full max-w-2xl rounded-2xl shadow-2xl border border-gray-100 overflow-hidden transition-all m-auto">

            <div class="flex items-center justify-between px-8 py-6 border-b border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 uppercase tracking-tight">Next of Kin</h3>
                <a href="#" id="btn-close-edit-nok"
                    class="text-cyan-500 border-2 border-cyan-500 rounded-lg p-1 hover:bg-cyan-50 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </a>
            </div>

            <form action="{{ route('user.updateNextOfKin', $user->id) }}" method="POST" class="p-10">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-8">

                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-gray-900">Full Name</label>
                        <input type="text" name="nok_name" placeholder="Edit Name"
                            value="{{ $user->getDetail('nok_name') }}"
                            class="w-full px-4 py-3.5 border border-gray-200 rounded-xl placeholder-gray-300 focus:ring-4 focus:ring-cyan-500/10 focus:border-cyan-500 outline-none transition-all">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-gray-900">Phone Number</label>
                        <input type="text" name="nok_phone" placeholder="Edit Phone Number"
                            value="{{ $user->getDetail('nok_phone') }}"
                            class="w-full px-4 py-3.5 border border-gray-200 rounded-xl placeholder-gray-300 focus:ring-4 focus:ring-cyan-500/10 focus:border-cyan-500 outline-none transition-all">
                    </div>

                    <div class="space-y-2 md:col-span-1">
                        <label class="block text-sm font-bold text-gray-900">Relationship</label>
                        <div class="relative">
                            <select name="nok_relationship"
                                class="w-full px-4 py-3.5 bg-white border border-gray-200 rounded-xl text-gray-400 focus:ring-4 focus:ring-cyan-500/10 focus:border-cyan-500 outline-none appearance-none transition-all">
                                <option value="Spouse"
                                    {{ $user->getDetail('nok_relationship') === 'Spouse' ? 'selected' : '' }}>i.e. Spouse
                                </option>
                                <option value="parent"
                                    {{ $user->getDetail('nok_relationship') === 'parent' ? 'selected' : '' }}>Parent
                                </option>
                                <option value="sibling"
                                    {{ $user->getDetail('nok_relationship') === 'sibling' ? 'selected' : '' }}>Sibling
                                </option>
                            </select>
                            <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end items-center mt-12 space-x-4">
                    <a href="#" id="btn-cancel-edit-nok"
                        class="px-10 py-3 border border-gray-300 rounded-xl text-gray-500 font-bold hover:bg-gray-50 transition-all">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-12 py-3 bg-gray-100 text-gray-400 rounded-xl font-bold hover:bg-cyan-500 hover:text-white transition-all">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
