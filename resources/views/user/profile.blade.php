@extends('output.layout')

@section('content')
<div class="max-w-5xl mx-auto py-10 px-4">

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="px-8 py-6 flex justify-between items-center border-b border-gray-50">
            <h2 class="text-xl font-extrabold text-gray-800 tracking-tight">EMAIL ADDRESS</h2>
            
            {{-- Edit 按钮：点击触发 toggleModal() --}}
            <button type="button" id="editEmailModal" class="px-5 py-1.5 border border-cyan-500 text-cyan-500 rounded-md text-sm font-bold hover:bg-cyan-50 transition-colors">
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
            <button type="button" id="openEditModal" class="px-5 py-1.5 border border-cyan-500 text-cyan-500 rounded-md text-sm font-bold hover:bg-cyan-50 transition-colors">
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
                        <span class="text-gray-900 text-sm font-medium w-1/2">{{ $user->phone ?? '+601133903509' }}</span>
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
                        <span class="text-gray-900 text-sm font-medium w-1/2">{{$user->getDetail('Passport No.')}}</span>
                    </div>

                    <div class="flex justify-between items-start">
                        <span class="text-gray-400 text-sm w-1/2">NRIC No.</span>
                        <span class="text-gray-900 text-sm font-medium w-1/2">{{$user->getDetail('NRIC No.')}}</span>
                    </div>

                    <div class="flex justify-between items-start">
                        <span class="text-gray-400 text-sm w-1/2">Highest Qualification</span>
                        <span class="text-gray-900 text-sm font-medium w-1/2">{{$user->getDetail('Highest Qualification')}}</span>
                    </div>

                    <div class="flex justify-between items-start">
                        <span class="text-gray-400 text-sm w-1/2">Marital Status</span>
                        <span class="text-gray-900 text-sm font-medium w-1/2">{{$user->getDetail('Marital Status')}}</span>
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
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl overflow-hidden animate-in fade-in zoom-in duration-200">
                
                {{-- Modal 头部 --}}
                <div class="px-8 py-6 flex justify-between items-center border-b border-gray-100">
                    <h3 class="text-xl font-extrabold text-gray-900 tracking-tight">EDIT PERSONAL INFO</h3>
                    <button type="button" onclick="toggleModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                        <i class="las la-times text-2xl"></i>
                    </button>
                </div>

                {{-- 表单内容 --}}
                <form action="{{ route('user.update', $user->id ) }}" method="POST" class="p-8">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Official Full Name --}}
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Official Full Name</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-cyan-500 outline-none transition-all">
                        </div>

                        {{-- Passport --}}
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Passport</label>
                            <input type="text" name="passport" placeholder="i.e. A12345678" value="{{ $user->getDetail('Passport No.') }}" class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-cyan-500 outline-none transition-all">
                        </div>

                        {{-- Preferred Name --}}
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Preferred Name</label>
                            <input type="text" name="preferred_name" value="{{ $user->name }}" class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-cyan-500 outline-none transition-all">
                        </div>

                        {{-- NRIC No. --}}
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase mb-2">NRIC No.</label>
                            <input type="text" name="nric" placeholder="i.e. 900804132244" value="{{ $user->getDetail('NRIC No.') }}" class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-cyan-500 outline-none transition-all">
                        </div>

                        {{-- Highest Qualification --}}
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Highest Qualification</label>
                            <select name="qualification" class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-cyan-500 outline-none">
                                <option value="Diploma" {{ $user->qualification == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                                <option value="Degree" {{ $user->qualification == 'Degree' ? 'selected' : '' }}>Degree</option>
                            </select>
                        </div>

                        {{-- Marital Status --}}
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Marital Status</label>
                            <select name="marital_status" class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-cyan-500 outline-none">
                                <option value="Single" >Single</option>
                                <option value="Married">Married</option>
                            </select>
                        </div>
                    </div>

                    {{-- 底部按钮 --}}
                    <div class="mt-8 flex justify-end gap-3">
                        <button type="button" id="cancelBtn" class="px-6 py-2 border border-gray-200 rounded-lg text-sm font-bold text-gray-500 hover:bg-gray-50 transition-all">
                            Cancel
                        </button>
                        <button type="submit" id="saveBtn" class="px-6 py-2 bg-gray-900 text-white rounded-lg text-sm font-bold hover:bg-gray-800 transition-all shadow-lg shadow-gray-200">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection