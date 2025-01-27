<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">  

        <title>@yield('title') - Pengarsipan Surat</title>

        <link rel="icon" href="{{ asset('img/Logomark.ico') }}" type="image/x-icon">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">

        
        
        <!-- Styles -->
        @livewireStyles
        
        <link href="{{ asset('css/datatables.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/selectize.custom.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/flatpickr.css') }}" rel="stylesheet" />

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/css/plugin-custom.css', 'resources/js/app.js'])

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="https://unpkg.com/tippy.js@6"></script>
        <link
            rel="stylesheet"
            href="https://unpkg.com/tippy.js@6/animations/scale-subtle.css"
        />


    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div>
            @livewire('navigation-menu')
            <div class="flex overflow-hidden bg-white pt-16">
                <!-- Memanggil Sidebar -->
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

        <!-- DataTables -->
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
        <script src="{{ asset('css/dataTables.tailwindcss.js') }}"></script>
        
        <!-- Flatpickr -->
        <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
        <script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>
        
        <!-- Toastr -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        
        <!-- Luxon -->
        <script src="https://cdn.jsdelivr.net/npm/luxon@3.5.0/build/global/luxon.min.js"></script>

        <!-- Selectize -->
        <script
          src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
          integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer"
        ></script>  
        @stack('scripts')  
        
        <script>
            flatpickr.localize(flatpickr.l10ns.id); // Mengatur lokalitas flatpickr ke Bahasa Indonesia  
            
            luxon.Settings.defaultLocale = 'id-ID';  // Mengatur lokalitas luxon ke Bahasa Indonesia
        
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

            // Atur opsi default Toastr  
            toastr.options = {  
                "closeButton": true,  
                "debug": false,  
                "newestOnTop": true,  
                "progressBar": true,  
                "positionClass": "toast-top-center",  
                "preventDuplicates": false,  
                "onclick": null,  
                "showDuration": "300",  
                "hideDuration": "1000",  
                "timeOut": "5000",  
                "extendedTimeOut": "1000",  
                "showEasing": "swing",  
                "hideEasing": "linear",  
                "showMethod": "fadeIn",  
                "hideMethod": "fadeOut"  
            };  


        </script>

    </body>
</html>
