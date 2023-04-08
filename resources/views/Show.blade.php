@extends('master.layout')


@section('title')
    {{ $offer->title }}
@endsection

@section('content')
<body class="bg-[#F9AF16] font-Inconsolata">
    {{-- <div class="container flex justify-center items-center h-screen">
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
    </div> --}}

    <div class="container">
        <div class=" container max-w-4xl mx-auto bg-white rounded-xl shadow-md overflow-hidden my-16">
        <div class="md:flex relative">
            <div class="md:flex-shrink-0">
                <img class="h-48 w-full object-cover md:w-48" src="{{ asset('./uploads/'.$offer->image) }}" alt="Job">
            </div>
            <div class="p-8 ">
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
                <a href="{{ route('offer.show',$offer->slug) }}" class="inline-block bg-[#0081C9] hover:bg-[#3AB4F2]  text-white py-2 px-4 rounded-lg">Apply Now</a>
                <a href="{{ route('offer.edit',$offer->slug) }}" class="inline-block bg-[#858b5d] hover:bg-[#5d6037]  text-white py-2 px-4 rounded-lg">Update offer</a>
                <form id ="{{ $offer->id }}"action="{{ route('offer.delete',$offer->slug) }}" method="post">
                    @csrf
                    @method('DELETE')
                </form>
                <button
                onclick="event.preventDefault();
                if(confirm('Once you delete your offer, it cannot be restored. Are you absolutely sure that you want to proceed with this action?'))
                document.getElementById({{ $offer->id }}).submit();" 
                type="submit" class="absolute bottom-4 right-4 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg">
                    <i class="fas fa-trash"></i>
                </button>
                
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
