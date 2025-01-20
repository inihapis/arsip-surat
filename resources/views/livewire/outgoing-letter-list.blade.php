<div>
@section('title', 'Surat Keluar')


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                @if($errors->any())
                    <div class="pt-3">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                
                <!-- Header -->
                <div class="py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-100">
                    <div>
                        <!-- Input -->
                        <div class="sm:col-span-1">
                            <label for="search-input" class="sr-only">Search</label>
                            <div class="relative">
                                <input type="text" 
                                    id="search-input" 
                                    class="py-2 px-3 ps-11 block w-full border-gray-100 rounded-md text-sm focus:border-blue-600 focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none" 
                                    placeholder="Search"
                                    autocomplete="off">
                                <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
                                    <svg class="shrink-0 size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="11" cy="11" r="8"/>
                                        <path d="m21 21-4.3-4.3"/>
                                    </svg>
                                </div>
                            </div>

                        </div>
                        <!-- End Input -->

                       
                    </div>

            
                    <div>
                        <div class="inline-flex gap-x-2">
                            <div class="hs-dropdown [--placement:bottom-right] relative inline-block">
                            <button id="hs-as-table-table-export-dropdown" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-bold rounded-md border border-gray-100 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none " aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                <svg class="shrink-0 size-3.5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                                Export
                            </button>
                            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-20 bg-white shadow-md rounded-md p-2 mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-as-table-table-export-dropdown">
                                <div class="py-2 first:pt-0 last:pb-0">
                                <span class="block py-2 px-3 text-xs font-bold uppercase text-gray-400 dark:text-neutral-600">
                                    Options
                                </span>
                                <a class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300" href="#">
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/></svg>
                                    Copy
                                </a>
                                <a class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300" href="#">
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect width="12" height="8" x="6" y="14"/></svg>
                                    Print
                                </a>
                                </div>
                                <div class="py-2 first:pt-0 last:pb-0">
                                <span class="block py-2 px-3 text-xs font-bold uppercase text-gray-400 dark:text-neutral-600">
                                    Download options
                                </span>
                                <a class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300" href="#">
                                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                    </svg>
                                    Excel
                                </a>
                                <a class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300" href="#">
                                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM3.517 14.841a1.13 1.13 0 0 0 .401.823c.13.108.289.192.478.252.19.061.411.091.665.091.338 0 .624-.053.859-.158.236-.105.416-.252.539-.44.125-.189.187-.408.187-.656 0-.224-.045-.41-.134-.56a1.001 1.001 0 0 0-.375-.357 2.027 2.027 0 0 0-.566-.21l-.621-.144a.97.97 0 0 1-.404-.176.37.37 0 0 1-.144-.299c0-.156.062-.284.185-.384.125-.101.296-.152.512-.152.143 0 .266.023.37.068a.624.624 0 0 1 .246.181.56.56 0 0 1 .12.258h.75a1.092 1.092 0 0 0-.2-.566 1.21 1.21 0 0 0-.5-.41 1.813 1.813 0 0 0-.78-.152c-.293 0-.551.05-.776.15-.225.099-.4.24-.527.421-.127.182-.19.395-.19.639 0 .201.04.376.122.524.082.149.2.27.352.367.152.095.332.167.539.213l.618.144c.207.049.361.113.463.193a.387.387 0 0 1 .152.326.505.505 0 0 1-.085.29.559.559 0 0 1-.255.193c-.111.047-.249.07-.413.07-.117 0-.223-.013-.32-.04a.838.838 0 0 1-.248-.115.578.578 0 0 1-.255-.384h-.765ZM.806 13.693c0-.248.034-.46.102-.633a.868.868 0 0 1 .302-.399.814.814 0 0 1 .475-.137c.15 0 .283.032.398.097a.7.7 0 0 1 .272.26.85.85 0 0 1 .12.381h.765v-.072a1.33 1.33 0 0 0-.466-.964 1.441 1.441 0 0 0-.489-.272 1.838 1.838 0 0 0-.606-.097c-.356 0-.66.074-.911.223-.25.148-.44.359-.572.632-.13.274-.196.6-.196.979v.498c0 .379.064.704.193.976.131.271.322.48.572.626.25.145.554.217.914.217.293 0 .554-.055.785-.164.23-.11.414-.26.55-.454a1.27 1.27 0 0 0 .226-.674v-.076h-.764a.799.799 0 0 1-.118.363.7.7 0 0 1-.272.25.874.874 0 0 1-.401.087.845.845 0 0 1-.478-.132.833.833 0 0 1-.299-.392 1.699 1.699 0 0 1-.102-.627v-.495Zm8.239 2.238h-.953l-1.338-3.999h.917l.896 3.138h.038l.888-3.138h.879l-1.327 4Z"/>
                                    </svg>
                                    .CSV
                                </a>
                                <a class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300" href="#">
                                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                    <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"/>
                                    </svg>
                                    .PDF
                                </a>
                                </div>
                            </div>
                            </div>
            
                            <div class="hs-dropdown [--placement:bottom-right] relative inline-block">
                            <button id="hs-as-table-table-filter-dropdown" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-bold rounded-md border border-gray-100 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                <svg class="shrink-0 size-3.5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M7 12h10"/><path d="M10 18h4"/></svg>
                                Filter
                                <span class="ps-2 text-xs font-semibold text-blue-600 border-s border-gray-100">
                                2
                                </span>
                            </button>
                            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-20 bg-white shadow-md rounded-md mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-as-table-table-filter-dropdown">
                                <div class="divide-y divide-gray-200 dark:divide-neutral-700">
                                <label for="hs-as-filters-dropdown-frequency" class="flex py-2.5 px-3">
                                    <input type="checkbox" class="shrink-0 mt-0.5 border-gray-300 rounded-30 text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-as-filters-dropdown-frequency" checked>
                                    <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Frequency</span>
                                </label>
                                <label for="hs-as-filters-dropdown-status" class="flex py-2.5 px-3">
                                    <input type="checkbox" class="shrink-0 mt-0.5 border-gray-300 rounded-30 text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-as-filters-dropdown-status" checked>
                                    <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Status</span>
                                </label>
                                <label for="hs-as-filters-dropdown-created" class="flex py-2.5 px-3">
                                    <input type="checkbox" class="shrink-0 mt-0.5 border-gray-300 rounded-30 text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-as-filters-dropdown-created">
                                    <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Created</span>
                                </label>
                                <label for="hs-as-filters-dropdown-due-date" class="flex py-2.5 px-3">
                                    <input type="checkbox" class="shrink-0 mt-0.5 border-gray-300 rounded-30 text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-as-filters-dropdown-due-date">
                                    <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Due Date</span>
                                </label>
                                <label for="hs-as-filters-dropdown-amount" class="flex py-2.5 px-3">
                                    <input type="checkbox" class="shrink-0 mt-0.5 border-gray-300 rounded-30 text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-as-filters-dropdown-amount">
                                    <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Amount</span>
                                </label>
                                </div>
                            </div>
                            </div>
                            <!-- Tombol Tambah -->
                            <x-button onclick="addSuratKeluar()"><i class="ti ti-circle-plus"></i>Tambah Surat Keluar</x-button>
                        </div>
                    </div>
                </div>
                <!-- End Header -->
            
                
            
                <div class="overflow-x-auto">
                    <table id="dataTable" class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100 uppercase text-sm text-left">
                            <tr>
                                <th class="p-4 text-center w-1/12">
                                    No
                                </th>
                                <th class="p-4 cursor-pointer w-auto">
                                    Kategori Surat
                                </th>
                                <th class="p-4 cursor-pointer w-auto">
                                    Info Surat
                                </th>
                                <th class="p-4 cursor-pointer w-auto">
                                    Tujuan Surat
                                </th>
                                <th class="p-4 cursor-pointer w-2/12">
                                    Perihal Surat
                                </th>
                                
                                <th class="p-4 text-center w-1/6">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                           
                        </tbody>
                    </table>
                </div>
                
                <!-- Modal untuk View -->
                <div id="view-modal" class="fixed inset-0 z-50 bg-gray-800 bg-opacity-50 hidden flex items-center justify-center">
                    <div class="bg-white overflow-hidden rounded-lg shadow-lg w-11/12 md:w-1/2">
                        <!-- Modal Header -->
                        <div class="bg-primary text-white p-6">
                            <h2 class="modal-title text-2xl font-extrabold"></h2>
                        </div>
                        <!-- Modal Body -->
                        <div class="p-6 space-y-6">
                            <div class="grid grid-rows-2 p-3 items-center text-center rounded-md bg-primary/10 hover:bg-blue-100 transition-colors duration-200">
                                <span class="block text-lg text-primary">Nomor Surat</span>
                                <span id="letter-number" class="block text-lg font-extrabold text-primary"></span>
                            </div>
                            <div class="grid grid-cols-2 gap-y-8 gap-x-4">
                                <div>
                                    <span class="block text-lg font-extrabold text-gray-700">Kategori Surat</span>
                                    <span id="category-name" class="block"></span>
                                </div>
                                <div>
                                    <span class="block text-lg font-extrabold text-gray-700">Perihal</span>
                                    <span id="subject" class="block"></span>
                                </div>
                                <div>
                                    <span class="block text-lg font-extrabold text-gray-700">Tujuan Surat</span>
                                    <span id="institution-name" class="block"></span>
                                </div>
                                <div>
                                    <span class="block text-lg font-extrabold text-gray-700">Tanggal Surat</span>
                                    <span id="letter-date" class="block"></span>
                                </div>
                                <div>
                                    <span class="block text-lg font-extrabold text-gray-700">Tanggal Diinput</span>
                                    <span id="letter-store" class="block"></span>
                                </div>
                                <div>
                                    <span class="block text-lg font-extrabold text-gray-700">Keterangan</span>
                                    <span id="description" class="block"></span>
                                </div>
                                <div>
                                    <span class="block text-lg font-extrabold text-gray-700">Dokumen</span>
                                    <a id="document-show" href="#" target="_blank" class="btn-icon-action tippy-button" data-tippy-content="Lihat Dokumen">  
                                        <i class="ti ti-eye"></i>  
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                        <!-- Modal Footer -->
                        <div class="p-4 border-t-2  flex justify-end">
                            <x-secondary-button class="mr-2" onclick="closeModal('view-modal')">Tutup</x-secondary-button>
                        </div>
                        
                    </div>
                </div>

                <!-- Modal untuk Add/Edit -->
                <div id="modal" class="fixed inset-0 z-50 bg-gray-800 bg-opacity-50 hidden flex items-center justify-center">
                    <div class="bg-white overflow-hidden rounded-lg shadow-lg w-11/12 md:w-1/2">
                        <!-- Modal Header -->
                        <div class="bg-primary text-white p-6">
                            <h2 class="modal-title text-2xl font-extrabold"></h2>
                        </div>
                        <!-- Modal Body -->
                        <div class="p-6">
                        <form id="modal-form" class="grid grid-cols-2 gap-4" enctype="multipart/form-data">
                            @csrf  
                            <input type="hidden" id="input-id">
                            <!-- <input type="hidden" name="file" id="input-file-name"> Hidden input untuk nama file -->  
                            <div class="mb-4">
                                <label for="input-letter-number" class="block text-sm font-bold text-gray-700">Nomor Surat</label>
                                <x-input id="input-letter-number" name="letter_number" class="block mt-1 w-full" type="text" placeholder="Nomor Surat" required />
                            </div>
                            <div class="mb-4">
                                <label for="input-letter-date" class="block text-sm font-bold text-gray-700">Tanggal Surat</label>
                                <x-input id="input-letter-date" name="letter_date" class="block mt-1 w-full" type="text" placeholder="Tanggal Surat" required />
                                
                            </div>
                            <div class="mb-4">
                                <label for="select-category" class="block text-sm font-bold text-gray-700">Kategori Surat</label>  
                                <div class="w-full mt-1">
                                <!-- Select -->
                                    <select id="select-category" name="category_id">
                                        <option value=""></option>
                                    </select>
                                <!-- End Select -->
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="select-institution" class="block text-sm font-bold text-gray-700">Tujuan Surat</label>  
                                <div class="w-full mt-1">
                                <!-- Select -->
                                    <select id="select-institution" name="institution_id">
                                        <option value=""></option>
                                    </select>
                                <!-- End Select -->
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="input-subject" class="block text-sm font-bold text-gray-700">Perihal</label>
                                <x-input id="input-subject" name="subject" class="block mt-1 w-full" type="text" placeholder="Perihal" />
                            </div>
                            <div class="mb-4">
                                <label for="input-description" class="block text-sm font-bold text-gray-700">Deskripsi</label>
                                <x-input id="input-description" name="description" class="block mt-1 w-full" type="text" placeholder="Deskripsi" />
                            </div>
                            <div class="mb-4 col-span-2">  
                                <label for="input-file" class="block text-sm font-bold text-gray-700">File</label>  
                                <input type="file" class="block mt-1 w-full py-3 px-4 border border-gray-300 focus:border-primary tranisiton-all duration-200 focus:ring-2 delay-75 focus:ring-primary rounded-md shadow-sm" name="file" id="input-file" accept=".doc, .docx, .pdf">
                                
                                <!-- <label class="block text-sm font-medium">File</label>   -->
                                <!-- <div class="dropzone" id="myDropzone"></div>   -->
                            </div> 
                        </div>
                        <!-- Modal Footer -->
                        <div class="p-4 border-t-2 flex justify-end">
                            <x-secondary-button class="mr-2" onclick="closeModal('modal')">Batal</x-secondary-button>
                            <x-button id="modal-submit"></x-button>
                        </div>  
                        </form>
                    </div>
                </div>


                <!-- Modal untuk Konfirmasi Delete -->
                <div id="delete-modal" class="fixed inset-0 z-50 hidden bg-gray-800 bg-opacity-50 flex items-center justify-center">
                    <div class="bg-white overflow-hidden rounded-lg shadow-lg w-11/12 md:w-1/3">
                        <!-- Modal Header -->
                        <div class="bg-primary text-white p-6">
                            <h2 class="modal-title text-2xl font-extrabold">Konfirmasi Hapus</h2>
                        </div>
                        <!-- Modal Body -->
                        <div class="p-6">
                            <p>Apakah Anda yakin ingin menghapus data ini?</p>
                        </div>
                        <!-- Modal Footer -->
                        <div class="p-4 border-t-2  flex justify-end">
                            <x-secondary-button class="mr-2" onclick="closeDeleteModal()">Batal</x-secondary-button>
                            <x-danger-button id="confirm-delete">Hapus</x-danger-button>
                        </div>  
                    </div>
                </div>

            </div>
                        
        </div>
    </div>

    <!-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->
    
    <!-- <script src="https://cdn.datatables.net/2.1.8/js/dataTables.tailwindcss.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="{{ asset('css/dataTables.tailwindcss.js') }}"></script>


    <script>
    
    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
        // Reset form if the modalId is 'modal'
        if (modalId === 'modal') {
            document.getElementById('modal-form').reset();
        }
    }

    
    function closeDeleteModal() {
        document.getElementById('delete-modal').classList.add('hidden');
    }

    
    function viewSuratKeluar(id) {
        // Ambil data dari server
        $.ajax({
            url: `/outgoing-letter/view/${id}`,
            method: 'GET',
            success: function(data) {
                // Menggunakan Luxon untuk memformat tanggal  
                const formattedLetterDate = luxon.DateTime.fromISO(data.letter_date).toLocaleString(luxon.DateTime.DATE_FULL);
                const formattedLetterStore = luxon.DateTime.fromISO(data.created_at).toLocaleString(luxon.DateTime.DATE_FULL);
                
                $('#letter-number').text(data.letter_number);
                $('#subject').text(data.subject);
                $('#institution-name').text(data.institution.name);
                $('#category-name').text(data.category.name);
                $('#letter-date').text(formattedLetterDate);
                $('#letter-store').text(formattedLetterStore);
                $('#description').text(data.description);
                $('#document-show').attr('href', data.file_route);
                $('.modal-title').text('Detail Surat Masuk');
                $('#view-modal').removeClass('hidden');
            }
        });
    }

    function editSuratKeluar(id) {  
        // Ambil data dari server  
        $.ajax({  
            url: `/outgoing-letter/edit/${id}`,  
            method: 'GET',  
            success: function(data) {  
                // Set nilai Selectize  
                var selectizeInstitution = $('#select-institution')[0].selectize;    
                selectizeInstitution.setValue(data.institution_id); // Mengatur nilai Selectize  
    
                var selectizeCategory = $('#select-category')[0].selectize;    
                selectizeCategory.setValue(data.category_id); // Mengatur nilai Selectize
                
                console.log(data);
                
                // Format tanggal  
                const formattedDate = luxon.DateTime.fromISO(data.letter_date).toFormat('LLLL d, yyyy');  
                
                // Mengisi form modal  
                $('.modal-title').text('Ubah Surat Masuk');  
                $('#input-id').val(data.id);   
                $('#input-letter-number').val(data.letter_number);   
                $('#input-subject').val(data.subject);   
                $('#input-description').val(data.description);   
                
                // Hancurkan instance Flatpickr yang ada jika ada    
                if (typeof flatpickrInstances !== 'undefined' && flatpickrInstances['#input-letter-date']) {    
                    flatpickrInstances['#input-letter-date'].destroy();    
                }    
    
                // Inisialisasi Flatpickr    
                const flatpickrInstance = flatpickr("#input-letter-date", {    
                    dateFormat: "j F Y", // Format tanggal sesuai kebutuhan    
                });    
    
                // Set tanggal di Flatpickr    
                flatpickrInstance.setDate(data.letter_date, true); // Set tanggal yang dipilih    
    
                // Menandai elemen <span> dengan class 'selected'    
                const selectedDay = document.querySelector(`span.flatpickr-day[aria-label="${formattedDate}"]`);    
                if (selectedDay) {    
                    selectedDay.classList.add('selected');    
                }  
                
                // Tampilkan modal  
                $('#modal-submit').show();  
                $('#modal-submit').text('Simpan');  
                $('#modal').removeClass('hidden');  
            },  
            error: function(xhr) {  
                toastr.error('Terjadi kesalahan saat mengambil data: ' + xhr.responseJSON.message, 'Gagal');  
            }  
        });  
    }    
    
    // Fungsi untuk membuka modal dan mereset form  
    function addSuratKeluar() {  
        // Reset Selectize  
        var selectizeInstitution = $('#select-institution')[0].selectize;    
        selectizeInstitution.setValue('');   
    
        var selectizeCategory = $('#select-category')[0].selectize;    
        selectizeCategory.setValue('');   
    
        // Hancurkan instance Flatpickr yang ada jika ada  
        if (typeof flatpickrInstances !== 'undefined' && flatpickrInstances['#input-letter-date']) {    
            flatpickrInstances['#input-letter-date'].destroy();    
        }    
    
        // Inisialisasi Flatpickr  
        const flatpickrInstance = flatpickr("#input-letter-date", {    
            dateFormat: "j F Y",    
            defaultDate: null,    
            onReady: function(selectedDates, dateStr, instance) {    
                instance.jumpToDate(new Date());    
            }    
        });  
    
        // Reset form  
        document.getElementById('modal-form').reset();
        $('#input-id').val(''); 
        $('#input-file-name').val(''); 
        $('#input-file').val(''); 
  
    
        // Ubah judul modal dan tampilkan  
        $('.modal-title').text('Tambah Surat Masuk');   
        $('#modal-submit').show();  
        $('#modal-submit').text('Tambah Surat Masuk');  
        $('#modal').removeClass('hidden'); // Tampilkan modal  
    }  


    // Konfirmasi delete
    function confirmDeleteSuratKeluar(id) {
        $('#delete-modal').removeClass('hidden');
        $('#confirm-delete').off('click').on('click', function() {
            $.ajax({
                url: `/outgoing-letter/delete/${id}`,
                method: 'DELETE',
                data: {  
                    _token: '{{ csrf_token() }}' // Token CSRF untuk keamanan  
                }, 
                success: function() {
                    $('#delete-modal').addClass('hidden');
                    $('#dataTable').DataTable().ajax.reload(); // Reload DataTable
                    toastr.success('Data berhasil dihapus.','Berhasil'); // Tampilkan pesan sukses
                },
                error: function(xhr) {
                    toastr.error('Terjadi kesalahan: ' + xhr.responseJSON.message); // Tangani kesalahan
            }
            });
        });
    }
      
    
    $(document).ready(function() {
        // Set CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {  
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  
            }
        });


        initializeFlatpickr('#input-letter-date', {
            dateFormat: "d F Y" // Format tanggal  
        });
        
        initializeSelectize(    
            '#select-category', // ID elemen select    
            { // Opsi Selectize    
                valueField: 'id',    
                labelField: 'name',    
                searchField: 'name',    
                placeholder: 'Kategori Surat',    
                plugins: [  
                    'clear_button'  
                ],     
            },    
            "{{ route('api.category') }}" // URL AJAX    
        );  
  
        initializeSelectize(    
            '#select-institution', // ID elemen select    
            { // Opsi Selectize    
                valueField: 'id',    
                labelField: 'name',    
                searchField: 'name',    
                placeholder: 'Tujuan Surat',    
                plugins: [  
                    'clear_button'  
                ],     
            },    
            "{{ route('api.institution') }}" // URL AJAX    
        );

     

        var table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            order: [2, 'desc'],
            ajax: {
                url: "{{ route('outgoing-letter.data') }}",
                data: function(d) {
                    d.draw = d.draw;
                    d.start = d.start;
                    d.length = d.length;
                    d.search = d.search;
                    d.order = d.order;
                    console.log(d);
                },

                error: function(xhr, error, thrown) {
                    console.log('Error AJAX:', error);
                    console.log('Response:', xhr.responseText);
                }
            },
            columns: [
                {data: null, render: function (data, type, row, meta) {  
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                { data: 'category.name', name: 'category.name', },
                { data: null, name: 'letter_date',
                    render: function(data, type, row) {
                        const formattedDate = luxon.DateTime.fromISO(row.letter_date).toLocaleString(luxon.DateTime.DATE_FULL);  
                        
                        return '<span class="text-sm"> Nomor: </span> <br>' + '<span class="font-extrabold">' + row.letter_number + '</span> <br> <span class="text-sm"> Tanggal: ' + ' </span> <br> <span class="font-extrabold">' + formattedDate + '</span>'; 
                    },  
                },  
                { data: 'institution.name', name: 'institution.name', },
                { data: null, name: 'subject_description',
                    render: function(data, type, row) {  
                        return '<span class="font-extrabold">' + row.subject + ',<br></span>' + row.description; 
                    },  
                },   
                { data: null, render: function(data, type, row) {
                    return '<button type="submit" class="btn-icon-action tippy-button" data-tippy-content="Lihat Data" onclick="viewSuratKeluar(' + row.id + ')">' +
                   '<i class="ti ti-eye"></i>' +
                   '</button>' +
                   '<button type="submit" class="btn-icon-action tippy-button" data-tippy-content="Ubah Data"" onclick="editSuratKeluar(' + row.id + ')">' +
                   '<i class="ti ti-edit"></i>' +
                   '</button>' +
                   '<button type="submit" class="btn-icon-actionDelete tippy-button" data-tippy-content="Hapus Data" onclick="confirmDeleteSuratKeluar(' + row.id + ')">' +
                   '<i class="ti ti-trash"></i>' +
                   '</button>';
                } }
            
            ],
            columnDefs: [
                {
                    targets: 0, // Indeks kolom yang ingin ditambahkan kelas p-3
                    orderable:false,
                    createdCell: function(td, cellData, rowData, row, col) {
                        $(td).addClass('p-4 text-center'); // Menambahkan kelas p-3
                    }
                },

                {
                    targets: [1, 2, 3, 4], // Indeks kolom yang ingin ditambahkan kelas p-3
                    createdCell: function(td, cellData, rowData, row, col) {
                        $(td).addClass('p-4 '); // Menambahkan kelas p-3
                    }
                },

                {
                    targets: 5, // Kolom aksi
                    orderable: false, // Nonaktifkan sorting untuk kolom aksi
                    createdCell: function(td, cellData, rowData, row, col) {
                        $(td).addClass('p-4 text-center space-x-2'); // Menambahkan kelas inline-flex
                    }
                }
            ],            
            createdRow: function(row, data, dataIndex) {
                    $(row).addClass('transition-all duration-300 hover:bg-gray-100/70'); // Menambahkan kelas hover:bg-gray-100 ke setiap baris
                },
            language: {
                lengthMenu: "Menampilkan  _MENU_  data", // Mengubah teks "Show entries"
                info: "Menampilkan <span class='font-extrabold text-blue-900'>_START_</span> hingga <span class='font-extrabold text-blue-900'>_END_</span> dari <span class='font-extrabold text-blue-900'>_TOTAL_</span> data",
                infoEmpty: "Tidak ada data yang tersedia",
                zeroRecords: "Tidak ada data yang ditemukan"
            },
            // Inisialisasi Tippy.js setelah DataTable selesai menggambar
            initComplete: function(settings, json) {
                initializeTooltips(); // Panggil fungsi untuk menginisialisasi tooltip
            },
            drawCallback: function(settings) {
                initializeTooltips(); // Inisialisasi tooltip setiap kali tabel digambar ulang
            }
            
         
        });
        

        // Menghubungkan input pencarian kustom dengan DataTables
        $('#search-input').on('keyup', function() {
            table.search(this.value).draw(); // Panggil fungsi search dari DataTables
            var displayedDataCount = table.rows({ filter: 'applied' }).count();
            
        });

    
        $('#modal-form').on('submit', function(e) {    
            e.preventDefault(); // Mencegah form dari submit default    
            const id = $('#input-id').val();  
                
            // Ambil data dari form    
            var formData = new FormData(this); // Mengambil semua data dari form  
        
            // Format tanggal    
            const letter_date = $('#input-letter-date').val();     
            const formattedDate = luxon.DateTime.fromFormat(letter_date, 'd MMMM yyyy').toISODate();     
                
            // Update field yang diperlukan  
            formData.set('letter_date', formattedDate); // Menggunakan set untuk memperbarui nilai

                if (id) {  
                    formData.set('_method', 'PATCH');
                } else {  
                    formData.set('_method', 'POST');   
                }  


            for (let [key, value] of formData.entries()) {  
                    console.log(key, value);  
                } 
                
            // Kirim data menggunakan AJAX    
            $.ajax({    
                url: id ? `/outgoing-letter/update/${id}` : '/outgoing-letter/store',    
                method: 'POST',    
                data: formData,    
                processData: false,    
                contentType: false,    
                success: function(response) {    
                    console.log("Respons dari server:", response);    
                    $('#modal').addClass('hidden');    
                    $('#dataTable').DataTable().ajax.reload();    
                    const title = 'Berhasil';    
                    toastr.success(id ? 'Data berhasil diperbarui.' : 'Data berhasil ditambahkan.', title);    
                },    
                error: function(xhr) {    
                    console.error("Kesalahan saat mengirim data:", xhr);    
                    toastr.error('Terjadi kesalahan: ' + xhr.responseJSON.message, 'Gagal');    
                }    
            });    
        });  

        
    });
    </script>
    
</div>