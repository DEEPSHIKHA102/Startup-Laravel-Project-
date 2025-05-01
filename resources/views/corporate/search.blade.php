@extends('layouts.app')

@section('title', 'Search Startups')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-semibold text-gray-900 mb-6">Startup Search</h1>
                
                <div class="bg-gray-50 p-4 rounded-lg mb-6">
                    <form action="{{ route('corporate.search') }}" method="GET">
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
                            <div>
                                <label for="q" class="block text-sm font-medium text-gray-700">Search Term</label>
                                <input type="text" name="q" id="q" value="{{ request('q') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="industry" class="block text-sm font-medium text-gray-700">Industry</label>
                                <select id="industry" name="industry" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="">All Industries</option>
                                    <option value="FinTech" {{ request('industry') == 'FinTech' ? 'selected' : '' }}>FinTech</option>
                                    <option value="AI" {{ request('industry') == 'AI' ? 'selected' : '' }}>Artificial Intelligence</option>
                                    <option value="CleanTech" {{ request('industry') == 'CleanTech' ? 'selected' : '' }}>Clean Technology</option>
                                    <option value="HealthTech" {{ request('industry') == 'HealthTech' ? 'selected' : '' }}>Health Technology</option>
                                </select>
                            </div>
                            <div>
                                <label for="stage" class="block text-sm font-medium text-gray-700">Funding Stage</label>
                                <select id="stage" name="stage" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="">All Stages</option>
                                    <option value="Seed" {{ request('stage') == 'Seed' ? 'selected' : '' }}>Seed</option>
                                    <option value="Series A" {{ request('stage') == 'Series A' ? 'selected' : '' }}>Series A</option>
                                    <option value="Series B" {{ request('stage') == 'Series B' ? 'selected' : '' }}>Series B</option>
                                    <option value="Series C+" {{ request('stage') == 'Series C+' ? 'selected' : '' }}>Series C+</option>
                                </select>
                            </div>
                            <div class="flex items-end">
                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 h-10">
                                    <i class="fas fa-search mr-2"></i> Search
                                </button>
                                @if(request()->has('q') || request()->has('industry') || request()->has('stage'))
                                <a href="{{ route('corporate.search') }}" class="ml-2 inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 h-10">
                                    Clear
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                
                @if(count($startups) > 0)
                <div class="space-y-4">
                    @foreach($startups as $startup)
                    <div class="bg-white p-4 rounded-lg shadow border border-gray-200 hover:border-indigo-300 transition">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-12 w-12 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold">
                                {{ strtoupper(substr($startup['name'], 0, 1)) }}
                            </div>
                            <div class="ml-4 flex-1">
                                <div class="flex justify-between">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900">{{ $startup['name'] }}</h3>
                                        <p class="text-sm text-gray-500">{{ $startup['industry'] }} • {{ $startup['stage'] }}</p>
                                    </div>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        {{ $startup['match_score'] }}% Match
                                    </span>
                                </div>
                                <p class="mt-1 text-sm text-gray-700">{{ $startup['description'] }}</p>
                                <div class="mt-3 flex justify-between items-center">
                                    <div>
                                        @if(isset($startup['tags']))
                                        @foreach($startup['tags'] as $tag)
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800 mr-1">
                                            {{ $tag }}
                                        </span>
                                        @endforeach
                                        @endif
                                    </div>
                                    <div>
                                        <a href="{{ route('match.show', $startup['id']) }}" class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                                            View Details <i class="fas fa-chevron-right ml-1 text-xs"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="mt-2 text-lg font-medium text-gray-900">No startups found</h3>
                    <p class="mt-1 text-sm text-gray-500">Try adjusting your search criteria</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection