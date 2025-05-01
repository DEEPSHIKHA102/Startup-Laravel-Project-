@extends('layouts.app')

@section('title', 'About StartupConnect')

@section('content')
<div class="bg-white">
    <!-- Header -->
    <div class="relative bg-gray-900">
        <div class="absolute inset-0">
            <img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&auto=format&fit=crop&w=2850&q=80" alt="Team working">
            <div class="absolute inset-0 bg-gray-900 mix-blend-multiply" aria-hidden="true"></div>
        </div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">Our Mission</h1>
            <p class="mt-6 text-xl text-indigo-100 max-w-3xl">
                To accelerate innovation by creating meaningful connections between startups and established corporations.
            </p>
        </div>
    </div>

    <!-- Our Story -->
    <div class="py-16 bg-white overflow-hidden lg:py-24">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
                <div class="relative">
                    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        Our Story
                    </h2>
                    <p class="mt-3 text-lg text-gray-500">
                        Founded in 2025, StartupConnect began as a passion project between serial entrepreneurs who saw the challenges startups face when trying to connect with corporate partners.
                    </p>
                    <div class="mt-10 sm:mt-12">
                        <div class="mt-6">
                            <div class="rounded-md bg-gray-50 p-6">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div class="h-8 w-8 rounded-full bg-indigo-500 flex items-center justify-center text-white">
                                            <i class="fas fa-lightbulb"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-medium text-gray-900">The Problem We Saw</h3>
                                        <p class="mt-2 text-sm text-gray-500">
                                            Startups with great technology struggled to navigate corporate bureaucracies, while corporations wasted millions evaluating startups that weren't good fits.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-10 -mx-4 relative lg:mt-0" aria-hidden="true">
                    <img class="relative mx-auto rounded-lg shadow-xl" width="490" src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1000&q=80" alt="Founders meeting">
                </div>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-12 px-4 text-center sm:px-6 lg:px-8 lg:py-24">
            <div class="space-y-12">
                <div class="space-y-5 sm:mx-auto sm:max-w-xl sm:space-y-4 lg:max-w-5xl">
                    <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl">The People Behind StartupConnect</h2>
                    <p class="text-xl text-gray-500">
                        A diverse team with experience in startups, corporate innovation, and venture capital.
                    </p>
                </div>
                <ul class="mx-auto space-y-16 sm:grid sm:grid-cols-2 sm:gap-16 sm:space-y-0 lg:grid-cols-3 lg:max-w-5xl">
                    @foreach($team as $member)
                    <li>
                        <div class="space-y-6">
                            <img class="mx-auto h-40 w-40 rounded-full xl:w-56 xl:h-56 object-cover" src="{{ $member['image'] }}" alt="{{ $member['name'] }}">
                            <div class="space-y-2">
                                <div class="text-lg leading-6 font-medium space-y-1">
                                    <h3>{{ $member['name'] }}</h3>
                                    <p class="text-indigo-600">{{ $member['role'] }}</p>
                                </div>
                                <ul class="flex justify-center space-x-5">
                                    <li>
                                        <a href="{{ $member['twitter'] }}" class="text-gray-400 hover:text-gray-500">
                                            <span class="sr-only">Twitter</span>
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $member['linkedin'] }}" class="text-gray-400 hover:text-gray-500">
                                            <span class="sr-only">LinkedIn</span>
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- Stats -->
    <div class="bg-indigo-50">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:py-16 sm:px-6 lg:px-8 lg:py-20">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Trusted by innovators worldwide
                </h2>
                <p class="mt-3 text-xl text-gray-500 sm:mt-4">
                    Our numbers speak for themselves
                </p>
            </div>
            <div class="mt-10 text-center sm:max-w-3xl sm:mx-auto sm:grid sm:grid-cols-3 sm:gap-8">
                @foreach($stats as $stat)
                <div class="mt-10 sm:mt-0">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white mx-auto">
                        <i class="{{ $stat['icon'] }}"></i>
                    </div>
                    <div class="mt-5">
                        <div class="text-5xl font-extrabold text-gray-900">{{ $stat['value'] }}</div>
                        <div class="mt-1 text-base font-medium text-gray-500">{{ $stat['label'] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                <span class="block">Ready to join our community?</span>
                <span class="block text-indigo-600">Start your journey today.</span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                        Get started
                    </a>
                </div>
                <div class="ml-3 inline-flex rounded-md shadow">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50">
                        Contact us
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection