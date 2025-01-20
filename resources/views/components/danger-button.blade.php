<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-bold text-xs text-white uppercase tracking-widest hover:bg-red-600 active:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-800 focus:ring-offset-2 transition ease-in-out duration-200']) }}>
    {{ $slot }}
</button>
