@extends('master.layout')


@section('title')
    Job Offers
@endsection
@section('content')
<body class="bg-[#F9AF16] font-Inconsolata ">
    <div class="container mx-auto px-8">
        <h1 class="text-3xl font-semibold mb-4">Search results for "{{$searchTerm }}"</h1>
        @if($offers->isNotEmpty())
        <div class="flex flex-wrap gap-6">
          @foreach($offers as $offer)
          <div class="bg-white shadow-lg rounded-lg overflow-hidden w-[32%]" >
            <div class="md:flex-shrink-0 flex justify-center">
              <img class="bg-cover bg-center h-64 p-4" src="{{ asset('./uploads/'.$offer->image) }}" alt="Job">
            </div>
            <div class="p-4">
              <h3 class="font-bold text-xl mb-2">{{ $offer->title }}</h3>
              <p class="text-gray-700 text-base">{{ $offer->description }}</p>
            </div>
            <div class="p-4 border-t border-gray-300">
              <div class="flex justify-between items-center">
                <a href="{{ route('offer.show',$offer->slug) }}" class="text-blue-500 font-bold hover:underline">View job</a>
                <span class="font-bold text-gray-700">{{ $offer->created_at->format('M d, Y') }}</span>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        @else
        <p>No jobs found.</p>
        @endif
      </div>



</body>
@endsection
