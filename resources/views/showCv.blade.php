@extends('master.layout')

@section('title')
    Your CV
@endsection

@section('content')
<body class="bg-[#F9AF16] font-Inconsolata ">


<div class="container mx-auto px-8 ">
    <div class="text-center">
        <h1 class="text-4xl font-bold text-gray-900 mb-12">Your Cv</h1>
    </div>
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

        @if ($errors->any())
            <div id="error-msg" class="max-w-4xl mx-auto bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                    @endforeach
                </ul>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg id="close-button" class=" fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path d="M14.348 5.652c-.195-.195-.512-.195-.707 0L10 9.293 5.652 5.944c-.195-.195-.512-.195-.707 0-.195.195-.195.512 0 .707L9.293 10l-4.348 4.348c-.195.195-.195.512 0 .707.097.098.225.147.353.147s.256-.049.353-.147L10 10.707l4.348 4.348c.098.098.225.147.353.147s.256-.049.353-.147c.195-.195.195-.512 0-.707L10.707 10l4.348-4.348c.195-.195.195-.512 0-.707z"/>
                    </svg>
                </span>
            </div>

        @endif

    @if(auth()->user()->cvs()->count() > 0)
        @foreach (auth()->user()->cvs as $cv )
        <div class="bg-white shadow-lg rounded-lg px-8 py-8  mb-4">
                <div class="items-center justify-between mb-4">
                <h2 class="text-xl font-bold text-gray-800">{{ $cv->name }}</h2>
                <div class="text-sm font-semibold text-gray-600">{{ $cv->headline }}</div>
                <div class="md:flex-shrink-0">
                    <img class="h-48 w-full object-cover md:w-48" src="{{asset('./uploads/'.$cv->image) }}" alt="profil">
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

        </div>
        <div class="text-center mb-4">
            <a href="{{ route('pdf.generator') }}" class="inline-block px-3 py-1 bg-gray-500 hover:bg-gray-600 text-white rounded-sm text-sm mr-2"> <i class='fas fa-file-pdf'></i> Download</a>
            <a href="{{ route('cv.editCv', $cv->id) }}" class="inline-block px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded-sm text-sm mr-2">Edit</a>
            <form action="{{ route('cv.delete', $cv->id) }}" method="post" style="display: inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-block px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded-sm text-sm" onclick="return confirm('Are you sure you want to delete this CV?')">Delete</button>
            </form>
        </div>
    @endforeach
@endif


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
