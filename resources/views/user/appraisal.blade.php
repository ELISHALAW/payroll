@extends('output.layout')

@section('content')
    <div class="min-vh-100 bg-gray-50 py-10">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 border-b border-gray-200 pb-6 gap-4">
                <div>
                    <nav class="flex mb-2 text-sm text-gray-500 uppercase tracking-wider font-semibold">
                        <span>Performance Management</span>
                        <span class="mx-2 text-gray-300">/</span>
                        <span class="text-indigo-600">Appraisal</span>
                    </nav>
                    <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">Employee Review</h1>
                    <p class="mt-2 text-gray-600 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="Wait, what? A clock icon? 12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Review Period: <span class="ml-1 font-medium text-gray-900">Jan 2026 - June 2026</span>
                    </p>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="text-right hidden md:block">
                        <p class="text-sm font-medium text-gray-900">John Doe</p>
                        <p class="text-xs text-gray-500">ID: #12345</p>
                    </div>
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800 border border-yellow-200">
                        <span class="w-2 h-2 mr-2 bg-yellow-400 rounded-full"></span>
                        Draft
                    </span>
                </div>
            </div>

            <form action="#" method="POST" class="space-y-8">
                @csrf

                <div class="bg-white shadow-sm border border-gray-200 rounded-2xl overflow-hidden">
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                        <h3 class="text-lg font-bold text-gray-800">Core Competencies</h3>
                    </div>

                    <div class="divide-y divide-gray-100">
                        <div class="p-6 hover:bg-gray-50 transition-colors duration-150">
                            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                                <div class="lg:col-span-5">
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Technical Skills</label>
                                    <p class="text-sm text-gray-500 leading-relaxed">Proficiency in required tools, code
                                        quality, and technical problem solving.</p>
                                </div>
                                <div class="lg:col-span-2">
                                    <select
                                        class="block w-full rounded-lg border-gray-300 border p-2 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        <option>Rating...</option>
                                        <option value="5">5 - Excellent</option>
                                        <option value="4">4 - Good</option>
                                        <option value="3">3 - Average</option>
                                        <option value="2">2 - Poor</option>
                                        <option value="1">1 - Unsatisfactory</option>
                                    </select>
                                </div>
                                <div class="lg:col-span-5">
                                    <textarea rows="2"
                                        class="resize-none block w-full rounded-lg border-gray-300 border p-2 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                                        placeholder="Specific examples or feedback..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 hover:bg-gray-50 transition-colors duration-150">
                            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                                <div class="lg:col-span-5">
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Communication</label>
                                    <p class="text-sm text-gray-500 leading-relaxed">Ability to convey ideas clearly and
                                        collaborate effectively within the team.</p>
                                </div>
                                <div class="lg:col-span-2">
                                    <select
                                        class="block w-full rounded-lg border-gray-300 border p-2 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        <option>Rating...</option>
                                        <option value="5">5</option>
                                        <option value="4">4</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="lg:col-span-5">
                                    <textarea rows="2"
                                        class="resize-none block w-full rounded-lg border-gray-300 border p-2 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                                        placeholder="Feedback..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white shadow-sm border border-gray-200 rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Overall Feedback</h3>
                    <textarea rows="4"
                        class="resize-none block w-full rounded-xl border-gray-300 border p-4 text-sm focus:ring-indigo-500 focus:border-indigo-500 bg-gray-50"
                        placeholder="Summarize the overall performance for this period..."></textarea>
                </div>

                <div class="flex items-center justify-end space-x-4 pt-4">
                    <button type="button"
                        class="px-6 py-2.5 text-sm font-semibold text-gray-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all">
                        Save as Draft
                    </button>
                    <button type="submit"
                        class="px-8 py-2.5 text-sm font-semibold text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 shadow-md shadow-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all">
                        Submit Appraisal
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
