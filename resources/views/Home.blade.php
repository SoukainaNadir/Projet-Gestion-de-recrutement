
@extends('master.layout')


@section('title')
    Accueil
@endsection

@section('content')
<body class="bg-[url('/storage/app/public/images/bg.jpg')] bg-cover bg-center font-Inconsolata">
    <header>
        <nav class="container mx-auto px-10 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <a href="#" class="text-gray-800 text-xl font-bold hover:text-gray-700">JobMatchCV</a>
                </div>
                <div class="flex items-center">
                    <div class="hidden md:block">
                        <a href="#" class="text-gray-800 hover:text-gray-600 px-3 py-2 rounded-md text-lg font-medium">Home</a>
                        <a href="#" class="text-gray-800 hover:text-gray-600 px-3 py-2 rounded-md text-lg font-medium">Candidates</a>
                        <a href="#" class="text-gray-800 hover:text-gray-600 px-3 py-2 rounded-md text-lg font-medium">Jobs</a>
                    </div>
                    <div class="ml-4">
                        <a href="#" class="text-white hover:text-gray-600 px-5 py-2 rounded-full text-m font-medium border-2 border-solid border-[#0081C9] ">Login</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="container mx-auto px-10 py-20">
        <h1 class="text-6xl  mb-6">Smart recruitment </h1>
        <h1 class="text-6xl text-[#0081C9]">starts with us.</h1>
    </div>
    <div class="fixed  px-6 py-10 w-full bottom-0 left-0 ">
        <div class="flex justify-center py-4 space-x-9">
        <a href="#" class="bg-[#2790CB] hover:bg-[#bcb8b4] text-white font-bold py-2 px-5 rounded-full">Find a job</a>
        <a href="#" class="bg-[#3AB4F2] hover:bg-[#bcb8b4] text-white font-bold py-2 px-5 rounded-full">Offer a job</a>
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
@endsection


@section('script')
    <script>
        
    </script>
@endsection
