<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <style>
                    .cls-1 {
                        font-family: MyriadPro-Regular, 'Myriad Pro';
                        font-size: 10.84px;
                    }

                    .cls-1, .cls-2 {
                        stroke: #2e3192;
                    }

                    .cls-1, .cls-2, .cls-3 {
                        stroke-miterlimit: 10;
                        stroke-width: .5px;
                    }

                    .cls-1, .cls-4 {
                        fill: #2e3192;
                    }

                    .cls-2 {
                        fill: none;
                    }

                    .cls-3 {
                        fill: #92d6e0;
                        stroke: #fff;
                    }
    </style>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19.62 19.15" width="180" height="150">

                    <rect class="cls-3" x=".25" y="3.43" width="14.9" height="7.92"/>
                    <rect class="cls-3" x="1.64" y="4.72" width="14.9" height="7.92"/>
                    <rect class="cls-3" x="2.92" y="6.05" width="14.9" height="7.92"/>
                    <rect class="cls-3" x="4.16" y="7.38" width="14.9" height="7.92"/>
                    <text class="cls-1" transform="translate(12.03 9.32) scale(1.11 1)"><tspan x="0" y="0">A</tspan></text>
                    <g>
                        <circle class="cls-2" cx="5.18" cy="13.97" r="4.93"/>
                        <ellipse class="cls-2" cx="5.18" cy="13.97" rx="4.93" ry="2.65"/>
                        <ellipse class="cls-2" cx="5.18" cy="13.97" rx="2.65" ry="4.93"/>
                        <line class="cls-2" x1="5.18" y1="9.04" x2="5.18" y2="18.9"/>
                        <line class="cls-2" x1=".25" y1="13.97" x2="10.11" y2="13.97"/>
                    </g>
                    <g>
                        <path class="cls-2" d="M15.9,10.86c0,2.08-1.73,3.77-3.88,3.77"/>
                        <polygon class="cls-4" points="13.36 15.54 12.5 15.23 11.08 14.68 12.44 13.92 13.27 13.46 12.82 14.5 13.36 15.54"/>
                        <polygon class="cls-4" points="14.9 12.1 15.24 11.15 15.83 9.57 16.39 11.17 16.74 12.15 15.86 11.56 14.9 12.1"/>
                    </g>
                </svg>
                    <!-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> -->
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
