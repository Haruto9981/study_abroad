<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex rounded-lg text-white font-bold bg-orange-300 hover:bg-orange-400 items-center px-4 py-2 bg-gray-800  font-semibold text-xs  uppercase tracking-widest  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
