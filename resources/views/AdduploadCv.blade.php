@extends('master.layout')

@section('title')
    CV Page
@endsection

@section('content')
<body class="bg-gray-200 font-Inconsolata ">
    <div class="flex flex-col h-screen justify-center items-center">
    <div class="flex flex-col items-center justify-center bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-4">Welcome to the CV Page!</h1>
        <div class="flex flex-col items-center">
        <a href="#" class="bg-[#F9AF16] hover:bg-[#c29a48] text-white font-bold py-4 px-8 rounded-lg mb-4">
            Upload your CV
        <a href="{{ route('cv.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-4 px-8 rounded-lg ">
            Create a CV
        </a>
        </div>
    </div>
</div>
</body>
@endsection






@section('script')

@endsection
