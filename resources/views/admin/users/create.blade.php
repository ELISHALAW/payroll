@extends('output.admin')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md mx-auto">
        <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 overflow-hidden border border-gray-100">
            
            <div class="p-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Create User</h2>
                    <p class="mt-2 text-sm text-gray-500">Add a new member to the payroll system</p>
                </div>

                <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Full Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" 
                            placeholder="e.g. John Doe"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-gray-600">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}" 
                            placeholder="john@company.com"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-gray-600">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Mobile Number</label>
                        <input type="text" name="mobile" value="{{ old('mobile') }}"
                            placeholder="012-XXXXXXX"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-gray-600">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                            <input type="password" name="password" 
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Confirm</label>
                            <input type="password" name="password_confirmation" 
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none">
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="p-4 rounded-xl bg-red-50 border border-red-100">
                            <ul class="list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="pt-2">
                        <button type="submit" 
                            class="w-full py-4 bg-gray-900 text-white rounded-xl font-bold hover:bg-black hover:shadow-lg transform active:scale-[0.98] transition-all shadow-md">
                            Create System User
                        </button>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('users.index') }}" class="text-sm text-gray-500 hover:text-gray-800 transition">
                            &larr; Back to User List
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection