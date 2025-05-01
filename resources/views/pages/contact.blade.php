@extends('layouts.app')

@section('title', 'Contact StartupConnect')

@section('content')
<div class="bg-white">
    <!-- Header -->
    <div class="relative pb-32 bg-gray-800">
        <div class="absolute inset-0">
            <img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1525130413817-d45c1d127c42?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1920&q=60&&sat=-100" alt="">
            <div class="absolute inset-0 bg-gray-800 mix-blend-multiply" aria-hidden="true"></div>
        </div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-white md:text-5xl lg:text-6xl">Contact Us</h1>
            <p class="mt-6 max-w-3xl text-xl text-gray-300">
                Have questions about how StartupConnect can help your business? Reach out to our team.
            </p>
        </div>
    </div>

    <!-- Contact Form -->
    <section class="-mt-32 max-w-7xl mx-auto relative z-10 pb-32 px-4 sm:px-6 lg:px-8" aria-labelledby="contact-heading">
        <h2 id="contact-heading" class="sr-only">Contact us</h2>
        <div class="grid grid-cols-1 gap-y-20 lg:grid-cols-3 lg:gap-y-0 lg:gap-x-8">
            <div class="bg-white py-16 px-6 shadow-2xl rounded-2xl sm:px-10 lg:col-span-2">
                <h3 class="text-2xl font-medium text-gray-900">Send us a message</h3>
                <form action="#" method="POST" class="mt-6 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                    <div>
                        <label for="first-name" class="block text-sm font-medium text-gray-900">First name</label>
                        <div class="mt-1">
                            <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="py-3 px-4 block w-full shadow-sm text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div>
                        <label for="last-name" class="block text-sm font-medium text-gray-900">Last name</label>
                        <div class="mt-1">
                            <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="py-3 px-4 block w-full shadow-sm text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email" class="py-3 px-4 block w-full shadow-sm text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-900">Phone</label>
                        <div class="mt-1">
                            <input type="text" name="phone" id="phone" autocomplete="tel" class="py-3 px-4 block w-full shadow-sm text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="subject" class="block text-sm font-medium text-gray-900">Subject</label>
                        <div class="mt-1">
                            <input type="text" name="subject" id="subject" class="py-3 px-4 block w-full shadow-sm text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <div class="flex justify-between">
                            <label for="message" class="block text-sm font-medium text-gray-900">Message</label>
                            <span id="message-max" class="text-sm text-gray-500">Max. 500 characters</span>
                        </div>
                        <div class="mt-1">
                            <textarea id="message" name="message" rows="4" class="py-3 px-4 block w-full shadow-sm text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" aria-describedby="message-max"></textarea>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <input id="privacy-policy" name="privacy-policy" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                            </div>
                            <div class="ml-3">
                                <label for="privacy-policy" class="text-sm text-gray-500">
                                    I agree to the <a href="#" class="font-medium text-gray-900 underline">Privacy Policy</a> and <a href="#" class="font-medium text-gray-900 underline">Terms of Service</a>.
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Contact Info -->
            <div class="bg-white py-16 px-6 shadow-2xl rounded-2xl sm:px-10">
                <h3 class="text-2xl font-medium text-gray-900">Contact information</h3>
                <div class="mt-6 space-y-6">
                    @foreach($offices as $office)
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-gray-400"></i>
                        </div>
                        <div class="ml-3 text-sm text-gray-500">
                            <p class="font-medium text-gray-900">{{ $office['location'] }}</p>
                            <p class="mt-1">{{ $office['address'] ?? 'No address provided' }}</p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-phone-alt text-gray-400"></i>
                        </div>
                        <div class="ml-3 text-sm text-gray-500">
                            <p class="font-medium text-gray-900">Phone</p>
                            <p class="mt-1">{{ $office['phone'] }}</p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <div class="ml-3 text-sm text-gray-500">
                            <p class="font-medium text-gray-900">Email</p>
                            <p class="mt-1">{{ $office['email'] }}</p>
                        </div>
                    </div>
                    <div class="border-t border-gray-200 pt-4"></div>
                    @endforeach
                </div>
                <h4 class="mt-8 text-lg font-medium text-gray-900">Follow us</h4>
                <div class="mt-4 flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Twitter</span>
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">LinkedIn</span>
                        <i class="fab fa-linkedin-in text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Facebook</span>
                        <i class="fab fa-facebook text-xl"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection