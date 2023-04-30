
@extends('master.layout')

@section('title')
    Success Message !
@endsection
@section('content')
<body class="font-Inconsolata bg-gray-100 ">
    <div class="container mx-auto px-8 items-center ">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-green-200 rounded-lg shadow-md p-6 text-center">
        @if (session()->has('success'))
            <h2 class="text-2xl font-bold mb-4">CV Submitted!</h2>
            <p class="text-lg mb-6">{{ session()->get('success') }}</p>
            <a href="{{ route('cv.show') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-6 rounded-lg text-lg">
                View Your CV
            </a>
        @endif
        @if (session()->has('success1'))
            <h2 class="text-2xl font-bold mb-4">Cover Letter Submitted!</h2>
            <p class="text-lg mb-6">{{ session()->get('success1') }}</p>
            <a href="{{ route('coverletters.show') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-6 rounded-lg text-lg">
                View Your Cover Letter
            </a>
        @endif
    </div>
</div>
</div>
</body>
@endsection
