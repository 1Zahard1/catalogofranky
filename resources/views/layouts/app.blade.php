<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    {{-- FontAwesome --}}
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    {{-- GliderSlider --}}
    <link rel="stylesheet" href="{{ asset('vendor/Glider.js-master/glider.min.css') }}">
    {{-- FlexSlider --}}
    <link rel="stylesheet" href="{{ asset('vendor/flexslider/flexslider.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    {{-- GliderSlider --}}
    <script src="{{ asset('vendor/Glider.js-master/glider.min.js') }}"></script>
    {{-- JQuery lo nesecitamos para el flexslider --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- FlexSlider --}}
    <script src="{{ asset('vendor/flexslider/jquery.flexslider-min.js') }}"></script>
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation')

        {{-- Header por defecto --}}
        <!-- Page Heading -->
        {{-- @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts

    <script>
        function dropdown() {

            return {
                open: false,
                showh() {
                    if (this.open) {
                        //se cierra el menu
                        this.open = false;
                        document.getElementsByTagName('html')[0].style.overflow = 'auto';
                    } else {
                        //abre menu
                        this.open = true;
                        document.getElementsByTagName('html')[0].style.overflow = 'hidden';
                    }
                },

                closeh() {
                    this.open = false;
                    document.getElementsByTagName('html')[0].style.overflow = 'auto';
                }
            }
        }
    </script>

    @stack('script')
</body>

</html>
