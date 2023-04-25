@extends('master.layout')

@section('title')
    CV Page
@endsection

@section('content')
<body class="bg-gray-200 font-Inconsolata ">
    <div class="justify-center items-center my-8 ">
        <div class="max-w-lg w-full mx-auto p-8 bg-white rounded-lg shadow-lg ">
          <h1 class="text-2xl font-bold mb-5">Create Your CV</h1>
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

          <form method="POST" action="{{ route('cv.store') }}" class="w-full" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="name">First and Last name</label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text"  required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="headline">Headline</label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="headline" name="headline" type="text"  required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="image">Image</label>
                <input type="file" name="image" id="image">
                </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="languages">Profil</label>
                <textarea class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="profil" name="profil" rows="3" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="email">Email Address</label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="phone">Phone Number</label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone" name="phone" type="tel"  required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="address">Address</label>
                <textarea class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="address" name="address" rows="3"  required></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="education">Education</label>
                <textarea class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="education" name="education" rows="3" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="experience">Work Experience</label>
                <textarea class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="experience" name="experience" rows="3"  required></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="languages">Languages</label>
                <textarea class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="languages" name="languages" rows="3" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="skills">Skills</label>
                <textarea class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="skills" name="skills" rows="3"  required></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="interests">Interests</label>
                <textarea class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="interests" name="interests" rows="3" required></textarea>
                </div>
            <div class="flex flex-col w-full px-3">
                <button id="show-modal" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Create
                </button>
            </div>
        </div>


    </form>
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
