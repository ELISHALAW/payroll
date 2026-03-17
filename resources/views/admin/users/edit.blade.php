@extends('output.admin')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4">
    <div class="max-w-sm mx-auto">
        <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden">
            
            <div class="h-2 bg-blue-600"></div>

            <div class="p-8">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-900">Update Profile</h2>
                    <p class="text-sm text-gray-500 mt-1">Modifying information for <b>{{ $user->name }}</b></p>
                </div>

                <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-1 ml-1">Full Name</label>
                        <div class="relative">
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                                class="w-full pl-4 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-gray-700">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-1 ml-1">Email Address</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-gray-700">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-1 ml-1">Phone Number</label>
                        <input type="text" name="mobile" value="{{ old('mobile', $user->mobile) }}" 
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-gray-700">
                    </div>

                    <div class="pt-2">
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-1 ml-1">New Password</label>
                        <input type="password" name="password" placeholder="••••••••"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none">
                        <p class="text-[10px] text-gray-400 mt-1.5 ml-1 italic">* Leave blank to keep current password</p>
                    </div>

                    <div class="pt-4">
                        <button type="submit" 
                            class="w-full py-4 bg-blue-600 text-white rounded-xl font-bold hover:bg-blue-700 hover:shadow-lg transform active:scale-[0.98] transition-all shadow-md">
                            Save Changes
                        </button>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('users.index') }}" class="text-sm text-gray-400 hover:text-gray-600 transition">
                            Cancel and go back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection