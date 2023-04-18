
@extends('master.layout')


@section('title')
    Offer a Job
@endsection

@section('content')
<body class="bg-[#F9AF16] font-Inconsolata">
    @if ($errors->any())
    <div id="error-msg" class="max-w-4xl mx-auto bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">Your form contains some errors.</span>
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
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





    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-md overflow-hidden m-20">
            <div class="p-8 md:container">
                <div class="uppercase tracking-wide text-2xl font-bold mb-4">Post a Job</div>
                    <form action="{{route('offer.store')}}" method="POST" class="mt-4" name="form" enctype="multipart/form-data">
                    @csrf

                    <div class="mt-4">
                        <label class="block text-gray-700 font-bold mb-2" for="image">
                            Photo
                        </label>
                        <input class="appearance-none border rounded w-full py-5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="image" name="image" type="file">
                    </div>
                    <div>
                        <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
                        <input type="text" id="title" name="title" class="border border-gray-400 p-2 w-full" required>

                    </div>
                    <div class="mt-4">
                        <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
                        <textarea id="description" name="description" class="border border-gray-400 p-2 w-full" required></textarea>
                    </div>
                    <div class="mt-4">
                        <label for="location" class="block text-gray-700 font-bold mb-2">Location:</label>
                        <input type="text" id="location" name="location" class="border border-gray-400 p-2 w-full" required>
                        <div id="locationError" class="text-red-500 mt-2"></div>
                    </div>
                    <div class="mt-4">
                        <label for="salary" class="block text-gray-700 font-bold mb-2">Salary:</label>
                        <input type="text" id="salary" name="salary" class="border border-gray-400 p-2 w-full">
                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-700 font-bold mb-2 ">Job Type</label>
                        <select name="jobtype" id="jobtype" class="w-full border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-400" required>
                            <option value="" disabled selected>Choose option</option>
                            <option value="Full-time">Full-time</option>
                            <option value="Part-time" >Part-time</option>
                            <option value="Freelance">Freelance</option>
                            <option value="Internship">Internship</option>
                        </select>
                    </div>
                    <div class="my-4 float-right">
                        <button onclick ="displayError" type="submit" class="bg-[#0081C9] hover:bg-[#3AB4F2] text-white font-bold py-3 px-8 rounded">
                        Add Job
                        </button>
                    </div>
                </form>
            </div>
    </div>



</body>
@endsection

@section('script')

@if ($errors->any())
<script>
    const closeButton = document.querySelector('#close-button');
    const alertPanel = document.querySelector('#error-msg');
    closeButton.addEventListener('click', () => {
    alertPanel.classList.add('hidden');
    });
</script>
@endif



@endsection
