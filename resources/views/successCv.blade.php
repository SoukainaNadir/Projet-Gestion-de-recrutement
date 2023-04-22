
@extends('master.layout')

@section('title')
    CV Page
@endsection
@section('content')
<body class="font-Inconsolata bg-gray-100 flex items-center justify-center">
  <div class="container mx-auto py-4 bg-white p-8 rounded shadow-md">

    @if (session()->has('success'))
    <h2 class="text-xl font-bold mb-2">Success!</h2>
        <p class="mb-4">{{ session()->get('success') }}</p>
        <a href="{{ route('cv.show') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-4 px-8 rounded-lg ">
            Consult Your CVs
        </a>
    @endif

  </div>
</body>
@endsection
