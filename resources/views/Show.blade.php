@extends('master.layout')


@section('title')
    {{ $offer->title }}
@endsection

@section('content')
<body class="bg-[#F9AF16] font-Inconsolata">
    <div class="container">
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
                        <a href="{{ route('offer.show',$offer->slug) }}" class="inline-block bg-[#0081C9] hover:bg-[#3AB4F2]  text-white py-2 px-4 rounded-lg">Apply Now</a>
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


    </div>



</body>
@endsection


@section('script')
    <script>

    </script>
@endsection
