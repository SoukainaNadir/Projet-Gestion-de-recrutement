<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="/images/J.png">
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    @vite('resources/css/app.css')
    @yield('style')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="script.js"></script>
    <title> @yield('title')</title>
</head>
<body>
    <div class="container">
        <header>
            <nav class="container mx-auto px-10 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <img src="/images/Logo.png" alt="JobMatchCv" class="h-12">
                    </div>
                    <div class="flex items-center">
                        <div class="hidden md:block " style="display: flex; align-items :center">
                            <a href="{{ url('/') }}" class="text-gray-800 hover:text-gray-600 px-3 py-2 rounded-md text-lg font-medium">Home</a>
                            <a href="#" class="text-gray-800 hover:text-gray-600 px-3 py-2 rounded-md text-lg font-medium">Candidates</a>
                            <a href="{{ url('/Findjob') }}" class="text-gray-800 hover:text-gray-600 px-3 py-2 rounded-md text-lg font-medium">Jobs</a>
                            @if(auth()->check())
                            <a href="{{ url('/AdduploadCV') }}" class="text-gray-800 hover:text-gray-600 px-3 py-2 rounded-md text-lg font-medium">Upload
                            </a>
                            <!-- This is an example component -->
                            <div class="max-w-lg mx-auto">
                                <button class="block h-12 w-12 rounded-full overflow-hidden border-2 border-gray-600 focus:outline-none focus:bg-white " type="button" data-dropdown-toggle="dropdown"><img class="h-full w-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" /></button>
                                <!-- Dropdown menu -->
                                <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow-xl my-4" id="dropdown">
                                    <div class="px-4 py-3">
                                    <span class="block text-sm">{{ Auth::user()->name }}</span>
                                    <span class="block text-sm font-medium text-gray-900 truncate">{{ Auth::user()->email }}</span>
                                    </div>
                                    <ul class="py-1" aria-labelledby="dropdown">
                                    <li>
                                        <a href="{{route('profile.show') }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Account settings</a>
                                    </li>
                                    </ul>
                                </div>
                            </div>
                            <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>

                            @else
                            <a href="{{ url('/register') }}" class="text-gray-800 hover:text-gray-600 px-3 py-2 rounded-md text-lg font-medium">Upload your CV</a>
                            <a href="{{url('/login') }}" class="text-gray-800 hover:text-gray-600 px-3 py-2 rounded-md text-lg font-medium ">Sign Up</a>
                            <a href="{{url('/register') }}" class="text-white hover:text-gray-600 px-5 py-2 rounded-full text-m font-medium border-2 border-solid border-[#0081C9] ">Sign In</a>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        @yield('content')
    </div>

    @yield('script')
</body>





</html>
