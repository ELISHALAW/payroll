@extends('output.layout')

@section('content')
    <div class="max-w-5xl mx-auto py-10 px-4">

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="px-8 py-6 flex justify-between items-center border-b border-gray-50">
                <h2 class="text-xl font-extrabold text-gray-800 tracking-tight">EMAIL ADDRESS</h2>

                {{-- Edit 按钮：点击触发 toggleModal() --}}
                <button type="button" id="editEmailModal"
                    class="px-5 py-1.5 border border-cyan-500 text-cyan-500 rounded-md text-sm font-bold hover:bg-cyan-50 transition-colors">
                    Edit
                </button>
            </div>
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-6">

                    <div class="space-y-6">
                        <div class="flex justify-between items-start">
                            <span class="text-gray-400 text-sm w-1/2">Email</span>
                            <span class="text-gray-900 text-sm font-medium w-1/2">{{ $user->email }}</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        {{-- 1. 展示卡片 (PERSONAL INFO) --}}
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">

            {{-- 卡片头部 --}}
            <div class="px-8 py-6 flex justify-between items-center border-b border-gray-50">
                <h2 class="text-xl font-extrabold text-gray-800 tracking-tight">PERSONAL INFO</h2>

                {{-- Edit 按钮：点击触发 toggleModal() --}}
                <button type="button" id="openEditModal"
                    class="px-5 py-1.5 border border-cyan-500 text-cyan-500 rounded-md text-sm font-bold hover:bg-cyan-50 transition-colors">
                    Edit
                </button>
            </div>

            {{-- 信息展示区域 --}}
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-6">

                    {{-- 左侧列 --}}
                    <div class="space-y-6">
                        <div class="flex justify-between items-start">
                            <span class="text-gray-400 text-sm w-1/2">Official Full Name</span>
                            <span class="text-gray-900 text-sm font-medium w-1/2">{{ $user->name }}</span>
                        </div>

                        <div class="flex justify-between items-start">
                            <span class="text-gray-400 text-sm w-1/2">Preferred Name</span>
                            <span class="text-gray-900 text-sm font-medium w-1/2">{{ $user->name }}</span>
                        </div>

                        <div class="flex justify-between items-start">
                            <span class="text-gray-400 text-sm w-1/2">Phone Number</span>
                            <span
                                class="text-gray-900 text-sm font-medium w-1/2">{{ $user->phone ?? '+601133903509' }}</span>
                        </div>

                        <div class="flex justify-between items-start">
                            <span class="text-gray-400 text-sm w-1/2">Gender</span>
                            <span class="text-gray-900 text-sm font-medium w-1/2">Male</span>
                        </div>
                    </div>

                    {{-- 右侧列 --}}
                    <div class="space-y-6">
                        <div class="flex justify-between items-start">
                            <span class="text-gray-400 text-sm w-1/2">Passport No.</span>
                            <span
                                class="text-gray-900 text-sm font-medium w-1/2">{{ $user->getDetail('Passport No.') }}</span>
                        </div>

                        <div class="flex justify-between items-start">
                            <span class="text-gray-400 text-sm w-1/2">NRIC No.</span>
                            <span class="text-gray-900 text-sm font-medium w-1/2">{{ $user->getDetail('NRIC No.') }}</span>
                        </div>

                        <div class="flex justify-between items-start">
                            <span class="text-gray-400 text-sm w-1/2">Highest Qualification</span>
                            <span
                                class="text-gray-900 text-sm font-medium w-1/2">{{ $user->getDetail('Highest Qualification') }}</span>
                        </div>

                        <div class="flex justify-between items-start">
                            <span class="text-gray-400 text-sm w-1/2">Marital Status</span>
                            <span
                                class="text-gray-900 text-sm font-medium w-1/2">{{ $user->getDetail('Marital Status') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mt-6">
            {{-- Card Header --}}
            <div class="px-6 py-5 border-b border-gray-50 flex justify-between items-center">
                <h3 class="text-xl font-extrabold uppercase tracking-wider text-gray-900">
                    Permanent Address
                </h3>
                <button id="openAddressModal"
                    class="px-5 py-1.5 border border-cyan-500 text-cyan-500 rounded-md text-sm font-bold hover:bg-cyan-50 transition-colors">
                    Edit
                </button>
            </div>

            {{-- Card Body --}}
            <div class="px-6 py-6">
                <div class="space-y-4">
                    {{-- Address Row --}}
                    <div class="grid grid-cols-2 gap-4">
                        <span class="text-sm font-medium text-gray-400">Permanent address</span>
                        <span class="text-sm text-gray-600">{{ $user->getDetail('address') }}</span>
                    </div>

                    {{-- City Row --}}
                    <div class="grid grid-cols-2 gap-4">
                        <span class="text-sm font-medium text-gray-400">City</span>
                        <span class="text-sm text-gray-600">{{ $user->getDetail('city') }}</span>
                    </div>

                    {{-- Postcode Row --}}
                    <div class="grid grid-cols-2 gap-4">
                        <span class="text-sm font-medium text-gray-400">Postcode</span>
                        <span class="text-sm text-gray-600">{{ $user->getDetail('postcode') }}</span>
                    </div>

                    {{-- Region Row --}}
                    <div class="grid grid-cols-2 gap-4">
                        <span class="text-sm font-medium text-gray-400">Region</span>
                        <span class="text-sm text-gray-600">{{ $user->getDetail('region') }}</span>
                    </div>

                    {{-- Country Row --}}
                    <div class="grid grid-cols-2 gap-4">
                        <span class="text-sm font-medium text-gray-400">Country</span>
                        <span class="text-sm text-gray-600">{{ $user->getDetail('country') }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mt-6">
            {{-- Card Header --}}
            <div class="px-6 py-5 border-b border-gray-50 flex justify-between items-center">
                <h3 class="text-xl font-extrabold uppercase tracking-wider text-gray-900">
                    Correspondense Address
                </h3>
                <button id="openCorrespondenceModal"
                    class="px-5 py-1.5 border border-cyan-500 text-cyan-500 rounded-md text-sm font-bold hover:bg-cyan-50 transition-colors">
                    Edit
                </button>
            </div>

            {{-- Card Body --}}
            <div class="px-6 py-6">
                <div class="space-y-4">
                    {{-- Address Row --}}
                    <div class="grid grid-cols-2 gap-4">
                        <span class="text-sm font-medium text-gray-400">Correspondence Address</span>
                        <span class="text-sm text-gray-600">{{ $user->getDetail('correspondence_address') }}</span>
                    </div>

                    {{-- City Row --}}
                    <div class="grid grid-cols-2 gap-4">
                        <span class="text-sm font-medium text-gray-400">City</span>
                        <span class="text-sm text-gray-600">{{ $user->getDetail('correspondence_city') }}</span>
                    </div>

                    {{-- Postcode Row --}}
                    <div class="grid grid-cols-2 gap-4">
                        <span class="text-sm font-medium text-gray-400">Postcode</span>
                        <span class="text-sm text-gray-600">{{ $user->getDetail('correspondence_postcode') }}</span>
                    </div>

                    {{-- Region Row --}}
                    <div class="grid grid-cols-2 gap-4">
                        <span class="text-sm font-medium text-gray-400">Region</span>
                        <span class="text-sm text-gray-600">{{ $user->getDetail('correspondence_region') }}</span>
                    </div>

                    {{-- Country Row --}}
                    <div class="grid grid-cols-2 gap-4">
                        <span class="text-sm font-medium text-gray-400">Country</span>
                        <span class="text-sm text-gray-600">{{ $user->getDetail('correspondence_country') }}</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="bg-white border border-gray-200 rounded-lg shadow-sm mb-6">
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
                <h3 class="text-xl font-extrabold uppercase tracking-wider text-gray-900">Emergency Contact</h3>
                <button id="openEmergencyModal"
                    class="px-5 py-1.5 border border-cyan-500 text-cyan-500 rounded-md text-sm font-bold hover:bg-cyan-50 transition-colors">
                    Edit
                </button>
            </div>

            <div class="px-6 py-6">
                <div class="space-y-6">
                    {{-- Row 1: Name and Relationship --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="grid grid-cols-2 gap-4 items-center">
                            <span class="text-sm font-medium text-gray-400">Full Name</span>
                            <span
                                class="text-sm text-gray-700 font-semibold">{{ $user->getDetail('Emergency Contact Name') ?? '-' }}</span>
                        </div>
                        <div class="grid grid-cols-2 gap-4 items-center">
                            <span class="text-sm font-medium text-gray-400">Relationship</span>
                            <span
                                class="text-sm text-gray-700 font-semibold">{{ $user->getDetail('Emergency Contact Relationship') ?? '-' }}</span>
                        </div>
                    </div>

                    {{-- Row 2: Phone Number --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="grid grid-cols-2 gap-4 items-center">
                            <span class="text-sm font-medium text-gray-400">Phone Number</span>
                            <span
                                class="text-sm text-gray-700 font-semibold">{{ $user->getDetail('Emergency Contact Phone') ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        {{-- 2. EDIT PERSONAL INFO MODAL --}}
        <div id="editModal" class="fixed inset-0 z-[100] hidden">
            {{-- 背景遮罩 --}}
            <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm" onclick="toggleModal()"></div>

            {{-- 弹窗主体 --}}
            <div class="relative min-h-screen flex items-center justify-center p-4">
                <div
                    class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl overflow-hidden animate-in fade-in zoom-in duration-200">

                    {{-- Modal 头部 --}}
                    <div class="px-8 py-6 flex justify-between items-center border-b border-gray-100">
                        <h3 class="text-xl font-extrabold text-gray-900 tracking-tight">EDIT PERSONAL INFO</h3>
                        <button type="button" onclick="toggleModal()"
                            class="text-gray-400 hover:text-gray-600 transition-colors">
                            <i class="las la-times text-2xl"></i>
                        </button>
                    </div>

                    {{-- 表单内容 --}}
                    <form action="{{ route('user.update', $user->id) }}" method="POST" class="p-8">
                        @csrf
                        {{-- Container for the fields - Scrollable --}}
                        <div class="max-h-[60vh] overflow-y-auto px-8 py-2 custom-scrollbar">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                {{-- Official Full Name --}}
                                <div>
                                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Official Full
                                        Name</label>
                                    <input type="text" name="name" value="{{ $user->name }}"
                                        class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-cyan-500 outline-none transition-all">
                                </div>

                                {{-- Passport --}}
                                <div>
                                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Passport</label>
                                    <input type="text" name="passport" placeholder="i.e. A12345678"
                                        value="{{ $user->getDetail('Passport No.') }}"
                                        class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-cyan-500 outline-none transition-all">
                                </div>

                                {{-- Preferred Name --}}
                                <div>
                                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Preferred
                                        Name</label>
                                    <input type="text" name="preferred_name"
                                        value="{{ $user->preferred_name ?? $user->name }}"
                                        class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-cyan-500 outline-none transition-all">
                                </div>

                                {{-- NRIC No. --}}
                                <div>
                                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">NRIC No.</label>
                                    <input type="text" name="nric" placeholder="i.e. 900804132244"
                                        value="{{ $user->getDetail('NRIC No.') }}"
                                        class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-cyan-500 outline-none transition-all">
                                </div>

                                {{-- Date of Birth --}}
                                <div>
                                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Date of
                                        Birth</label>
                                    <input type="date" name="dob" value="{{ $user->dob }}"
                                        class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-cyan-500 outline-none transition-all">
                                </div>

                                {{-- Phone Number --}}
                                <div>
                                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Phone
                                        Number</label>
                                    <input type="text" name="phone" placeholder="i.e. 0123456789"
                                        value="{{ $user->phone }}"
                                        class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-cyan-500 outline-none transition-all">
                                </div>

                                {{-- Gender --}}
                                <div>
                                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Gender</label>
                                    <select name="gender"
                                        class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-cyan-500 outline-none bg-white">
                                        <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female
                                        </option>
                                        <option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' }}>Other
                                        </option>
                                    </select>
                                </div>

                                {{-- Race --}}
                                <div>
                                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Race</label>
                                    <input type="text" name="race" placeholder="i.e. Chinese"
                                        value="{{ $user->getDetail('Race') }}"
                                        class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-cyan-500 outline-none transition-all">
                                </div>

                                {{-- Religion --}}
                                <div>
                                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Religion</label>
                                    <input type="text" name="religion" placeholder="i.e. Buddhism"
                                        value="{{ $user->getDetail('Religion') }}"
                                        class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-cyan-500 outline-none transition-all">
                                </div>

                                {{-- Nationality --}}
                                <div>
                                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Nationality</label>
                                    <input type="text" name="nationality" placeholder="i.e. Malaysian"
                                        value="{{ $user->getDetail('Nationality') }}"
                                        class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-cyan-500 outline-none transition-all">
                                </div>

                                {{-- Permanent Resident --}}
                                <div>
                                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Permanent
                                        Resident</label>
                                    <select name="is_pr"
                                        class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-cyan-500 outline-none bg-white">
                                        <option value="0" {{ $user->getDetail('is_pr') == '0' ? 'selected' : '' }}>No
                                        </option>
                                        <option value="1" {{ $user->getDetail('is_pr') == '1' ? 'selected' : '' }}>
                                            Yes</option>
                                    </select>
                                </div>

                                {{-- Highest Qualification --}}
                                <div>
                                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Highest
                                        Qualification</label>
                                    <select name="qualification"
                                        class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-cyan-500 outline-none">
                                        <option value="Diploma" {{ $user->qualification == 'Diploma' ? 'selected' : '' }}>
                                            Diploma</option>
                                        <option value="Degree" {{ $user->qualification == 'Degree' ? 'selected' : '' }}>
                                            Degree</option>
                                    </select>
                                </div>

                                {{-- Marital Status --}}
                                <div>
                                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Marital
                                        Status</label>
                                    <select name="marital_status"
                                        class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-cyan-500 outline-none">
                                        <option value="Single" {{ $user->marital_status == 'Single' ? 'selected' : '' }}>
                                            Single</option>
                                        <option value="Married"
                                            {{ $user->marital_status == 'Married' ? 'selected' : '' }}>Married</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- Footer Buttons - Fixed (Outside the scrollable div) --}}
                        <div class="px-8 py-6 flex justify-end gap-3 border-t border-gray-100 bg-gray-50/50">
                            <button type="button" id="cancelBtn"
                                class="px-6 py-2 border border-gray-200 rounded-lg text-sm font-bold text-gray-500 hover:bg-white transition-all">
                                Cancel
                            </button>
                            <button type="submit" id="saveBtn"
                                class="px-6 py-2 bg-gray-900 text-white rounded-lg text-sm font-bold hover:bg-gray-800 transition-all shadow-lg shadow-gray-200">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    {{-- 3. EDIT EMAIL MODAL --}}
    <div id="emailModal" class="fixed inset-0 z-[100] hidden">
        <div class="close-modal absolute inset-0 bg-gray-900/50 backdrop-blur-sm"></div>
        <div class="relative min-h-screen flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden">
                <div class="px-8 py-6 flex justify-between items-center border-b border-gray-100">
                    <h3 class="text-xl font-extrabold text-gray-900 tracking-tight">UPDATE EMAIL</h3>
                    <button type="button" class="close-modal text-gray-400 hover:text-gray-600">
                        <i class="las la-times text-2xl"></i>
                    </button>
                </div>
                <form action="{{ route('user.updateEmail', $user->id) }}" method="POST" class="p-8">
                    @csrf
                    <div class="mb-6">
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-2">New Email Address</label>
                        <input type="email" name="email" value="{{ $user->email }}"
                            class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-cyan-500 outline-none">
                    </div>
                    <div class="flex justify-end gap-3">
                        <button type="button"
                            class="close-modal px-6 py-2 border border-gray-200 rounded-lg text-sm font-bold text-gray-500 hover:bg-gray-50">Cancel</button>
                        <button type="submit"
                            class="px-6 py-2 bg-gray-900 text-white rounded-lg text-sm font-bold hover:bg-gray-800 shadow-lg">Update
                            Email</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    {{-- 4. EDIT ADDRESS MODAL --}}
    <div id="addressModal" class="fixed inset-0 z-[100] hidden">
        <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm" onclick="toggleAddressModal()"></div>
        <div class="relative min-h-screen flex items-center justify-center p-4">
            <div
                class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl overflow-hidden animate-in fade-in zoom-in duration-200">
                <div class="px-8 py-6 flex justify-between items-center border-b border-gray-100">
                    <h3 class="text-xl font-extrabold text-gray-900 tracking-tight">EDIT PERMANENT ADDRESS</h3>
                    <button type="button" onclick="toggleAddressModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="las la-times text-2xl"></i>
                    </button>
                </div>

                <form action="{{ route('user.updateAddress', $user->id) }}" method="POST" class="p-8">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Permanent Address</label>
                            <textarea name="address" rows="2"
                                class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-cyan-500 outline-none">{{ $user->getDetail('address') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase mb-2">City</label>
                            <input type="text" name="city" value="{{ $user->getDetail('city') }}"
                                class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-cyan-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Postcode</label>
                            <input type="text" name="postcode" value="{{ $user->getDetail('postcode') }}"
                                class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-cyan-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Region</label>
                            <input type="text" name="region" value="{{ $user->getDetail('region') }}"
                                class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-cyan-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Country</label>
                            <input type="text" name="country" value="{{ $user->getDetail('country') }}"
                                class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-cyan-500 outline-none">
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end gap-3">
                        <button type="button" id="closeAddressBtn"
                            class="px-6 py-2 border border-gray-200 rounded-lg text-sm font-bold text-gray-500 hover:bg-gray-50">Cancel</button>
                        <button type="submit"
                            class="px-6 py-2 bg-gray-900 text-white rounded-lg text-sm font-bold hover:bg-gray-800 shadow-lg">Save
                            Address</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="correspondenceAddressModal"
        class="fixed inset-0 z-50 hidden flex items-center justify-center bg-gray-900 bg-opacity-50 backdrop-blur-sm transition-opacity">
        <div
            class="bg-white rounded-2xl shadow-xl w-full max-w-lg mx-4 overflow-hidden transform transition-all border border-gray-100">

            {{-- Modal Header --}}
            <div class="px-6 py-4 border-b border-gray-50 flex justify-between items-center bg-gray-50/50">
                <h3 class="text-lg font-extrabold uppercase tracking-wider text-gray-900">Edit Correspondence Address</h3>
                <button type="button" class="closeModal text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
            </div>

            {{-- Modal Body (The Form) --}}
            <form id="correspondenceForm" action="{{ route('user.updateCorrespondenceAddress', $user->id) }}"
                method="POST" class="p-6 space-y-4">
                @csrf

                <div class="space-y-1">
                    <label class="text-xs font-bold text-gray-400 uppercase">Correspondence Address</label>
                    <input type="text" name="correspondence_address"
                        value="{{ $user->getDetail('correspondence_address') }}"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 outline-none text-sm text-gray-600 transition-all">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-gray-400 uppercase">City</label>
                        <input type="text" name="correspondence_city"
                            value="{{ $user->getDetail('correspondence_city') }}"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-cyan-500 outline-none text-sm text-gray-600">
                    </div>
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-gray-400 uppercase">Postcode</label>
                        <input type="text" name="correspondence_postcode"
                            value="{{ $user->getDetail('correspondence_postcode') }}"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-cyan-500 outline-none text-sm text-gray-600">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-gray-400 uppercase">Region</label>
                        <input type="text" name="correspondence_region"
                            value="{{ $user->getDetail('correspondence_region') }}"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-cyan-500 outline-none text-sm text-gray-600">
                    </div>
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-gray-400 uppercase">Country</label>
                        <input type="text" name="correspondence_country"
                            value="{{ $user->getDetail('correspondence_country') }}"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-cyan-500 outline-none text-sm text-gray-600">
                    </div>
                </div>

                {{-- Modal Footer --}}
                <div class="pt-4 flex justify-end space-x-3">
                    <button type="button"
                        class="closeModal px-4 py-2 text-sm font-bold text-gray-400 hover:text-gray-600 transition-colors">
                        Cancel
                    </button>
                    <button type="submit" id="saveCorrespondenceBtn"
                        class="px-6 py-2 bg-cyan-500 text-white text-sm font-bold rounded-lg hover:bg-cyan-600 shadow-md transition-all">
                        Update Address
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="emergencyContactModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-gray-900/50 backdrop-blur-sm">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="relative w-full max-w-lg bg-white rounded-xl shadow-2xl">

                <div class="px-6 py-4 border-b flex justify-between items-center">
                    <h3 class="text-lg font-bold text-gray-800">Edit Emergency Contact</h3>
                    <button type="button"
                        class="closeEmergencyModal text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
                </div>

                <form action="{{ route('user.updateEmergencyContact', $user->id) }}" method="POST"
                    class="p-6 space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Full Name</label>
                        <input type="text" name="emergency_name"
                            value="{{ $user->getDetail('Emergency Contact Name') }}"
                            class="w-full border-gray-300 rounded-lg focus:ring-cyan-500 focus:border-cyan-500">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Relationship</label>
                            <input type="text" name="emergency_relationship"
                                value="{{ $user->getDetail('Emergency Contact Relationship') }}"
                                class="w-full border-gray-300 rounded-lg focus:ring-cyan-500 focus:border-cyan-500">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Phone Number</label>
                            <input type="text" name="emergency_phone"
                                value="{{ $user->getDetail('Emergency Contact Phone') }}"
                                class="w-full border-gray-300 rounded-lg focus:ring-cyan-500 focus:border-cyan-500">
                        </div>
                    </div>

                    <div class="flex justify-end pt-4 space-x-3">
                        <button type="button"
                            class="closeEmergencyModal px-4 py-2 text-gray-500 font-medium">Cancel</button>
                        <button type="submit"
                            class="px-6 py-2 bg-cyan-600 text-white font-bold rounded-lg shadow-lg hover:bg-cyan-700">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
