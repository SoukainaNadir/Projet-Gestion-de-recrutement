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
                        <div class="hidden md:block">
                            <a href="{{ url('/') }}" class="text-gray-800 hover:text-gray-600 px-3 py-2 rounded-md text-lg font-medium">Home</a>
                            <a href="#" class="text-gray-800 hover:text-gray-600 px-3 py-2 rounded-md text-lg font-medium">Candidates</a>
                            <a href="{{ url('/Findjob') }}" class="text-gray-800 hover:text-gray-600 px-3 py-2 rounded-md text-lg font-medium">Jobs</a>
                            <a href="{{route('offer.create') }}" class="text-gray-800 hover:text-gray-600 px-3 py-2 rounded-md text-lg font-medium">Add a Job</a>
                        </div>
                        <div class="ml-4">
                            <a href="#" class="text-white hover:text-gray-600 px-5 py-2 rounded-full text-m font-medium border-2 border-solid border-[#0081C9] ">Login</a>
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
