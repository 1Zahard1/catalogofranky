@props(['colorh' => 'gray'])

<button
    {{ $attributes->merge(['type' => 'submit', 'class' => "inline-flex justify-center items-center px-4 py-2 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-$colorh-500 active:bg-$colorh-900 focus:outline-none focus:$colorh-orange-900 focus:ring focus:ring-$colorh-300 disabled:opacity-25 transition"]) }}>
    {{ $slot }}
</button>
