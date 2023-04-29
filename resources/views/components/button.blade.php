<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 bg-[#F9AF16] border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#F9AF16] focus:bg-[#B8621B] active:bg-[#B8621B] focus:outline-none focus:ring-2 focus:ring-[#FFA559] focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
