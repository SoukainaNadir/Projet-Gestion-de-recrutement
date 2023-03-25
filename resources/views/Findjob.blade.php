@extends('master.layout')


@section('title')
    CV
@endsection

@section('content')
<body class="bg-[#F9AF16] font-Inconsolata">
    <div class="container mx-auto">
        <header class="flex justify-between items-center p-3">
            <div class="flex items-center">
                <img src="/storage/app/public/images/Logo.png" alt="JobMatchCv" class="h-12">
            </div>
            <form class="flex items-center">
                <input type="text" class="px-4 py-2 border border-gray-400 rounded-md mr-2" placeholder="Search jobs">
                <button type="submit" class="bg-[#0081C9] text-white px-4 py-2 rounded-md">Search</button>
            </form>
        </header>
        <div class="container mx-auto mt-6">
            <h2 class="font-bold text-2xl mb-4"></h2>
            <!-- Job offers list goes here -->
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Job Offers</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($offers as $offer)
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <img src="..." alt="" class="w-full h-56 object-cover">
                    <div class="p-4">
                        <h2 class="text-lg font-bold text-gray-900 mb-2">{{ $offer["title"] }}</h2>
                        <p class="text-gray-700 mb-4">{{ $offer["description"] }}</p>
                        <a href="#" class="inline-block bg-[#0081C9] hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Apply Now</a>
                    </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>    
    {{-- @foreach ($Offers as $Offer )
    {{$CV["title"]}}
    @endforeach --}}
@endsection


@section('script')
    <script>
        
    </script>
@endsection
