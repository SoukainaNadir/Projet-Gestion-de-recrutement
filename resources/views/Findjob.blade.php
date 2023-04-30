@extends('master.layout')


@section('title')
    Job Offers
@endsection

@section('content')
<body class="bg-[#F9AF16] font-Inconsolata">
    <div class="container mx-auto px-8">
        @if(session()->has('success'))
        <div id="error-msg" class="max-w-4xl mx-auto bg-green-100 border border-green-400  px-4 py-3 rounded relative" role="alert">
            {{ session()->get('success') }}
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg id="close-button" class=" fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path d="M14.348 5.652c-.195-.195-.512-.195-.707 0L10 9.293 5.652 5.944c-.195-.195-.512-.195-.707 0-.195.195-.195.512 0 .707L9.293 10l-4.348 4.348c-.195.195-.195.512 0 .707.097.098.225.147.353.147s.256-.049.353-.147L10 10.707l4.348 4.348c.098.098.225.147.353.147s.256-.049.353-.147c.195-.195.195-.512 0-.707L10.707 10l4.348-4.348c.195-.195.195-.512 0-.707z"/>
                </svg>
            </span>
        </div>
        @endif


        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 mb-12">Job Offers</h1>
            </div>
            <form action="{{ route('search') }}" method="GET" class="flex justify-center items-center m-6">
                <input type="text" name="search" class=" w-80 px-4 py-2 border border-gray-400 rounded-md mr-2" placeholder="Search jobs" required/>
                <button type="submit" class="bg-[#0081C9] hover:bg-[#3AB4F2] text-white px-4 py-2 rounded-md">Search</button>
            </form>

            <div class="container">
                @foreach ($offers as $offer)
                @php
                    $date=$offer->created_at;
                    $date = Carbon\Carbon::parse($date);
                    $elapsed=$date->diffForHumans();
                @endphp
                <div class=" relative container mx-auto bg-white rounded-xl shadow-md overflow-hidden my-16">
                    <div class="md:flex ">
                        <div class="md:flex-shrink-0">
                            <img class="h-48 w-full object-cover md:w-48" src="{{ asset('./uploads/'.$offer->image) }}" alt="Job">
                        </div>
                        <div class="p-8 ">
                            <i class="fas fa-suitcase text-gray-400"></i>
                            <span class="ml-2 text-gray-500">  <table>Type : Contrat </table></span>
                            <a href="{{ route('offer.show',$offer->slug) }}" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">{{ $offer->title }}</a>

                            <div class="mt-4">
                                <h1 class="text-gray-600 font-semibold">Location:</h1>
                                <div class="mr-4 mb-2">
                                    <i class="fas fa-map-marker-alt text-gray-400"></i>
                                    <span class="ml-2 text-gray-500">{{ $offer->description }}</span>
                                </div>

                            </div>
                            <div class="mt-4">
                            <h1 class="text-gray-600 font-semibold">Salary:</h1>
                            <div class="mr-4 mb-2">
                                <i class="fas fa-money-bill-wave text-gray-400"></i>
                                <span class="ml-2 text-gray-500">{{ $offer->salary }}$</span>
                            </div>
                            </div>
                            <div class="mt-4">
                                <h1 class="text-gray-600 font-semibold">Job Description:</h1>
                                <p class="mt-1 text-gray-900">
                                    {{ Str::limit($offer->description)}}
                                </p>

                                <span class="inline-block my-3 bg-gray-200 rounded-full py-1 text-sm font-semibold text-gray-700"><i class="far fa-user"></i> {{ $offer->user ? $offer->user->name : null }}</span>
                            </div>
                            <div class="flex items-center mb-2 md:mb-0 md:mr-4">
                                <i class="fa fa-calendar text-gray-500 text-lg mr-2" aria-hidden="true"></i>
                                <p class="font-semibold text-gray-600">Start Date: {{ $offer->start_date }}</p>
                            </div>
                            <div class="flex items-center mt-1">
                                <i class="fa fa-calendar text-gray-500 text-lg mr-2" aria-hidden="true"></i>
                                <p class="font-semibold text-gray-600">Expired Date: {{ $offer->expired_date }}</p>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('offer.show',$offer->slug) }}" class="inline-block bg-[#0081C9] hover:bg-[#3AB4F2]  text-white py-2 px-4 rounded-lg">More details</a>
                            </div>
                        </div>
                    </div>
                        <div class=" absolute right-8 mt-4 items-center top-4 space-x-2">
                            <i class="fas fa-clock text-gray-400"></i>
                            <span class="text-gray-500 text-sm">{{ $offer->created_at->diffForHumans()}}</span>
                        </div>
                    </div>
                    @endforeach
            </div>
                </div>

            <div class="flex justify-center ">
                <div class="flex justify-center items-center mt-8">
                    <div class="flex">
                        @if ($offers->onFirstPage())
                            <span class="border border-gray-300 rounded-l px-3 py-2 bg-gray-200 cursor-not-allowed">&laquo;</span>
                        @else
                            <a href="{{ $offers->previousPageUrl() }}" class="border border-gray-300 rounded-l px-3 py-2 bg-gray-200 hover:bg-gray-300">&laquo;</a>
                        @endif

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
@endsection


@section('script')
    <script>

        const closeButton = document.querySelector('#close-button');
        const alertPanel = document.querySelector('#error-msg');
        closeButton.addEventListener('click', () => {
        alertPanel.classList.add('hidden');
        });



    </script>
@endsection
