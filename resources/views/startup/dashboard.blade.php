@extends('layouts.app')

@section('title', 'Startup Dashboard')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-900">Welcome back, {{ $startup['name'] }}</h1>
                        <p class="mt-2 text-gray-600">Here's your current status and recent activity.</p>
                    </div>
                    <div class="flex space-x-3">
                        <a href="{{ route('startup.pitch') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                            <i class="fas fa-file-alt mr-2"></i> View Pitch
                        </a>
                        <a href="{{ route('startup.matches') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                            <i class="fas fa-handshake mr-2"></i> Your Matches
                        </a>
                    </div>
                </div>
                
                <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-3">
                    <div class="lg:col-span-2">
                        <h2 class="text-lg font-medium text-gray-900 mb-4">Recommended Corporates</h2>
                        <div class="space-y-4">
                            @foreach($corporates as $corporate)
                            <div class="bg-gray-50 p-4 rounded-lg shadow border border-gray-200 hover:border-indigo-300 transition">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 h-12 w-12 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold">
                                        {{ strtoupper(substr($corporate['name'], 0, 1)) }}
                                    </div>
                                    <div class="ml-4 flex-1">
                                        <div class="flex justify-between">
                                            <h3 class="text-lg font-medium text-gray-900">{{ $corporate['name'] }}</h3>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                {{ $corporate['match_score'] }}% Match
                                            </span>
                                        </div>
                                        <p class="text-sm text-gray-500">{{ $corporate['industry'] }}</p>
                                        <p class="mt-1 text-sm text-gray-700">{{ $corporate['description'] }}</p>
                                        <div class="mt-2">
                                            <p class="text-xs text-gray-500">Investment Focus:</p>
                                            <div class="mt-1">
                                                @foreach($corporate['investment_focus'] as $focus)
                                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800 mr-1">
                                                    {{ $focus }}
                                                </span>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="mt-3 flex justify-end">
                                            <a href="{{ route('match.show', $corporate['id']) }}" class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
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
                        <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
                            <div class="px-4 py-5 sm:px-6 bg-gray-50">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Startup Overview</h3>
                            </div>
                            <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                                <dl class="sm:divide-y sm:divide-gray-200">
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">Stage</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $startup['stage'] }}</dd>
                                    </div>
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">Industry</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $startup['industry'] }}</dd>
                                    </div>
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">Founded</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $startup['founded_year'] }}</dd>
                                    </div>
                                    <div class="py-