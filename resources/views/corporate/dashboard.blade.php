@extends('layouts.app')

@section('title', 'Corporate Dashboard')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-900">Welcome back, {{ $corporate['name'] }}</h1>
                        <p class="mt-2 text-gray-600">Here's what's happening with your startup matches today.</p>
                    </div>
                    <div class="flex space-x-3">
                        <a href="{{ route('corporate.search') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                            <i class="fas fa-search mr-2"></i> Find Startups
                        </a>
                        <a href="{{ route('corporate.matches') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                            <i class="fas fa-handshake mr-2"></i> Your Matches
                        </a>
                    </div>
                </div>
                
                <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-3">
                    <div class="lg:col-span-2">
                        <h2 class="text-lg font-medium text-gray-900 mb-4">Recommended Startups</h2>
                        <div class="space-y-4">
                            @foreach($startups as $startup)
                            <div class="bg-gray-50 p-4 rounded-lg shadow border border-gray-200 hover:border-indigo-300 transition">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 h-12 w-12 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold">
                                        {{ strtoupper(substr($startup['name'], 0, 1)) }}
                                    </div>
                                    <div class="ml-4 flex-1">
                                        <div class="flex justify-between">
                                            <h3 class="text-lg font-medium text-gray-900">{{ $startup['name'] }}</h3>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                {{ $startup['match_score'] }}% Match
                                            </span>
                                        </div>
                                        <p class="text-sm text-gray-500">{{ $startup['industry'] }} • {{ $startup['stage'] }}</p>
                                        <p class="mt-1 text-sm text-gray-700">{{ $startup['description'] }}</p>
                                        <div class="mt-3 flex justify-end">
                                            <a href="{{ route('match.show', $startup['id']) }}" class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                                                View Details <i class="fas fa-chevron-right ml-1 text-xs"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <div>
                        <h2 class="text-lg font-medium text-gray-900 mb-4">Recent Activity</h2>
                        <div class="bg-gray-50 p-4 rounded-lg shadow border border-gray-200">
                            <ul class="divide-y divide-gray-200">
                                @foreach($corporate['recent_activity'] as $activity)
                                <li class="py-3">
                                    <div class="flex space-x-3">
                                        <div class="flex-shrink-0">
                                            <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center">
                                                <i class="fas fa-bell text-indigo-600 text-sm"></i>
                                            </div>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <p class="text-sm text-gray-800">{{ $activity['action'] }}</p>
                                            <p class="text-xs text-gray-500 mt-1">{{ \Carbon\Carbon::parse($activity['date'])->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        
                        <div class="mt-6 bg-white p-4 rounded-lg shadow border border-gray-200">
                            <h3 class="text-md font-medium text-gray-900 mb-2">Quick Stats</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-indigo-50 p-3 rounded-lg">
                                    <p class="text-sm text-indigo-600">Total Matches</p>
                                    <p class="text-2xl font-bold text-indigo-900">{{ count($corporate['matched_startups']) }}</p>
                                </div>
                                <div class="bg-green-50 p-3 rounded-lg">
                                    <p class="text-sm text-green-600">Avg. Match Score</p>
                                    <p class="text-2xl font-bold text-green-900">
                                        {{ round(array_sum(array_column($corporate['matched_startups'], 'match_score')) / count($corporate['matched_startups'])) }}%
                                    </p>
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