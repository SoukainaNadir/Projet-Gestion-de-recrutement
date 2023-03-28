@extends('master.layout')


@section('title')
    Job Offers
@endsection

@section('content')
<body class="bg-[#F9AF16] font-Inconsolata">
    <div class="container mx-auto px-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 mb-12">Job Offers</h1>
            </div>
            <form class="flex justify-center items-center m-6">
                <input type="text" class=" w-80 px-4 py-2 border border-gray-400 rounded-md mr-2" placeholder="Search jobs">
                <button type="submit" class="bg-[#0081C9] text-white px-4 py-2 rounded-md">Search</button>
            </form>
                <div class="container">
                @foreach ($offers as $offer)
                <div class=" container mx-auto bg-white rounded-xl shadow-md overflow-hidden my-16">
                <div class="md:flex ">
                    <div class="md:flex-shrink-0">
                        <img class="h-48 w-full object-cover md:w-48" src="{{ asset($offer->image) }}" alt="Job">
                    </div>
                    <div class="p-8">
                        <p class="uppercase tracking-wide text-sm text-indigo-500 font-semibold"> Type: {{ $offer->jobtype }}</p>
                        <a href="#" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">{{ $offer->title }}</a>
                        <p class="mt-2 text-gray-500">We are looking for an experienced {{ $offer->title }} to join our team.</p>
                        <div class="mt-4">
                            <h1 class="text-gray-600 font-semibold">Location:</h1>
                            <div class="mt-1 text-gray-900">{{ Str::limit($offer->location)}}</div>
                        </div>
                        <div class="mt-4">
                        <h1 class="text-gray-600 font-semibold">Salary:</h1>
                        <p class="mt-1 text-gray-900">{{ $offer->salary }}$ per an</p>
                        </div>
                        <div class="mt-4">
                            <h1 class="text-gray-600 font-semibold">Job Description:</h1>
                            <p class="mt-1 text-gray-900">
                                {{ Str::limit($offer->description)}}
                            </p>
                        </div>
                        <div class="mt-8">
                        <a href="{{ route('offer.show',$offer->slug) }}" class="inline-block bg-indigo-500 hover:bg-indigo-600 text-white py-2 px-4 rounded-lg">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
                
                @endforeach
            
                </div>
            {{-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                
                @foreach ($offers as $offer)
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                        <img src="{{ asset($offer->image) }}" alt="" class="w-full h-56 object-cover">
                        <div class="p-4">
                            <h2 class="text-lg font-bold text-gray-900 mb-2">{{ $offer->title }}</h2>
                            <p class="text-gray-700 mb-4">{{ Str::limit($offer->description)}}</p>
                            <a href="{{ route('offer.show',$offer->slug) }}" class="inline-block bg-[#0081C9] hover:bg-[#3AB4F2] text-white font-bold py-2 px-4 rounded">More details</a>
                        </div>
                    </div>
                @endforeach
            </div> --}}





            
            <div class="flex justify-center ">
                <div class="flex justify-center items-center mt-8">
                    <div class="flex">      
                        @if ($offers->onFirstPage())
                            <span class="border border-gray-300 rounded-l px-3 py-2 bg-gray-200 cursor-not-allowed">&laquo;</span>
                        @else
                            <a href="{{ $offers->previousPageUrl() }}" class="border border-gray-300 rounded-l px-3 py-2 bg-gray-200 hover:bg-gray-300">&laquo;</a>
                        @endif 
                        
                        {{-- @foreach ($offers as $offer)
                            @if ($offer->url)
                                <a href="{{ $offer->url }}" class="{{ $offer->active ? 'border-blue-500 bg-blue-500 text-white' : 'border-gray-300 hover:bg-gray-200' }} px-3 py-2 border">{{ $offer->label }}</a>
                            @else
                                <span class="border border-gray-300 px-3 py-2 cursor-not-allowed">{{ $offer->label }}</span>
                            @endif
                        @endforeach --}}

                        @if ($offers->hasMorePages())
                            <a href="{{ $offers->nextPageUrl() }}" class="border border-gray-300 rounded-r px-3 py-2 bg-gray-200 hover:bg-gray-300">&raquo;</a>
                        @else
                            <span class="border border-gray-300 rounded-r px-3 py-2 bg-gray-200 cursor-not-allowed">&raquo;</span>
                        @endif
                    </div>
                </div>
                
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
