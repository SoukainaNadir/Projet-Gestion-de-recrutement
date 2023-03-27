@extends('master.layout')


@section('title')
    {{ $offer->title }}
@endsection

@section('content')
<body class="bg-[#F9AF16] font-Inconsolata">
    <div class="container flex justify-center items-center h-screen">
        <div class="w-full md:w-1/2 lg:w-1/7 px-4">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 mb-12">More details</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4">
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <img src="{{ asset($offer->image) }}" alt="" class="w-full h-52 object-cover">
                    <div class="p-4">
                        <h2 class="text-lg font-bold text-gray-900 mb-2">{{ $offer->title }}</h2>
                        <p class="text-gray-700 mb-4">{{ $offer->description}}</p>
                        <a href="#" class="inline-block bg-[#0081C9] hover:bg-[#3AB4F2] text-white font-bold py-2 px-4 rounded">Apply Now</a>
                    </div>
                </div>
            </div>
        </div>    
    </div>
      </div>
      
    

</body>    
@endsection


@section('script')
    <script>
        
    </script>
@endsection
