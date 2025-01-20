@props(['color' => 'bg-gray-800'])

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center p-2 ' . $color . ' border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-200']) }}>{{ $slot }}</button>
