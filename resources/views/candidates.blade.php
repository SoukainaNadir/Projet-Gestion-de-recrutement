@extends('master.layout')
@section('title')
    Applicants
@endsection

@section('content')
<body class="bg-[#F9AF16] font-Inconsolata">
    <div class="container mx-auto px-8 mt-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-900 mb-12">Applicants</h1>
        </div>
        <div class=" max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <table class=" bg-gray-50 able-fixed border-collapse rounded-lg overflow-hidden w-full shadow">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-center">N</th>
                        <th class="py-3 px-6 text-center">Name</th>
                        <th class="py-3 px-6 text-center">Email</th>
                        <th class="py-3 px-6 text-center">Apply Date</th>
                        <th class="py-3 px-6 text-center">Download Cv</th>
                        <th class="py-3 px-6 text-center">Download Cover letter</th>
                    </tr>
                </thead>

                <tbody class="text-gray-600 text-sm font-light">

                    @foreach ($apply_for_jobs as $key => $apply)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-center">{{ ++$key }}</td>
                        <td class="py-3 px-6 text-center">{{ $apply->name }}</td>
                        <td class="py-3 px-6 text-center">{{ $apply->email }}</td>
                        <td class="py-3 px-6 text-center">{{ \Carbon\Carbon::parse($apply->created_at)->format('Y-m-d H:i:s') }}</td>
                        <td class="py-3 px-6 text-center"><a href="{{ url('/Cv/download/'.$apply->id) }}" class="mr-3 text-sm bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline-blue" title="Download"><i class="fas fa-download"></i></a></td>
                        <td class="py-3 px-6 text-center"><a href="{{ url('/Cl/download/'.$apply->id) }}" class="mr-3 text-sm bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline-blue" title="Download"><i class="fas fa-download"></i></a></td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</body>
@endsection
