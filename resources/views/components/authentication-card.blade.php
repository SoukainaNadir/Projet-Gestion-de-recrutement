<div class="bg-[url('/public/images/registerBg.jpg')] min-h-screen bg-cover bg-center bg-no-repeat flex md:flex flex-col justify-center items-center py-12 sm:px-6 lg:px-8" >
    <div class="sm:w-full sm:max-w-md sm:mx-auto max-w-md bg-white shadow-md overflow-hidden rounded-lg">

        <div class="flex justify-center items-center">
        {{ $logo }}
        </div>

        <div class=" pb-8 px-4 sm:px-10">
            {{ $slot }}
        </div>

    </div>
</div>

