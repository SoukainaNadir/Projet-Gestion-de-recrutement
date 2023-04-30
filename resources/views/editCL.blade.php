@extends('master.layout')

@section('title')
    Cover Letter Page
@endsection

@section('content')
<body class="bg-gray-200 font-Inconsolata ">
    <div class="justify-center items-center my-8 ">
        <div class="max-w-lg w-full mx-auto p-8 mb-4 bg-white rounded-lg shadow-lg ">
          <h1 class="text-2xl font-bold mb-5">Edit Your Cover Letter</h1>
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

        <form action="{{ route('coverletters.update', $coverletter->id) }}" method="POST" class="w-full" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="name">Name</label>
                <input value='{{ $coverletter->name }}' class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" placeholder="Enter your name" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="headline">Headline</label>
                <input value='{{ $coverletter->headline }}' class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="headline" name="headline" type="text" placeholder="Enter a headline for your cover letter" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="email">Email</label>
                <input value='{{ $coverletter->email }}' class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="phone">Phone Number</label>
                <input value='{{ $coverletter->phone }}'class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone" name="phone" type="tel" placeholder="Enter your phone number" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="address">Address</label>
                <textarea class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="address" name="address" rows="3" placeholder="Enter your address" required>{{ $coverletter->address }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="object">Object</label>
                <input value='{{ $coverletter->object }}' class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="object" name="object" placeholder="Enter the object of your cover letter" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="content">Content</label>
                <textarea class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="content" name="content" rows="3" placeholder="Enter the content of your cover letter" required>{{ $coverletter->content }}</textarea>
            </div>
            <div class="flex flex-col w-full px-3">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Edit
                </button>
            </div>
        </form>

</div>

</body>
@endsection


