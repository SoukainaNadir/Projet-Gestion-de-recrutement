
@extends('master.layout')


@section('title')
    Offer a Job
@endsection

@section('content')
<body class="bg-[#F9AF16] font-Inconsolata">
    
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-md overflow-hidden m-20">
            <div class="p-8 md:container">
                <div class="uppercase tracking-wide text-2xl font-bold mb-4">Post a Job</div>
                    <form action="#" method="POST" class="mt-4">
                    @csrf

                    <div class="mt-4">
                        <label class="block text-gray-700 font-bold mb-2" for="photo">
                            Photo
                        </label>
                        <input class="appearance-none border rounded w-full py-5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="photo" name="photo" type="file">
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
                    </div>
                    <div class="mt-4">
                        <label for="salary" class="block text-gray-700 font-bold mb-2">Salary:</label>
                        <input type="text" id="salary" name="salary" class="border border-gray-400 p-2 w-full">
                    </div>
                    <div class="mt-4">
                        <label for="type" class="block text-gray-700 font-bold mb-2">Job Type</label>
                        <select name="type" id="type" class="w-full border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-400" required>
                            <option value="full-time">Full-time</option>
                            <option value="part-time">Part-time</option>
                            <option value="contract">Contract</option>
                            <option value="internship">Internship</option>
                            <option value="temporary">Temporary</option>
                        </select>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="bg-[#0081C9] hover:bg-[#3AB4F2] text-white font-bold py-2 px-4 rounded">
                        Add Job
                        </button>
                    </div>
                </form>
            </div>
    </div>



</body>    
@endsection


@section('script')
    <script>
        
    </script>
@endsection