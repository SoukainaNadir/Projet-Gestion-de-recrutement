@extends('master.layout')

@section('title')
    Your CVs
@endsection

@section('content')
<body class="bg-[#F9AF16] font-Inconsolata">


<div class=" container mx-auto px-8">
    <div class="text-center">
        <h1 class="text-4xl font-bold text-gray-900 mb-12">Your Cvs</h1>
    </div>
    <table class="table-auto w-full   bg-gray-100 border-gray-400 rounded-lg ">
        <thead>
            <tr class="bg-gray-100 border-b border-gray-200">
                <th class="py-2 px-4 text-left">Name</th>
                <th class="py-2 px-4 text-left">Email</th>
                <th class="py-2 px-4 text-left">Phone</th>
                <th class="py-2 px-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>

            @if(auth()->user()->cvs()->count() > 0)
            @foreach (auth()->user()->cvs as $cv )
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="py-2 px-4">{{ $cv->name }}</td>
                    <td class="py-2 px-4">{{ $cv->email }}</td>
                    <td class="py-2 px-4">{{ $cv->phone }}</td>
                    <td class="py-2 px-4">
                        <a href="{{ route('cv.show', $cv) }}" class="inline-block px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded-sm text-sm mr-2">View</a>
                        <a href="" class="inline-block px-3 py-1 bg-gray-500 hover:bg-gray-600 text-white rounded-sm text-sm mr-2">Edit</a>
                        <form action="" method="post" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-block px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded-sm text-sm" onclick="return confirm('Are you sure you want to delete this CV?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            @else
            <p>No CVs found.</p>
            @endif
        </tbody>
    </table>

    <a href="" class="inline-block px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded-sm text-sm mt-4">Add CV</a>
    @if (auth()->user()->cvs)
        @foreach (auth()->user()->cvs as $cv )
        <div class="bg-white shadow-lg rounded-lg px-8 py-8 mt-8 mb-12">

                <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-bold text-gray-800">{{ $cv->name }}</h2>
                <div class="text-sm font-semibold text-gray-600">Software Developer</div>
                </div>
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
        @endforeach
@endif


</div>

</body>
@endsection
