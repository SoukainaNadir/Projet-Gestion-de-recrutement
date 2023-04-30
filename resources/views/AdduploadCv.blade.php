@extends('master.layout')

@section('title')
    Personal informations
@endsection

@section('content')
<body class="bg-gray-200 font-Inconsolata ">

    <body class="bg-gray-200 font-Inconsolata">

        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-900 mb-12">Cv and Cover letter</h1>
        </div>

        <div class="flex justify-center items-center">
            <div class="bg-white rounded-lg shadow-lg py-8 px-12">
                <h2 class="text-2xl font-bold mb-6 text-gray-900">Get Started</h2>
                <div class="grid grid-cols-2 gap-6">
                    <div class="flex flex-col items-center justify-center bg-[#F9AF16] py-8 rounded-lg hover:bg-[#c29a48] transition-colors duration-300">
                        <i class="fas fa-user-circle text-4xl text-white mb-4"></i>
                        <a href="{{ route('cv.create') }}" class="text-white font-bold py-2 px-4 rounded-lg text-lg">Create a CV</a>
                    </div>
                    <div class="flex flex-col items-center justify-center bg-green-500 py-8 rounded-lg hover:bg-green-600 transition-colors duration-300">
                        <i class="far fa-file-alt text-4xl text-white mb-4"></i>
                        <a href="{{ route('coverletters.create') }}" class="text-white font-bold py-2 px-4 rounded-lg text-lg">Create a Cover letter</a>
                    </div>
                </div>
            </div>
        </div>

    </body>

</body>
@endsection






@section('script')

@endsection
