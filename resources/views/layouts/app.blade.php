<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- TinyMCE mobile -->
        
        <title>@isset($title){{$title}} - @endisset MacroWrite</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/canvas.css') }}" rel="stylesheet">
        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js" defer></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- <script src="https://unpkg.com/interactjs/dist/interact.min.js"></script> -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dojo/1.16.3/tests/functional/_base/loader/requirejs/exports/vanilla.js"></script>

        <script src="https://unpkg.com/zdog@1/dist/zdog.dist.min.js"></script>
        <script async src="{{ asset('js/zdog-demo.js') }}"></script>

        <!-- Comic script -->
        <script src="https://cdn.jsdelivr.net/npm/uifactory@1.18.0/dist/uifactory.min.js" import="@comic-gen"></script>

        <!-- Styles -->
        <style>
            [x-cloak] {
                display: none;
            }

            [type="checkbox"] {
                box-sizing: border-box;
                padding: 0;
            }

            .form-checkbox,
            .form-radio {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
                display: inline-block;
                vertical-align: middle;
                background-origin: border-box;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                flex-shrink: 0;
                color: currentColor;
                background-color: #fff;
                border-color: #e2e8f0;
                border-width: 1px;
                height: 1.4em;
                width: 1.4em;
            }

            .form-checkbox {
                border-radius: 0.25rem;
            }

            .form-radio {
                border-radius: 50%;
            }

            .form-checkbox:checked {
                background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M5.707 7.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0-1.414-1.414L7 8.586 5.707 7.293z'/%3e%3c/svg%3e");
                border-color: transparent;
                background-color: currentColor;
                background-size: 100% 100%;
                background-position: center;
                background-repeat: no-repeat;
            }
            
            .form-radio:checked {
                background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
                border-color: transparent;
                background-color: currentColor;
                background-size: 100% 100%;
                background-position: center;
                background-repeat: no-repeat;
            }

            h1 {
              font-size: 3rem;
              margin: 1.25rem 0;
            }
            h2 {
              font-size: 2rem;
            }
            hr {
              margin: 3rem 0;
              border: 0;
              height: 1px;
              background: linear-gradient(to right, rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.25)); 
            }
            p {
              margin-bottom: 2rem;
              line-height: 1.75rem;
            }
            #twitter-share-btn {
              width: 2.5rem;
              height: 2.5rem;
              font-size: 1.25rem;
              color: #56b8f5;
              background-color: #fff;
              cursor: pointer;
              border: 2px solid #56b8f5;
              border-radius: 50%;
              position: absolute;
              top: 0;
              left: 0;
              z-index: 10;
              display: none;
              transition: color 0.2s, background-color 0.2s ease-in-out;
            }
            #twitter-share-btn:hover {
              color: #fff;
              background-color: #56b8f5;
            }
            #twitter-share-btn i {
              pointer-events: none;
            }
            .btnEntrance {
              animation-duration: 0.2s;
              animation-fill-mode: both;
              animation-name: btnEntrance;
            }
            @keyframes btnEntrance { /* zoomIn */
              0% {
                opacity: 0;
                transform: scale3d(0.3, 0.3, 0.3);
              }
              100% {
                opacity: 1;
              }    
            }

            @media(max-width: 992px) {
              h1 { font-size: 2.5rem; }
              h2 { font-size: 1.75rem; }
            }
            @media(max-width:768px) {
              html { font-size: 12px; }
              h1 { font-size: 2rem; }
              h2 { font-size: 1.5rem; }
              hr { margin: 1.5rem 0; }
            }
        </style>

        <x-head.tinymce-config/>
                
    </head>
    <body class="font-sans antialiased">
        <div class="h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        @livewireScripts

        <script>
          var popoverTriggerList = [].slice.call(
            document.querySelectorAll('[data-bs-toggle="popover"]')
          );
          var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new Popover(popoverTriggerEl);
          });
        </script>
    </body>
</html>
