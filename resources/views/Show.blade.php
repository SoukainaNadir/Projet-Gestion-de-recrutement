@extends('master.layout')


@section('title')
    {{ $offer->title }}
@endsection

@section('content')
<body class="bg-[#F9AF16] font-Inconsolata">

    <div class="container">
        @if(session()->has('success'))
        <div id="error-msg" class="max-w-4xl mx-auto bg-green-100 border border-green-400  px-4 py-3 rounded relative" role="alert">
            {{ session()->get('success') }}
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg id="close-button" class=" fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path d="M14.348 5.652c-.195-.195-.512-.195-.707 0L10 9.293 5.652 5.944c-.195-.195-.512-.195-.707 0-.195.195-.195.512 0 .707L9.293 10l-4.348 4.348c-.195.195-.195.512 0 .707.097.098.225.147.353.147s.256-.049.353-.147L10 10.707l4.348 4.348c.098.098.225.147.353.147s.256-.049.353-.147c.195-.195.195-.512 0-.707L10.707 10l4.348-4.348c.195-.195.195-.512 0-.707z"/>
                </svg>
            </span>
        </div>
        @endif
        <div class=" container max-w-4xl mx-auto bg-white rounded-xl shadow-md overflow-hidden my-16">
        <div class="md:flex relative">
            <div class="md:flex-shrink-0">
                <img class="h-48 w-full object-cover md:w-48" src="{{ asset('./uploads/'.$offer->image) }}" alt="Job">
            </div>
            <div class="p-8 ">
                <p class="uppercase tracking-wide text-sm text-indigo-500 font-semibold"> Type: {{ $offer->jobtype }}</p>
                <a href="#" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">{{ $offer->title }}</a>
                <p class="mt-2 text-gray-500">We are looking for an experienced {{ $offer->title }} to join our team.</p>
                <div class="mt-4">
                    <h1 class="text-gray-600 font-semibold">Location:</h1>
                    <div class="mt-1 text-gray-900">{{ Str::limit($offer->location)}}</div>
                </div>
                <div class="mt-4">
                <h1 class="text-gray-600 font-semibold">Salary:</h1>
                <p class="mt-1 text-gray-900">{{ $offer->salary }}$ per an</p>
                </div>
                <div class="mt-4">
                    <h1 class="text-gray-600 font-semibold">Job Description:</h1>
                    <p class="mt-1 text-gray-900">
                        {{ Str::limit($offer->description)}}
                    </p>
                    <h6 class="text-gray-400 pt-3">Added by : {{ $offer->user ? $offer->user->name : null }}</h6>
                </div>
                <div class="mt-8">
                @if (auth()->user())
                    @if(auth()->user()->role_id==1)
                        <button id="apply-button" class="inline-block bg-[#0081C9] hover:bg-[#3AB4F2]  text-white py-2 px-4 rounded-lg">Apply Now</button>
                        <div id="form-container" class="fixed z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-8 rounded-md shadow-lg hidden">
                            <button id="close-button" class="absolute top-2 right-2 bg-gray-300 hover:bg-gray-400 text-gray-700 hover:text-gray-800 rounded-full p-2 focus:outline-none">&times;</button>
                            <form action="{{ route('job.save') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                                @csrf
                                <div class="flex flex-col space-y-2">
                                  <label for="name" class="font-medium">Name</label>
                                  <input type="hidden" id="title" name="title" class="border-gray-300 border-solid border-2 px-4 py-2 rounded-lg focus:outline-none focus:border-gary-500" value="{{ $offer->title }}" required>
                                  <input type="text" id="name" name="name" class="border-gray-300 border-solid border-2 px-4 py-2 rounded-lg focus:outline-none focus:border-gary-500"value="{{ old('name') }}" required>
                                </div>
                                <div class="flex flex-col space-y-2">
                                  <label for="email" class="font-medium">Email</label>
                                  <input type="email" id="email" name="email" class="border-gray-300 border-solid border-2 px-4 py-2 rounded-lg focus:outline-none focus:border-gary-500" value="{{ old('email') }}" required>
                                </div>
                                <div class="flex flex-col space-y-2">
                                  <label for="cover-letter" class="font-medium">Cover Letter</label>
                                  <div class="flex items-center space-x-2">
                                    <button class="bg-[#F9AF16]  text-white px-4 py-2 rounded-md">Use existing</button>
                                    <label for="CoverLetterfile" class="bg-green-500 text-gray-200 px-4 py-2 rounded-md cursor-pointer">Upload new</label>
                                    <input type="file" id="CoverLetterfile" name="CoverLetterfile" class="hidden">
                                    <input type="text" id="cover-letter-file-name" name="cover-letter-file-name" class="border-gray-300 border-solid border-2 px-4 py-2 rounded-lg focus:outline-none focus:border-gary-500" readonly>
                                </div>
                                  <p class="text-sm text-gray-500">If you don't have a Cover letter, <span class="underline"><a href="{{ route('coverletters.create') }}" class="cursor-pointer">Create one!</a></span></p>
                                </div>
                                <div class="flex flex-col space-y-2">
                                  <label for="cv" class="font-medium">CV</label>
                                  <div class="flex items-center space-x-2">
                                    <button class="bg-[#F9AF16]  text-white px-4 py-2 rounded-md">Use existing</button>
                                    <label for="CVfile" class="bg-green-500 text-gray-200 px-4 py-2 rounded-md cursor-pointer">Upload new</label>
                                    <input type="file" id="CVfile" name="CVfile" class="hidden">
                                    <input type="text" id="cv-file-name" name="cv-file-name" class="border-gray-300 border-solid border-2 px-4 py-2 rounded-lg focus:outline-none focus:border-gary-500" readonly>

                                  </div>
                                  <p class="text-sm text-gray-500">If you don't have a CV, <span class="underline"><a href="{{ route('cv.create') }}" class="cursor-pointer">Create one!</a></span></p>
                                </div>
                                <button type="submit" class="bg-[#0081C9] text-white px-4 py-2 rounded-md">Apply</button>
                              </form>
                      </div>
                      <div id="blur-overlay" class="fixed z-0 top-0 left-0 w-screen h-screen bg-gray-600 bg-opacity-80 blur hidden"></div>


                    @endif
                @else
                <a href="{{ route('register',$offer->slug) }}" class="inline-block bg-[#0081C9] hover:bg-[#3AB4F2]  text-white py-2 px-4 rounded-lg">Apply Now</a>
                @endif
                @if (auth()->user())
                    @if(auth()->user()->role_id==2)
                        @if (auth()->user()->id==$offer->user_id)
                            <form id ="{{ $offer->id }}"action="{{ route('offer.delete',$offer->slug) }}" method="post">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button
                            onclick="event.preventDefault();
                            if(confirm('Once you delete your offer, it cannot be restored. Are you absolutely sure that you want to proceed with this action?'))
                            document.getElementById({{ $offer->id }}).submit();"
                            type="submit" class="absolute bottom-4 right-4 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded-lg">
                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">
                                    <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                            <a href="{{ route('offer.edit',$offer->slug) }}" class="bg-green-600 hover:bg-green-700 cursor-pointer absolute bottom-4 right-16 text-white font-bold py-2 px-2 rounded-lg">
                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                viewBox="0 0 20 20"
                                fill="currentColor">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        @endif
                    @endif
                @endif
                </div>
            </div>
        </div>
    </div>
</div>

</body>


@endsection


@section('script')
<script>
    const applyButton = document.getElementById('apply-button');
    const formContainer = document.getElementById('form-container');
    const blurOverlay = document.getElementById('blur-overlay');
    const closeButton = document.getElementById('close-button');

    applyButton.addEventListener('click', () => {
    formContainer.classList.toggle('hidden');
    blurOverlay.classList.toggle('hidden');

    // add animation to form container
    if (!formContainer.classList.contains('hidden')) {
        formContainer.classList.add('animate__animated', 'animate__bounceIn');
    } else {
        formContainer.classList.remove('animate__animated', 'animate__bounceIn');
    }
    });

    closeButton.addEventListener('click', () => {
    formContainer.classList.add('hidden');
    blurOverlay.classList.add('hidden');
    });
</script>
<script>
    const fileInput = document.getElementById('CoverLetterfile');
    const fileNameInput = document.getElementById('cover-letter-file-name');
    const fileInput1 = document.getElementById('CVfile');
    const fileNameInput1 = document.getElementById('cv-file-name');

    fileInput.addEventListener('change', () => {
        const file = fileInput.files[0];
        fileNameInput.value = file.name;
    });

    fileInput1.addEventListener('change', () => {
        const file = fileInput1.files[0];
        fileNameInput1.value = file.name;
    });

</script>
<script>
    const closeButton1 = document.querySelector('#close-button');
    const alertPanel1 = document.querySelector('#error-msg');
    closeButton1.addEventListener('click', () => {
    alertPanel1.classList.add('hidden');
    });
</script>

@endsection

