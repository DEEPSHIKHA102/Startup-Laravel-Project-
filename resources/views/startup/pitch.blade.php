@extends('layouts.app')

@section('title', 'Pitch Deck')

@section('content')
<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg">
            <!-- Pitch Header -->
            <div class="px-6 py-5 border-b border-gray-200 flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">Pitch Deck</h2>
                    <p class="mt-1 text-sm text-gray-500">Your startup's investment presentation</p>
                </div>
                <div class="flex space-x-3">
                    <a href="{{ $startup['pitch_deck'] }}" target="_blank" 
                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                        <i class="fas fa-download mr-2"></i> Download PDF
                    </a>
                    <button class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50">
                        <i class="fas fa-pencil-alt mr-2"></i> Edit
                    </button>
                </div>
            </div>

            <!-- Pitch Content -->
            <div class="px-6 py-5">
                <!-- PDF Viewer Placeholder -->
                <div class="bg-gray-50 rounded-lg border-2 border-dashed border-gray-300 p-12 text-center mb-8">
                    <div class="mx-auto h-24 w-24 text-indigo-500 mb-4">
                        <i class="fas fa-file-pdf text-6xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900">Pitch Deck Preview</h3>
                    <p class="mt-1 text-sm text-gray-500">Your complete pitch deck is available for download</p>
                    <div class="mt-6">
                        <a href="{{ $startup['pitch_deck'] }}" target="_blank" 
                           class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                            <i class="fas fa-external-link-alt mr-2"></i> Open Full Deck
                        </a>
                    </div>
                </div>

                <!-- Key Slides -->
                <h3 class="text-lg font-medium text-gray-900 mb-4">Key Slides Summary</h3>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <!-- Problem Slide -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-red-100 rounded-md p-3">
                                    <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-medium text-gray-900">The Problem</h4>
                                    <p class="mt-1 text-sm text-gray-500">What we're solving</p>
                                </div>
                            </div>
                            <div class="mt-4 text-sm text-gray-700 bg-gray-50 p-4 rounded-md">
                                {{ $startup['problem_statement'] ?? 'Current solutions are inefficient, expensive, and don\'t address core user needs...' }}
                            </div>
                        </div>
                    </div>

                    <!-- Solution Slide -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-green-100 rounded-md p-3">
                                    <i class="fas fa-lightbulb text-green-600 text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-medium text-gray-900">Our Solution</h4>
                                    <p class="mt-1 text-sm text-gray-500">How we're different</p>
                                </div>
                            </div>
                            <div class="mt-4 text-sm text-gray-700 bg-gray-50 p-4 rounded-md">
                                {{ $startup['solution_description'] ?? 'Our proprietary technology addresses these pain points through...' }}
                            </div>
                        </div>
                    </div>

                    <!-- Market Slide -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-blue-100 rounded-md p-3">
                                    <i class="fas fa-chart-bar text-blue-600 text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-medium text-gray-900">Market Opportunity</h4>
                                    <p class="mt-1 text-sm text-gray-500">Size and growth potential</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="text-sm text-gray-700">
                                    <p class="font-medium">${{ number_format(rand(10, 100)) }}B Total Addressable Market</p>
                                    <p class="text-gray-500">{{ rand(15, 40) }}% CAGR</p>
                                </div>
                                <div class="mt-3 bg-gray-200 rounded-full h-2">
                                    <div class="bg-blue-500 h-2 rounded-full" style="width: {{ rand(30, 80) }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Team Slide -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-purple-100 rounded-md p-3">
                                    <i class="fas fa-users text-purple-600 text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-medium text-gray-900">Our Team</h4>
                                    <p class="mt-1 text-sm text-gray-500">Experienced founders</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <ul class="space-y-3">
                                    @foreach($startup['founders'] as $founder)
                                    <li class="flex items-center">
                                        <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center mr-3">
                                            {{ strtoupper(substr($founder, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">{{ $founder }}</p>
                                            <p class="text-xs text-gray-500">Founder & {{ ['CEO','CTO','CPO'][array_rand(['CEO','CTO','CPO'])] }}</p>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Financials -->
                <div class="mt-8">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Financial Highlights</h3>
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6 bg-gray-50 border-b border-gray-200">
                            <h4 class="text-md font-medium text-gray-900">Projected Growth</h4>
                        </div>
                        <div class="px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-3 gap-4 text-center">
                                <div>
                                    <p class="text-sm text-gray-500">Current ARR</p>
                                    <p class="text-xl font-bold text-indigo-600">${{ number_format(rand(1, 10) * 100000) }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Next Year</p>
                                    <p class="text-xl font-bold text-green-600">${{ number_format(rand(3, 15) * 100000) }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Year 3</p>
                                    <p class="text-xl font-bold text-blue-600">${{ number_format(rand(10, 30) * 100000) }}</p>
                                </div>
                            </div>
                            <div class="mt-6">
                                <div class="h-64 bg-gray-50 rounded-md p-4">
                                    <!-- Chart placeholder -->
                                    <div class="flex items-center justify-center h-full text-gray-400">
                                        <i class="fas fa-chart-line text-4xl"></i>
                                        <p class="ml-2">Revenue Growth Chart</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection