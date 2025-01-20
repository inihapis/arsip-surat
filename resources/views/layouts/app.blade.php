<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">  

        <title>@yield('title') - Pengarsipan Surat</title>

        <link rel="icon" href="{{ asset('img/Logomark.ico') }}" type="image/x-icon">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" />     -->

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <!-- <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet"> -->
        <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">

        <!-- dataTables -->
        <!-- <link href="https://cdn.datatables.net/v/dt/dt-2.1.8/datatables.css" rel="stylesheet"> -->
        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> -->
        
        <!-- Styles -->
        @livewireStyles
        
        <link href="{{ asset('css/datatables.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/selectize.custom.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/flatpickr.css') }}" rel="stylesheet" />
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/css/plugin-custom.css', 'resources/js/app.js'])

        
        <script src="https://unpkg.com/popper.js@1"></script>
        <script src="https://unpkg.com/tippy.js@5/dist/tippy-bundle.iife.js"></script>
        
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div>
            @livewire('navigation-menu')
            <div class="flex overflow-hidden bg-white pt-16">
                <x-sidebar />
                <div id="main-content" class="h-full w-4/5 bg-gray-50 relative overflow-y-auto lg:ml-auto">
                    <!-- Page Content --> 
                    <main>
                        
                        {{ $slot }}
                    </main>
                    <footer class="bg-white md:flex md:items-center md:justify-between shadow rounded-lg p-4 md:p-6 xl:p-8 mb-12 mx-8">
                        <p class="text-left text-sm">
                            &copy; 2024 <a class="font-bold hover:text-primary transition-all duration-200 underline underline-offset-2 decoration-1 hover:no-underline cursor-pointer " href="https://langgenginovasiteknologi.com/" target="_blank">PT. Langgeng Inovasi Teknologi</a>. All rights reserved.
                        </p>
                        <p class="text-right text-sm">
                            Versi 2.0.0
                        </p>
                    </footer> 
                </div>
            </div>
        </div>


        
        @stack('modals')
        
        @livewireScripts
        <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">-->
        <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
        <script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/luxon@3.5.0/build/global/luxon.min.js"></script>

        <!--<link-->
        <!--  rel="stylesheet"-->
        <!--  href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"-->
        <!--  integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="-->
        <!--  crossorigin="anonymous"-->
        <!--  referrerpolicy="no-referrer"-->
        <!--/>-->
        <script
          src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
          integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer"
        ></script>
          
        
        <script>
            flatpickr.localize(flatpickr.l10ns.id); // Mengatur lokalitas flatpickr ke Bahasa Indonesia  
            
            const { DateTime, Settings } = luxon;  
            Settings.defaultLocale = 'id-ID';  // Mengatur lokalitas luxon ke Bahasa Indonesia
        
            // Fungsi untuk menginisialisasi Selectize dengan parameter  
            function initializeSelectize(selectId, selectOptions, ajaxUrl) {  
                // Inisialisasi Selectize  
                const selectize = $(selectId).selectize({  
                    valueField: selectOptions.valueField,  
                    labelField: selectOptions.labelField,  
                    searchField: selectOptions.searchField,  
                    placeholder: selectOptions.placeholder || '',  
                    create: selectOptions.create || false,  
                    plugins: selectOptions.plugins || []  
                })[0].selectize;
        
                // Memuat data ke dalam Selectize melalui AJAX  
                $.ajax({  
                    url: ajaxUrl,  
                    method: 'GET',  
                    success: function(data) {  
                        selectize.clearOptions(); // Kosongkan opsi yang ada  
                        selectize.addOption(data); // Tambahkan opsi baru  
                        selectize.refreshOptions(false); // Segarkan opsi  
                    },  
                    error: function(xhr, error, thrown) {  
                        console.log('Error AJAX:', error);  
                    }  
                });  
            }
            
            // Fungsi untuk menginisialisasi Flatpickr
            function initializeFlatpickr(flatpickrId, optionConfig = {}) {  
                $(flatpickrId).flatpickr({  
                    // Menggabungkan opsi default dengan opsi yang diberikan  
                    ...optionConfig // Menggunakan spread operator untuk menggabungkan opsi  
                });  
            }  

            // Fungsi untuk menginisialisasi Tippy.js
            function initializeTooltips() {
                tippy('.tippy-button', {
                    placement: 'top', // Posisi tooltip
                    animation: 'scale-subtle', // Animasi tooltip
                    duration: [200, 150], // Durasi animasi
                    inertia: true,

                });
            }

            // Inisialisasi Toastr
            function initializeToastr() {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right", // Posisi notifikasi
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000", // Durasi tampil
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn", // Metode tampil
                    "hideMethod": "fadeOut" // Metode sembunyi
                };
            }

            // Inisialisasi Tippy.js saat DOM siap
            document.addEventListener('DOMContentLoaded', () => {
                initializeTooltips();
                initializeToastr();
            });


        </script>

    </body>
</html>
