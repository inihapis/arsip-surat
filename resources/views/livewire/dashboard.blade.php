<div class="grid grid-cols-4 gap-4">
    <!-- Instansi -->
    <div class="card">
        <div class="card-body">
            <div class="flex items-center justify-between">
                <div class="flex flex-col">
                <h4 class="text-lg font-semibold ">Instansi</h4>
                <h3 class="text-3xl font-extrabold text-blue-600">{{$institutionCount}}</h3>
                </div>
                <!-- <div class="flex-shrink-0 h-fit w-auto">
                    <div class=" p-4 flex justify-center items-center rounded-lg bg-cyan-500 text-white self-start">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-home size-12"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                    </div>
                </div> -->
                
            </div>
            
        </div>
    </div>
    <!-- Instansi -->
    <div class="card">
        <div class="card-body">
            <div class="flex items-center justify-between">
                <div class="flex flex-col">
                <h4 class="text-lg font-semibold ">User</h4>
                <h3 class="text-3xl font-extrabold text-blue-600">{{$userCount}}</h3>
                </div>
                
            </div>
            
        </div>
    </div>
    <!-- Instansi -->
    <div class="card">
        <div class="card-body">
            <div class="flex items-center justify-between">
                <div class="flex flex-col">
                <h4 class="text-lg font-semibold ">Kategori Surat</h4>
                <h3 class="text-3xl font-extrabold text-blue-600">{{$categoryCount}}</h3>
                </div>
               
            </div>
            
        </div>
    </div>
    <!-- Instansi -->
    <div class="card">
        <div class="card-body">
            <div class="flex items-center justify-between">
                <div class="flex flex-col">
                <h4 class="text-lg font-semibold ">Instansi</h4>
                <h3 class="text-3xl font-extrabold text-blue-600">17</h3>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Surat Masuk -->
    <div class="card">
        <div class="card-body">
            <div class="flex items-center justify-between">
                <div class="flex flex-col">
                    <div class="mb-2">
                        <h4 class="font-semibold ">Surat Masuk</h4>
                        <p class="text-gray-600 text-sm font-light ">Seluruh</p>
                    </div>
                    <h3 class="text-3xl font-extrabold text-blue-600">{{ $incomingCount }}</h3>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Surat Masuk -->
    <div class="card">
        <div class="card-body">
            <div class="flex items-center justify-between">
                <div class="flex flex-col">
                    <div class="mb-2">
                        <h4 class="font-semibold ">Surat Masuk</h4>
                        <p class="text-gray-600 text-sm font-light ">Tahun</p>
                    </div>
                    <h3 class="text-3xl font-extrabold text-blue-600">10</h3>
                </div>
                 
            </div>
        </div>
    </div>
    <!-- Surat Keluar -->
    <div class="card">
        <div class="card-body">
            <div class="flex items-center justify-between">
                <div class="flex flex-col">
                    <div class="mb-2">
                        <h4 class="font-semibold ">Surat Keluar</h4>
                        <p class="text-gray-600 text-sm font-light ">Seluruh</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    <!-- Surat Keluar -->
    <div class="card">
        <div class="card-body">
            <div class="flex items-center justify-between">
                <div class="flex flex-col">
                    <div class="mb-2">
                        <h4 class="font-semibold ">Surat Keluar</h4>
                        <p class="text-gray-600 text-sm font-light ">Tahun</p>
                    </div>
                    <h3 class="text-3xl font-extrabold text-blue-600">17</h3>
                </div>
                <div class="flex-shrink-0 h-fit w-auto">
                    <div class="p-4 flex h-f justify-center items-center rounded-lg bg-cyan-500 text-white self-start">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-home size-12"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                    </div>
                </div>  
            </div>
        </div>
    </div>

    <div class="card col-span-2 row-span-2">
        <div class="card-body">
            <div class="flex items-center justify-between">
                <canvas class="mx-4" id="outgoingChart"></canvas>  
            </div>
        </div>
    </div>

    <div class="card col-full">
        <div class="card-body">
            <div class="flex items-center justify-between">
                <canvas id="rekapChart"></canvas>  
            </div>
        </div>
    </div>

    @push('scripts')  
    <script>
        document.addEventListener('DOMContentLoaded', function () {  
    
            // Data untuk chart (misalnya diambil dari server)    
            const data = @json($outgoingChart);  
              
            // Memfilter kategori yang tidak memiliki jumlah    
            const filteredData = data.filter(item => item.Jumlah > 0);    
            
            const labels = filteredData.map(item => item.Kategori);    
            const values = filteredData.map(item => item.Jumlah);   
            
            console.log(data); // Tambahkan ini sebelum inisialisasi chart
            // Append '4d' to the colors (alpha channel), except for the hovered index
            
            function handleHover(evt, item, legend) {
                legend.chart.data.datasets[0].backgroundColor.forEach((color, index, colors) => {
                    colors[index] = index === item.index || color.length === 9 ? color : color + '4D';
                });
                legend.chart.update();
            }
            
            // Removes the alpha channel from background colors
            function handleLeave(evt, item, legend) {
                legend.chart.data.datasets[0].backgroundColor.forEach((color, index, colors) => {
                    colors[index] = color.length === 9 ? color.slice(0, -2) : color;
                });
                legend.chart.update();
            }
            
            const ctx = document.getElementById('outgoingChart').getContext('2d');
            
            // Definisikan palet warna  
            const colorPalette = [  
                '#FF6384', // Merah Muda  
                '#36A2EB', // Biru  
                '#FFCE56', // Kuning  
                '#4BC0C0', // Hijau  
                '#9966FF', // Ungu  
                '#FF9F40'  // Oranye  
            ];  
            
            // Ambil warna yang telah digunakan dari localStorage  
            let usedColors = JSON.parse(localStorage.getItem('usedColors')) || [];  
            
            // Fungsi untuk mengambil warna dari palet  
            function getColor() {  
                // Jika semua warna telah digunakan, reset usedColors  
                if (usedColors.length === colorPalette.length) {  
                    usedColors = [];  
                }  
                
                // Pilih warna yang belum digunakan  
                let color;  
                do {  
                    color = colorPalette[Math.floor(Math.random() * colorPalette.length)];  
                } while (usedColors.includes(color));  
                
                // Tambahkan warna yang dipilih ke usedColors  
                usedColors.push(color);  
                // Simpan kembali ke localStorage  
                localStorage.setItem('usedColors', JSON.stringify(usedColors));  
                return color;  
            }  
                
            // Membuat array warna untuk dataset  
            const backgroundColors = values.map(() => getColor());    
            
            const myDonutChart = new Chart(ctx, {    
                type: 'doughnut',    
                data: {    
                    labels: labels,    
                    datasets: [{    
                        data: values,
                        backgroundColor: backgroundColors,    
                        hoverOffset: 12,  
                        borderWidth: 4    
                    }]    
                },                
                options: {  
                    responsive: true,    
                    maintainAspectRatio: false,  
                    plugins: {    
                        legend: {
                            align: 'start',    
                            position: 'bottom',
                            onHover: handleHover,
                            onLeave: handleLeave,
                            labels: {  
                                font: {  
                                    size: 12 // Menyesuaikan ukuran font  
                                },  
                                padding: 10 // Jarak antara label  
                            } 
                        },
                        tooltip: {  
                            // Mengatur tampilan tooltip
                            titleColor: 'black',  
                            bodyColor: '#666',  
                            backgroundColor: 'white',  
                            // Mengatur border color sesuai dengan backgroundColors  
                            borderColor: function(context) {  
                                const dataIndex = context.tooltip.dataPoints[0].dataIndex; // Ambil indeks data  
                                return backgroundColors[dataIndex]; // Ambil warna dari backgroundColors  
                            },
                            borderWidth: 2, // Lebar border tooltip  
                            callbacks: {  
                                // Mengatur isi tooltip  
                                label: function(tooltipItem) {  
                                    const text = 'Jumlah Surat Keluar:';  
                                    const value = tooltipItem.raw || 0;  
                                    return `${text} ${value}`; // Format isi tooltip  
                                }   
                            }  
                        }  
                    },  
                },  
                animation: {    
                    duration: 1000, // Durasi animasi masuk    
                    easing: 'easeInOutQuad', // Jenis easing    
                },    
                transitions: {    
                    active: {    
                        animation: {    
                            duration: 400, // Durasi animasi saat aktif (hover)    
                            easing: 'easeInOutQuad',    
                        }    
                    },  
                }      
            });
            
            
        });  

    </script>
    @endpush



</div>