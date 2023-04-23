@extends('master.layout')

@section('title')
    Your CVs
@endsection

@section('content')
<body class="bg-[#F9AF16] font-Inconsolata">


<div class=" container mx-auto px-8">
    <div class="text-center">
        <h1 class="text-4xl font-bold text-gray-900 mb-12">Your Cv</h1>
    </div>

    @if(auth()->user()->cvs()->count() > 0)
        @foreach (auth()->user()->cvs as $cv )
        <div class="bg-white shadow-lg rounded-lg px-8 py-8 mt-8 mb-12 relative">

                <div class="items-center justify-between mb-4">
                <h2 class="text-xl font-bold text-gray-800">{{ $cv->name }}</h2>
                <div class="text-sm font-semibold text-gray-600">{{ $cv->headline }}</div>
                <div class="md:flex-shrink-0">
                    <img class="h-48 w-full object-cover md:w-48" src="{{asset('./uploads/'.$cv->image)}}" alt="profil">
                </div>

                </div>
                <hr class="my-4" />
                <div class="text-sm font-semibold text-gray-600">{{ $cv->profil }}</div>
                <hr class="my-4" />
                <div class="flex items-center mb-2">
                <i class="fas fa-phone text-gray-600 mr-2"></i>
                <div class="text-gray-800">{{ $cv->phone }}</div>
                </div>
                <div class="flex items-center mb-2">
                <i class="fas fa-envelope text-gray-600 mr-2"></i>
                <div class="text-gray-800">{{ $cv->email }}</div>
                </div>
                <div class="flex items-center mb-2">
                <i class="fas fa-map-marker-alt text-gray-600 mr-2"></i>
                <div class="text-gray-800">{{ $cv->address }}</div>
                </div>
                <hr class="my-4" />
                <div class="flex mb-6">
                    <div class="w-1/2 pr-4">
                        <div class="text-lg font-bold text-gray-800 mb-2">Education</div>
                        <ul class="list-disc list-inside">
                            @foreach (explode("\n", $cv->education) as $education)
                                <li>{{ $education }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="w-1/2 pl-4">
                        <div class="text-lg font-bold text-gray-800 mb-2">Experience</div>
                        <ul class="list-disc list-inside">
                            @foreach (explode("\n", $cv->experience) as $experience)
                                <li>{{ $experience }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <hr class="my-4" />
                <div class="flex mb-6">
                <div class="w-1/2 pr-4">
                    <div class="text-lg font-bold text-gray-800 mb-2">Skills</div>
                    <ul class="list-disc list-inside">
                        @foreach (explode("\n", $cv->skills) as $skill)
                            <li>{{ $skill }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="w-1/2 pr-4">
                    <div class="text-lg font-bold text-gray-800 mb-2">Languages</div>
                    <ul class="list-disc list-inside">
                        @foreach (explode("\n", $cv->languages) as $languages)
                            <li>{{ $languages }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="w-1/2 pl-4">
                    <div class="text-lg font-bold text-gray-800 mb-2">Interests</div>
                    <ul class="list-disc list-inside">
                        @foreach (explode("\n", $cv->interests) as $interest)
                            <li>{{ $interest }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="absolute bottom-8 right-8 ">
                <a href="" class="inline-block px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded-sm text-sm mr-2">Edit</a>
                <form action="" method="post" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-block px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded-sm text-sm" onclick="return confirm('Are you sure you want to delete this CV?')">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
@endif


</div>

</body>
@endsection
