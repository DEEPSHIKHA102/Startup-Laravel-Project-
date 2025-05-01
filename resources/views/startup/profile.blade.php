@extends('layouts.app')

@section('title', 'Startup Profile')

@section('content')
<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-8">
                <!-- Profile Header -->
                <div class="bg-white shadow rounded-lg mb-6">
                    <div class="px-6 py-5 border-b border-gray-200 flex justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">{{ $startup['name'] }}</h2>
                            <div class="mt-1 flex items-center">
                                <span class="text-sm text-gray-500">{{ $startup['industry'] }}</span>
                                <span class="mx-2 text-gray-300">•</span>
                                <span class="text-sm text-gray-500">{{ $startup['stage'] }} Stage</span>
                                <span class="mx-2 text-gray-300">•</span>
                                <span class="text-sm text-gray-500">Founded {{ $startup['founded_year'] }}</span>
                            </div>
                        </div>
                        <div class="flex space-x-3">
                            <button class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50">
                                <i class="fas fa-pencil-alt mr-2"></i> Edit
                            </button>
                            <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                                <i class="fas fa-share-alt mr-2"></i> Share
                            </button>
                        </div>
                    </div>
                    <div class="px-6 py-5">
                        <h3 class="text-lg font-medium text-gray-900 mb-3">About Us</h3>
                        <p class="text-gray-700">{{ $startup['description'] }}</p>
                        
                        <div class="mt-6">
                            <h4 class="text-md font-medium text-gray-900 mb-2">Key Differentiators</h4>
                            <ul class="list-disc pl-5 space-y-1 text-gray-700">
                                <li>Proprietary {{ ['AI','blockchain','machine learning'][array_rand(['AI','blockchain','machine learning'])] }} technology</li>
                                <li>{{ rand(2,10) }}x more efficient than current solutions</li>
                                <li>Patented {{ ['process','algorithm','system'][array_rand(['process','algorithm','system'])] }} (Patent #{{ rand(1000000,9999999) }})</li>
                                <li>{{ rand(50,500) }}% ROI for enterprise customers</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Team Section -->
                <div class="bg-white shadow rounded-lg mb-6">
                    <div class="px-6 py-5 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Our Team</h3>
                    </div>
                    <div class="px-6 py-5">
                        <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            @foreach($startup['founders'] as $founder)
                            <li class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200">
                                <div class="w-full flex items-center justify-between p-6 space-x-6">
                                    <div class="flex-1 truncate">
                                        <div class="flex items-center space-x-3">
                                            <h3 class="text-gray-900 text-sm font-medium truncate">{{ $founder }}</h3>
                                            <span class="flex-shrink-0 inline-block px-2 py-0.5 text-green-800 text-xs font-medium bg-green-100 rounded-full">
                                                Founder
                                            </span>
                                        </div>
                                        <p class="mt-1 text-gray-500 text-sm truncate">
                                            {{ ['Former Google PM','Ex-Facebook Engineer','Serial Entrepreneur','Industry Veteran'][array_rand(['Former Google PM','Ex-Facebook Engineer','Serial Entrepreneur','Industry Veteran'])] }}
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold">
                                        {{ strtoupper(substr($founder, 0, 1)) }}
                                    </div>
                                </div>
                                <div>
                                    <div class="-mt-px flex divide-x divide-gray-200">
                                        <div class="w-0 flex-1 flex">
                                            <a href="#" class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                                                <i class="fas fa-envelope text-gray-400"></i>
                                                <span class="ml-3">Email</span>
                                            </a>
                                        </div>
                                        <div class="-ml-px w-0 flex-1 flex">
                                            <a href="#" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                                <i class="fas fa-linkedin text-gray-400"></i>
                                                <span class="ml-3">Profile</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Traction Section -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-6 py-5 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Traction</h3>
                    </div>
                    <div class="px-6 py-5">
                        <div class="grid grid-cols-3 gap-4 text-center mb-6">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-sm text-gray-500">Customers</p>
                                <p class="text-2xl font-bold text-indigo-600">{{ number_format(rand(50,500)) }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-sm text-gray-500">Revenue (MRR)</p>
                                <p class="text-2xl font-bold text-green-600">${{ number_format(rand(10,100) * 1000) }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-sm text-gray-500">Growth (MoM)</p>
                                <p class="text-2xl font-bold text-blue-600">{{ rand(5,25) }}%</p>
                            </div>
                        </div>
                        
                        <h4 class="text-md font-medium text-gray-900 mb-3">Milestones</h4>
                        <div class="space-y-4">
                            <div class="flex">
                                <div class="flex-shrink-0 mr-4">
                                    <div class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </div>
                                <div class="pt-1">
                                    <p class="text-sm font-medium text-gray-900">Launched MVP</p>
                                    <p class="text-sm text-gray-500">Q{{ rand(1,4) }} {{ date('Y')-rand(0,2) }}</p>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="flex-shrink-0 mr-4">
                                    <div class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </div>
                                <div class="pt-1">
                                    <p class="text-sm font-medium text-gray-900">First Paying Customers</p>
                                    <p class="text-sm text-gray-500">Q{{ rand(1,4) }} {{ date('Y')-rand(0,1) }}</p>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="flex-shrink-0 mr-4">
                                    <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                        <i class="fas fa-flag"></i>
                                    </div>
                                </div>
                                <div class="pt-1">
                                    <p class="text-sm font-medium text-gray-900">Next Milestone</p>
                                    <p class="text-sm text-gray-500">Reach ${{ rand(50,100) }}k MRR by Q{{ rand(1,4) }} {{ date('Y')+1 }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-4 mt-6 lg:mt-0">
                <!-- Match Stats -->
                <div class="bg-white shadow rounded-lg mb-6">
                    <div class="px-6 py-5 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Match Potential</h3>
                    </div>
                    <div class="px-6 py-5">
                        <div class="mb-4">
                            <div class="flex justify-between text-sm text-gray-500 mb-1">
                                <span>Best Match Score</span>
                                <span class="font-medium">{{ max(array_column($startup['matched_corporates'], 'match_score')) }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: {{ max(array_column($startup['matched_corporates'], 'match_score')) }}%"></div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <div class="flex justify-between text-sm text-gray-500 mb-1">
                                <span>Average Match</span>
                                <span class="font-medium">{{ round(array_sum(array_column($startup['matched_corporates'], 'match_score'))/count($startup['matched_corporates'])) }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-blue-500 h-2 rounded-full" style="width: {{ round(array_sum(array_column($startup['matched_corporates'], 'match_score'))/count($startup['matched_corporates'])) }}%"></div>
                            </div>
                        </div>
                        
                        <h4 class="text-md font-medium text-gray-900 mb-3">Top Matches</h4>
                        <ul class="space-y-3">
                            @foreach(array_slice($startup['matched_corporates'], 0, 3) as $corporate)
                            <li class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold">
                                    {{ strtoupper(substr($corporate['name'], 0, 1)) }}
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">{{ $corporate['name'] }}</p>
                                    <p class="text-sm text-gray-500">{{ $corporate['match_score'] }}% match</p>
                                </div>
                                <div class="ml-auto">
                                    <a href="{{ route('match.show', $corporate['id']) }}" class="text-indigo-600 hover:text-indigo-900">
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <div class="mt-4">
                            <a href="{{ route('startup.matches') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                                View all matches →
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Pitch Deck -->
                <div class="bg-white shadow rounded-lg mb-6">
                    <div class="px-6 py-5 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Pitch Deck</h3>
                    </div>
                    <div class="px-6 py-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-12 w-12 rounded-lg bg-red-100 flex items-center justify-center text-red-600">
                                <i class="fas fa-file-pdf text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-900">Investment Deck</p>
                                <p class="text-sm text-gray-500">Updated {{ \Carbon\Carbon::now()->subDays(rand(1,30))->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('startup.pitch') }}" class="w-full flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                <i class="fas fa-eye mr-2"></i> View Pitch Deck
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contact -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-6 py-5 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Contact</h3>
                    </div>
                    <div class="px-6 py-5">
                        <ul class="space-y-3">
                            <li class="flex">
                                <div class="flex-shrink-0 h-6 w-6 text-gray-400">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="ml-3 text-sm text-gray-700">
                                    contact@{{ strtolower(str_replace(' ', '', $startup['name'])) }}.com
                                </div>
                            </li>
                            <li class="flex">
                                <div class="flex-shrink-0 h-6 w-6 text-gray-400">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <div class="ml-3 text-sm text-gray-700">
                                    {{ strtolower(str_replace(' ', '', $startup['name'])) }}.com
                                </div>
                            </li>
                            <li class="flex">
                                <div class="flex-shrink-0 h-6 w-6 text-gray-400">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="ml-3 text-sm text-gray-700">
                                    {{ ['San Francisco','New York','Austin','Boston','Seattle'][array_rand(['San Francisco','New York','Austin','Boston','Seattle'])] }}, USA
                                </div>
                            </li>
                        </ul>
                        <div class="mt-6 flex space-x-3">
                            <a href="#" class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-gray-100 text-gray-500 hover:bg-gray-200">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-gray-100 text-gray-500 hover:bg-gray-200">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-gray-100 text-gray-500 hover:bg-gray-200">
                                <i class="fab fa-angellist"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection