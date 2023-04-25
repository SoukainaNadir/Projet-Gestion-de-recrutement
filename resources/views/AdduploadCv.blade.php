@extends('master.layout')

@section('title')
    Personal informations
@endsection

@section('content')
<body class="bg-gray-200 font-Inconsolata ">

    <div class="text-center">
        <h1 class="text-4xl font-bold text-gray-900 mb-12">Cv and Cover letter</h1>
    </div>
    <div class="flex flex-row justify-center space-x-16 items-center">
    <div class="flex flex-col items-center justify-center bg-white p-8 rounded-lg shadow-lg ">

        <div class="flex flex-col items-center">
        <a href="{{ route('cv.create') }}" class="w-full bg-[#F9AF16] hover:bg-[#c29a48] text-white font-bold py-4 px-8 rounded-lg mb-4" ">
            Create a CV
        </a>
        <a href="{{ route('coverletters.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-4 px-8 rounded-lg ">
            Create a Cover letter
        </a>
        </div>
    </div>
</div>
</body>
@endsection






@section('script')

@endsection
