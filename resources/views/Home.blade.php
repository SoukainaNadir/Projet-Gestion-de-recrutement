
@extends('master.layout')


@section('title')
    Accueil
@endsection

@section('content')
<body class="bg-[url('/public/images/bg.jpg')] bg-cover bg-center font-Inconsolata">

    <div class="container mx-auto px-10 py-20">
        <h1 class="text-6xl  mb-6">Smart recruitment </h1>
        <h1 class="text-6xl text-[#0081C9]">starts with us.</h1>
    </div>
    <div class="fixed  px-6 py-10 w-full bottom-0 left-0 ">
        <div class="flex justify-center py-4 space-x-9">
        <a href="{{ url('/Findjob') }}" class="bg-[#2790CB] hover:bg-[#3AB4F2] text-white font-bold py-2 px-5 rounded-full">Find a job</a>
        @if (auth()->check())
        <a href="{{ route('offer.create') }}" class="bg-[#3AB4F2] hover:bg-[#2790CB] text-white font-bold py-2 px-5 rounded-full">Add a job</a>
        @else
        <a href="{{ route('register') }}" class="bg-[#3AB4F2] hover:bg-[#2790CB] text-white font-bold py-2 px-5 rounded-full">Offer a job</a>
        @endif
        </div>
        
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
@endsection


@section('script')
    <script>

    </script>
@endsection
