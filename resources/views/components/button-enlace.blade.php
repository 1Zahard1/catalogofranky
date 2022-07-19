@props(['colorh' => 'gray'])

<a
    {{ $attributes->merge(['type' => 'button', 'class' => "inline-flex items-center justify-center px-4 py-2 bg-$colorh-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-$colorh-500 focus:outline-none focus:border-$colorh-700 focus:ring focus:ring-$colorh-200 active:bg-$colorh-600 disabled:opacity-25 transition"]) }}>
    {{ $slot }}
</a>
