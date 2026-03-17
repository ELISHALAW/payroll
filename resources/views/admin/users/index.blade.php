@extends('output.admin') {{-- 确保使用你的后台 Layout --}}

@section('content')
<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-gray-800">User List</h2>
        <a href="{{ route('users.create') }}" class="bg-gray-900 text-white px-4 py-2 rounded-lg text-sm font-bold">
            + Add New User
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-50 text-gray-600 text-sm uppercase">
                    <th class="py-3 px-4">Name</th>
                    <th class="py-3 px-4">Email</th>
                    <th class="py-3 px-4">Phone</th>
                    <th class="py-3 px-4">Role</th>
                    <th class="py-3 px-4 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($users as $user)
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-3 px-4 font-medium">{{ $user->name }}</td>
                    <td class="py-3 px-4 text-gray-600">{{ $user->email }}</td>
                    <td class="py-3 px-4">{{ $user->mobile }}</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 rounded-full text-xs font-bold {{ $user->role == 'admin' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' }}">
                            {{ strtoupper($user->role) }}
                        </span>
                    </td>
                    <td class="py-3 px-4 text-center">
                        <div class="flex justify-center space-x-2">
                            <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500 hover:underline">Edit</a>
                            
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Delete this user?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection