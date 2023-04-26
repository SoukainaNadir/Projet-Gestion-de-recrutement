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
            <form class="flex justify-center items-center m-6">
                <input type="text" class=" w-80 px-4 py-2 border border-gray-400 rounded-md mr-2" placeholder="Search jobs">
                <button type="submit" class="bg-[#0081C9] hover:bg-[#3AB4F2] text-white px-4 py-2 rounded-md">Search</button>
            </form>
                <div class="container">
                @foreach ($offers as $offer)
                <div class=" container mx-auto bg-white rounded-xl shadow-md overflow-hidden my-16">
                <div class="md:flex ">
                    <div class="md:flex-shrink-0">
                        <img class="h-48 w-full object-cover md:w-48" src="{{ asset('./uploads/'.$offer->image) }}" alt="Job">
                    </div>
                    <div class="p-8">
                        <p for="jobtype" class="uppercase tracking-wide text-sm text-indigo-500 font-semibold"> Type: {{ $offer->jobtype }}</p>
                        <a href="{{ route('offer.show',$offer->slug) }}" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">{{ $offer->title }}</a>
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

                        <a href="{{ route('offer.show',$offer->slug) }}" class="inline-block bg-[#0081C9] hover:bg-[#3AB4F2]  text-white py-2 px-4 rounded-lg">More details</a>
                        </div>
                    </div>
                    <div class="p-8 ml-24">
                        <p class="font-semibold text-gray-600"><i class="fa fa-calendar text-[#0081C9] " aria-hidden="true"></i> Start Date: {{ $offer->start_date }}</p>
                        <p class="font-semibold text-gray-600"><i class="fa fa-calendar text-[#0081C9]" aria-hidden="true"></i> Expired Date: {{ $offer->expired_date }}</p>
                    </div>
                </div>
            </div>
                @endforeach
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
