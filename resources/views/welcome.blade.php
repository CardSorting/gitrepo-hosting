<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHost - Premier HTML5 Game Hosting Platform</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</head>
<body class="bg-gray-900 text-white">
    <!-- Navigation -->
    <nav class="bg-gray-900/95 backdrop-blur-sm fixed w-full z-50 border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="flex items-center space-x-2">
                        <svg class="w-8 h-8 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-xl font-bold bg-gradient-to-r from-indigo-500 to-purple-500 bg-clip-text text-transparent">GameHost</span>
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    @auth
                        <a href="/dashboard" class="text-gray-300 hover:text-white transition">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-gray-300 hover:text-white transition">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-300 hover:text-white transition">Login</a>
                        <a href="{{ route('register') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-lg transition">Start Free</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative min-h-screen flex items-center">
        <!-- Animated background -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-indigo-900/40 via-gray-900 to-gray-900"></div>
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%239C92AC\" fill-opacity=\"0.05\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <h1 class="text-5xl md:text-6xl font-bold leading-tight">
                        <span class="block">Level Up Your</span>
                        <span class="block bg-gradient-to-r from-indigo-500 to-purple-500 bg-clip-text text-transparent">Game Hosting</span>
                    </h1>
                    <p class="mt-6 text-xl text-gray-300 leading-relaxed">
                        Deploy, scale, and monetize your HTML5 games with enterprise-grade infrastructure. Built for serious game developers.
                    </p>
                    <div class="mt-8 flex flex-col sm:flex-row gap-4">
                        @auth
                            <a href="/dashboard" class="inline-flex items-center justify-center px-8 py-4 text-lg font-medium rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 transition transform hover:scale-105">
                                Go to Dashboard
                                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-4 text-lg font-medium rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 transition transform hover:scale-105">
                                Start Hosting Free
                                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        @endauth
                        <a href="#features" class="inline-flex items-center justify-center px-8 py-4 text-lg font-medium rounded-xl border border-gray-700 hover:border-gray-600 transition">
                            Explore Features
                        </a>
                    </div>
                    <div class="mt-8 flex items-center gap-4 text-gray-400">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="ml-2">Free SSL</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="ml-2">Global CDN</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="ml-2">24/7 Support</span>
                        </div>
                    </div>
                </div>
                <div class="relative lg:block" data-aos="fade-left">
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/30 to-purple-500/30 rounded-2xl filter blur-3xl"></div>
                    <img src="https://images.unsplash.com/photo-1552820728-8b83bb6b773f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Game development" class="relative rounded-2xl shadow-2xl">
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-gray-800/50 py-12" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl font-bold text-indigo-500">99.9%</div>
                    <div class="mt-2 text-gray-400">Uptime</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-indigo-500">50ms</div>
                    <div class="mt-2 text-gray-400">Avg. Latency</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-indigo-500">10k+</div>
                    <div class="mt-2 text-gray-400">Games Hosted</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-indigo-500">1M+</div>
                    <div class="mt-2 text-gray-400">Daily Players</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div id="features" class="py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center" data-aos="fade-up">
                <h2 class="text-base font-semibold leading-7 text-indigo-400">Powerful Features</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight sm:text-4xl bg-gradient-to-r from-indigo-500 to-purple-500 bg-clip-text text-transparent">
                    Everything you need to succeed
                </p>
                <p class="mt-6 text-lg leading-8 text-gray-300">
                    Built by game developers, for game developers. Our platform provides all the tools you need to launch and scale your games.
                </p>
            </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-3">
                    <!-- Feature 1 -->
                    <div class="flex flex-col" data-aos="fade-up" data-aos-delay="100">
                        <dt class="flex items-center gap-x-3 text-xl font-semibold leading-7 text-white">
                            <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-indigo-600">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            Instant Deployment
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-300">
                            <p class="flex-auto">Deploy your HTML5 games in seconds with our automated build system and global CDN.</p>
                            <p class="mt-4">
                                <a href="#" class="text-sm font-semibold leading-6 text-indigo-400">Learn more <span aria-hidden="true">→</span></a>
                            </p>
                        </dd>
                    </div>

                    <!-- Feature 2 -->
                    <div class="flex flex-col" data-aos="fade-up" data-aos-delay="200">
                        <dt class="flex items-center gap-x-3 text-xl font-semibold leading-7 text-white">
                            <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-indigo-600">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            Real-time Analytics
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-300">
                            <p class="flex-auto">Track player engagement, retention, and revenue with our powerful analytics suite.</p>
                            <p class="mt-4">
                                <a href="#" class="text-sm font-semibold leading-6 text-indigo-400">Learn more <span aria-hidden="true">→</span></a>
                            </p>
                        </dd>
                    </div>

                    <!-- Feature 3 -->
                    <div class="flex flex-col" data-aos="fade-up" data-aos-delay="300">
                        <dt class="flex items-center gap-x-3 text-xl font-semibold leading-7 text-white">
                            <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-indigo-600">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            Multiplayer Ready
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-300">
                            <p class="flex-auto">Built-in WebSocket support and matchmaking for multiplayer game development.</p>
                            <p class="mt-4">
                                <a href="#" class="text-sm font-semibold leading-6 text-indigo-400">Learn more <span aria-hidden="true">→</span></a>
                            </p>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <!-- Game Showcase -->
    <div class="py-24 bg-gray-800/50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center" data-aos="fade-up">
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl bg-gradient-to-r from-indigo-500 to-purple-500 bg-clip-text text-transparent">
                    Featured Games
                </h2>
                <p class="mt-6 text-lg leading-8 text-gray-300">
                    Discover amazing games powered by our platform
                </p>
            </div>
            <div class="mt-16 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Game Card 1 -->
                <div class="relative group" data-aos="fade-up" data-aos-delay="100">
                    <div class="relative h-80 w-full overflow-hidden rounded-lg bg-white group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 lg:aspect-w-1 lg:aspect-h-1">
                        <img src="https://images.unsplash.com/photo-1552820728-8b83bb6b773f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Featured Game 1" class="h-full w-full object-cover object-center">
                    </div>
                    <h3 class="mt-6 text-xl text-white">
                        <a href="#">
                            <span class="absolute inset-0"></span>
                            Cyber Quest
                        </a>
                    </h3>
                    <p class="text-base text-gray-300">Action RPG</p>
                </div>

                <!-- Game Card 2 -->
                <div class="relative group" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative h-80 w-full overflow-hidden rounded-lg bg-white group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 lg:aspect-w-1 lg:aspect-h-1">
                        <img src="https://images.unsplash.com/photo-1556438064-2d7646166914?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Featured Game 2" class="h-full w-full object-cover object-center">
                    </div>
                    <h3 class="mt-6 text-xl text-white">
                        <a href="#">
                            <span class="absolute inset-0"></span>
                            Space Warriors
                        </a>
                    </h3>
                    <p class="text-base text-gray-300">Multiplayer Strategy</p>
                </div>

                <!-- Game Card 3 -->
                <div class="relative group" data-aos="fade-up" data-aos-delay="300">
                    <div class="relative h-80 w-full overflow-hidden rounded-lg bg-white group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 lg:aspect-w-1 lg:aspect-h-1">
                        <img src="https://images.unsplash.com/photo-1551103782-8ab07afd45c1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Featured Game 3" class="h-full w-full object-cover object-center">
                    </div>
                    <h3 class="mt-6 text-xl text-white">
                        <a href="#">
                            <span class="absolute inset-0"></span>
                            Pixel Racers
                        </a>
                    </h3>
                    <p class="text-base text-gray-300">Racing</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Pricing Section -->
    <div class="py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center" data-aos="fade-up">
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl bg-gradient-to-r from-indigo-500 to-purple-500 bg-clip-text text-transparent">
                    Simple, transparent pricing
                </h2>
                <p class="mt-6 text-lg leading-8 text-gray-300">
                    Choose the perfect plan for your game's needs
                </p>
            </div>
            <div class="mx-auto mt-16 grid max-w-lg grid-cols-1 gap-8 lg:max-w-none lg:grid-cols-3">
                <!-- Starter Plan -->
                <div class="flex flex-col justify-between rounded-3xl bg-gray-800/50 p-8 ring-1 ring-gray-700 xl:p-10" data-aos="fade-up" data-aos-delay="100">
                    <div>
                        <h3 class="text-lg font-semibold leading-8 text-indigo-400">Starter</h3>
                        <p class="mt-4 text-sm leading-6 text-gray-300">Perfect for indie developers just getting started.</p>
                        <p class="mt-6 flex items-baseline gap-x-1">
                            <span class="text-4xl font-bold tracking-tight text-white">$0</span>
                            <span class="text-sm font-semibold leading-6 text-gray-300">/month</span>
                        </p>
                        <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-300">
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                1 Game Hosting
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                Basic Analytics
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                Community Support
                            </li>
                        </ul>
                    </div>
                    <a href="{{ route('register') }}" class="mt-8 block rounded-md py-2 px-3 text-center text-sm font-semibold leading-6 text-white bg-indigo-600 hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get started</a>
                </div>

                <!-- Pro Plan -->
                <div class="flex flex-col justify-between rounded-3xl bg-gray-800/50 p-8 ring-1 ring-gray-700 xl:p-10" data-aos="fade-up" data-aos-delay="200">
                    <div>
                        <h3 class="text-lg font-semibold leading-8 text-indigo-400">Pro</h3>
                        <p class="mt-4 text-sm leading-6 text-gray-300">For professional game developers ready to scale.</p>
                        <p class="mt-6 flex items-baseline gap-x-1">
                            <span class="text-4xl font-bold tracking-tight text-white">$49</span>
                            <span class="text-sm font-semibold leading-6 text-gray-300">/month</span>
                        </p>
                        <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-300">
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                Unlimited Games
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                Advanced Analytics
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                Priority Support
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                Custom Domain
                            </li>
                        </ul>
                    </div>
                    <a href="{{ route('register') }}" class="mt-8 block rounded-md py-2 px-3 text-center text-sm font-semibold leading-6 text-white bg-indigo-600 hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get started</a>
                </div>

                <!-- Enterprise Plan -->
                <div class="flex flex-col justify-between rounded-3xl bg-gray-800/50 p-8 ring-1 ring-gray-700 xl:p-10" data-aos="fade-up" data-aos-delay="300">
                    <div>
                        <h3 class="text-lg font-semibold leading-8 text-indigo-400">Enterprise</h3>
                        <p class="mt-4 text-sm leading-6 text-gray-300">Custom solutions for large-scale game studios.</p>
                        <p class="mt-6 flex items-baseline gap-x-1">
                            <span class="text-4xl font-bold tracking-tight text-white">Custom</span>
                        </p>
                        <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-300">
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                Unlimited Everything
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                Dedicated Support
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                Custom Integration
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                SLA Guarantee
                            </li>
                        </ul>
                    </div>
                    <a href="#" class="mt-8 block rounded-md py-2 px-3 text-center text-sm font-semibold leading-6 text-white bg-indigo-600 hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Contact Sales</a>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="relative isolate mt-32 px-6 py-32 sm:mt-56 sm:py-40 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight sm:text-4xl bg-gradient-to-r from-indigo-500 to-purple-500 bg-clip-text text-transparent">
                Ready to launch your game?
            </h2>
            <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-gray-300">
                Join thousands of game developers who trust GameHost. Start your journey today.
            </p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="{{ route('register') }}" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Get started
                </a>
                <a href="#features" class="text-sm font-semibold leading-6 text-white">
                    Learn more <span aria-hidden="true">→</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="border-t border-gray-800">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Product</h3>
                    <ul role="list" class="mt-4 space-y-4">
                        <li>
                            <a href="#" class="text-base text-gray-300 hover:text-white">Features</a>
                        </li>
                        <li>
                            <a href="#" class="text-base text-gray-300 hover:text-white">Pricing</a>
                        </li>
                        <li>
                            <a href="#" class="text-base text-gray-300 hover:text-white">Documentation</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Company</h3>
                    <ul role="list" class="mt-4 space-y-4">
                        <li>
                            <a href="#" class="text-base text-gray-300 hover:text-white">About</a>
                        </li>
                        <li>
                            <a href="#" class="text-base text-gray-300 hover:text-white">Blog</a>
                        </li>
                        <li>
                            <a href="#" class="text-base text-gray-300 hover:text-white">Careers</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Support</h3>
                    <ul role="list" class="mt-4 space-y-4">
                        <li>
                            <a href="#" class="text-base text-gray-300 hover:text-white">Help Center</a>
                        </li>
                        <li>
                            <a href="#" class="text-base text-gray-300 hover:text-white">API Status</a>
                        </li>
                        <li>
                            <a href="#" class="text-base text-gray-300 hover:text-white">Contact</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Legal</h3>
                    <ul role="list" class="mt-4 space-y-4">
                        <li>
                            <a href="#" class="text-base text-gray-300 hover:text-white">Privacy</a>
                        </li>
                        <li>
                            <a href="#" class="text-base text-gray-300 hover:text-white">Terms</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-800 pt-8 flex items-center justify-between">
                <p class="text-base text-gray-400">&copy; {{ date('Y') }} GameHost. All rights reserved.</p>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-gray-300">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-300">
                        <span class="sr-only">GitHub</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                easing: 'ease-out',
                once: true
            });
        });
    </script>
</body>
</html>
