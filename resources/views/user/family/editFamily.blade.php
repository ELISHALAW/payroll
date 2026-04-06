@extends('output.layout')

@section('content')
    <div id="family-member-modal" class="fixed inset-0 z-[100] flex items-center justify-center p-4 overflow-y-auto">

        <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-md transition-opacity"></div>

        <div
            class="relative bg-white w-full max-w-4xl rounded-2xl shadow-2xl border border-gray-100 overflow-hidden transform transition-all">

            <div class="flex items-center justify-between px-8 py-5 border-b border-gray-100">
                <h3 class="text-xl font-bold text-gray-800 uppercase tracking-tight">Family Member Details</h3>
                <a href="{{ url()->previous() }}"
                    class="text-cyan-500 border-2 border-cyan-500 rounded-lg p-1 hover:bg-cyan-50 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </a>
            </div>

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700">
                    <p class="font-bold">Please fix the following errors:</p>
                    <ul class="list-disc ml-5 mt-1 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('user.family.updateFamily', $familyMember->id) }}" method="POST" class="p-10">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-8">

                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-gray-900">Relationship</label>
                        <select name="relationship"
                            class="w-full px-4 py-3 bg-white border border-gray-300 rounded-xl text-gray-700 focus:ring-4 focus:ring-cyan-500/10 focus:border-cyan-500 outline-none transition-all">
                            <option value="">Select Relationship</option>
                            <option value="Children"
                                {{ ($familyMember->relationship ?? '') == 'Children' ? 'selected' : '' }}>Children</option>
                            <option value="Spouse" {{ ($familyMember->relationship ?? '') == 'Spouse' ? 'selected' : '' }}>
                                Spouse</option>
                            <option value="Parents"
                                {{ ($familyMember->relationship ?? '') == 'Parents' ? 'selected' : '' }}>Parents</option>
                            <option value="Siblings"
                                {{ ($familyMember->relationship ?? '') == 'Siblings' ? 'selected' : '' }}>Siblings</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-gray-900">Name</label>
                        <input type="text" name="family_name" placeholder="i.e. Jared"
                            value="{{ $familyMember->family_name ?? '' }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl placeholder-gray-300 focus:ring-4 focus:ring-cyan-500/10 focus:border-cyan-500 outline-none transition-all">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-gray-900">Nationality</label>
                        <select name="family_nationality"
                            class="w-full px-4 py-3 bg-white border border-gray-300 rounded-xl text-gray-700 focus:ring-4 focus:ring-cyan-500/10 focus:border-cyan-500 outline-none transition-all">
                            <option value="Malaysia"
                                {{ ($familyMember->family_nationality ?? '') == 'Malaysia' ? 'selected' : '' }}>Malaysia
                            </option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-gray-900">Date of Birth</label>
                        <input type="date" name="family_dob" value="{{ $familyMember->family_dob ?? '' }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl text-gray-700 focus:ring-4 focus:ring-cyan-500/10 focus:border-cyan-500 outline-none transition-all">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-gray-900">Phone</label>
                        <input type="number" name="family_phone" placeholder="i.e. 012-5664334"
                            value="{{ $familyMember->family_phone ?? '' }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl placeholder-gray-300 focus:ring-4 focus:ring-cyan-500/10 focus:border-cyan-500 outline-none transition-all">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-gray-900">NRIC / Passport No.</label>
                        <input type="text" name="family_nric" placeholder="i.e. 911010-10-1010"
                            value="{{ $familyMember->family_nric ?? '' }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl placeholder-gray-300 focus:ring-4 focus:ring-cyan-500/10 focus:border-cyan-500 outline-none transition-all">
                    </div>
                </div>

                <div class="flex justify-end items-center mt-12 space-x-4">
                    <a href="{{ url()->previous() }}"
                        class="px-12 py-3 border border-gray-300 rounded-xl text-gray-500 font-bold hover:bg-gray-50 transition-all">Cancel</a>
                    <button type="submit"
                        class="px-12 py-3 bg-cyan-500 text-white rounded-xl font-bold hover:bg-cyan-600 shadow-lg shadow-cyan-200 transition-all">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
