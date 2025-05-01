@extends('layouts.app')

@section('title', 'Match Details')

@section('content')
<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-8">
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <!-- Header -->
                    <div class="px-6 py-5 border-b border-gray-200 flex justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">{{ $corporate['name'] ?? $startup['name'] }}</h2>
                            <div class="mt-1 flex items-center">
                                <span class="text-sm text-gray-500">{{ $corporate['industry'] ?? $startup['industry'] }}</span>
                                @if($startup['stage'] ?? false)
                                <span class="mx-2 text-gray-300">•</span>
                                <span class="text-sm text-gray-500">{{ $startup['stage'] }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="flex space-x-3">
                            <button class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50">
                                <i class="fas fa-ellipsis-h mr-2"></i> More
                            </button>
                            <form action="{{ route('match.connect', $corporate['id'] ?? $startup['id']) }}" method="POST">
                                @csrf
                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                                    <i class="fas fa-handshake mr-2"></i> Connect
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Match Overview -->
                    <div class="px-6 py-5 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-medium text-gray-900">Match Overview</h3>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                {{ $match['score'] }}% Match
                            </span>
                        </div>
                        <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <h4 class="text-sm font-medium text-gray-500">Industry Alignment</h4>
                                <div class="mt-1 flex items-center">
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $match['compatibility']['Industry Alignment'] }}%"></div>
                                    </div>
                                    <span class="ml-2 text-sm font-medium text-gray-700">{{ $match['compatibility']['Industry Alignment'] }}%</span>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-sm font-medium text-gray-500">Technology Fit</h4>
                                <div class="mt-1 flex items-center">
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-purple-600 h-2.5 rounded-full" style="width: {{ $match['compatibility']['Technology Fit'] }}%"></div>
                                    </div>
                                    <span class="ml-2 text-sm font-medium text-gray-700">{{ $match['compatibility']['Technology Fit'] }}%</span>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-sm font-medium text-gray-500">Growth Potential</h4>
                                <div class="mt-1 flex items-center">
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-green-600 h-2.5 rounded-full" style="width: {{ $match['compatibility']['Growth Potential'] }}%"></div>
                                    </div>
                                    <span class="ml-2 text-sm font-medium text-gray-700">{{ $match['compatibility']['Growth Potential'] }}%</span>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-sm font-medium text-gray-500">Cultural Fit</h4>
                                <div class="mt-1 flex items-center">
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-yellow-500 h-2.5 rounded-full" style="width: {{ $match['compatibility']['Cultural Fit'] }}%"></div>
                                    </div>
                                    <span class="ml-2 text-sm font-medium text-gray-700">{{ $match['compatibility']['Cultural Fit'] }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Section -->
                    <div class="px-6 py-5">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Profile</h3>
                        <div class="prose prose-sm max-w-none text-gray-500">
                            <p>{{ $corporate['description'] ?? $startup['description'] }}</p>
                            
                            @if($corporate['investment_focus'] ?? false)
                            <h4 class="text-md font-medium text-gray-900 mt-6">Investment Focus</h4>
                            <div class="mt-2 flex flex-wrap gap-2">
                                @foreach($corporate['investment_focus'] as $focus)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                    {{ $focus }}
                                </span>
                                @endforeach
                            </div>
                            @endif

                            @if($startup['founders'] ?? false)
                            <h4 class="text-md font-medium text-gray-900 mt-6">Founding Team</h4>
                            <ul class="mt-2 space-y-2">
                                @foreach($startup['founders'] as $founder)
                                <li class="flex items-center">
                                    <span class="h-6 w-6 rounded-full bg-gray-200 flex items-center justify-center mr-2">
                                        {{ strtoupper(substr($founder, 0, 1)) }}
                                    </span>
                                    {{ $founder }}
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>

                    <!-- Messages Section -->
                    <div class="px-6 py-5 border-t border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Communication</h3>
                        
                        @if(count($match['messages']) > 0)
                        <div class="space-y-4">
                            @foreach($match['messages'] as $message)
                            <div class="flex {{ $message['sender'] == session('user_type') ? 'justify-end' : '' }}">
                                <div class="{{ $message['sender'] == session('user_type') ? 'bg-indigo-100' : 'bg-gray-100' }} rounded-lg py-2 px-4 max-w-xs lg:max-w-md">
                                    <p class="text-sm text-gray-800">{{ $message['text'] }}</p>
                                    <p class="text-xs text-gray-500 mt-1 text-right">{{ \Carbon\Carbon::parse($message['date'])->diffForHumans() }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div class="text-center py-8 bg-gray-50 rounded-lg">
                            <i class="fas fa-comments text-4xl text-gray-400 mb-3"></i>
                            <h4 class="text-md font-medium text-gray-900">No messages yet</h4>
                            <p class="mt-1 text-sm text-gray-500">Start the conversation after connecting</p>
                        </div>
                        @endif

                        <div class="mt-6">
                            <form action="#" method="POST">
                                <div class="flex items-start space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold">
                                            {{ strtoupper(substr(session('user_name'), 0, 1)) }}
                                        </div>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="border border-gray-300 rounded-lg shadow-sm overflow-hidden focus-within:border-indigo-500 focus-within:ring-1 focus-within:ring-indigo-500">
                                            <label for="message" class="sr-only">Message</label>
                                            <textarea rows="3" name="message" id="message" class="block w-full py-3 border-0 resize-none focus:ring-0 sm:text-sm" placeholder="Type your message..."></textarea>
                                            <div class="flex justify-between items-center px-3 py-2 bg-gray-50 border-t border-gray-200">
                                                <div class="flex items-center space-x-5">
                                                    <button type="button" class="text-gray-400 hover:text-gray-500">
                                                        <i class="far fa-paperclip"></i>
                                                        <span class="sr-only">Attach file</span>
                                                    </button>
                                                </div>
                                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                                                    Send
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-4 mt-6 lg:mt-0">
                <!-- Compatibility Breakdown -->
                <div class="bg-white shadow rounded-lg mb-6">
                    <div class="px-6 py-5 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Compatibility Breakdown</h3>
                    </div>
                    <div class="px-6 py-5">
                        <div class="space-y-4">
                            @foreach($match['compatibility'] as $key => $value)
                            <div>
                                <div class="flex justify-between text-sm text-gray-500 mb-1">
                                    <span>{{ $key }}</span>
                                    <span class="font-medium">{{ $value }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="h-2 rounded-full 
                                        @if($value > 80) bg-green-500
                                        @elseif($value > 60) bg-blue-500
                                        @elseif($value > 40) bg-yellow-500
                                        @else bg-red-500
                                        @endif" 
                                        style="width: {{ $value }}%">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Key Information -->
                <div class="bg-white shadow rounded-lg mb-6">
                    <div class="px-6 py-5 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Key Information</h3>
                    </div>
                    <div class="px-6 py-5">
                        <dl class="space-y-6">
                            @if($corporate['industry'] ?? false)
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">Industry</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $corporate['industry'] }}</dd>
                            </div>
                            @endif
                            
                            @if($startup['stage'] ?? false)
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">Stage</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $startup['stage'] }}</dd>
                            </div>
                            @endif
                            
                            @if($startup['founded_year'] ?? false)
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">Founded</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $startup['founded_year'] }}</dd>
                            </div>
                            @endif
                            
                            @if($corporate['contact'] ?? $startup['contact'] ?? false)
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">Contact</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $corporate['contact'] ?? $startup['contact'] }}</dd>
                            </div>
                            @endif
                            
                            @if($startup['pitch_deck'] ?? false)
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">Pitch Deck</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <a href="{{ $startup['pitch_deck'] }}" target="_blank" class="text-indigo-600 hover:text-indigo-500">
                                        <i class="fas fa-external-link-alt mr-1"></i> View
                                    </a>
                                </dd>
                            </div>
                            @endif
                        </dl>
                    </div>
                </div>

                <!-- Suggested Actions -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-6 py-5 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Suggested Actions</h3>
                    </div>
                    <div class="px-6 py-5">
                        <ul class="space-y-3">
                            <li>
                                <a href="#" class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                    <span class="flex-shrink-0 h-6 w-6 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 group-hover:bg-purple-200">
                                        <i class="fas fa-calendar-alt text-xs"></i>
                                    </span>
                                    <span class="ml-3">Schedule a meeting</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                    <span class="flex-shrink-0 h-6 w-6 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 group-hover:bg-blue-200">
                                        <i class="fas fa-file-contract text-xs"></i>
                                    </span>
                                    <span class="ml-3">Request term sheet</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                    <span class="flex-shrink-0 h-6 w-6 rounded-full bg-green-100 flex items-center justify-center text-green-600 group-hover:bg-green-200">
                                        <i class="fas fa-users text-xs"></i>
                                    </span>
                                    <span class="ml-3">Introduce to team</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection