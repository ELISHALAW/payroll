@extends('output.layout')


@section('content')
    <div class="min-h-screen py-40">
        <div class="container mx-auto bg-white">
            <div class="flex flex-col lg:flex-row w-10/12 lg:w-8/12 bg-white rounded-xl mx-auto shadow-lg overflow-hidden">
                <div class="w-full lg:w-1/2 flex flex-col items-center justify-center p-12 bg-no-repeat bg-cover bg-center"
                    style="background-image:url('{{ asset('images/towner.jpg') }}')">

                </div>

                <div class="w-full lg:w-1/2 py-16 px-12">
                    <h2 class="text-3xl mb-4">Register</h2>
                    <p class="mb-4">Create your account, It's free and only take a minute</p>
                    <form action="{{ route('register.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-2 gap-5">
                            <input type="text" name="name" placeholder="Enter your name"
                                class="border border-gray-400 py-1 px-2">
                            <input type="email" name="email" placeholder="Enter your email"
                                class="border border-gray-400 py-1 px-2">
                        </div>

                        <div class="mt-5">
                            <input type="text" name="mobile" placeholder="Enter your phone number"
                                class="border border-gray-400 py-1 px-2 w-full">
                        </div>
                        <div class="mt-5">
                            <input type="password" name="password" placeholder="Password"
                                class="border border-gray-400 py-1 px-2 w-full">
                        </div>
                        <div class="mt-5">
                            <input type="password" name="password_confirmation" placeholder="Confirm password"
                                class="border border-gray-400 py-1 px-2 w-full">
                        </div>
                        @if ($errors->any())
                            <div class="text-red-500 mt-2">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="mt-5">
                            <input type="checkbox" class="border border-gray-400">
                            <span>
                                I accept the <a href="#" class="text-gray-900 font-semibold">terms of Use</a> & <a
                                    href="#">Privacy Policy</a>
                            </span>
                        </div>
                        <div class="mt-5">
                            <button
                                class="w-full h-12 bg-gray-900 text-white rounded-full font-bold hover:bg-black transition-all shadow-md active:scale-[0.98]">Register
                                now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
