<div
    x-data="{ open: false }"
    @notify.window="
        console.log($event.detail);
        console.log($event.detail.title);
        console.log($event.detail.message);
        console.log($event.detail.type); // Menangkap tipe notifikasi
        if ($event.detail.type === 'success') {
            toastr.success($event.detail.message, $event.detail.title);
        } else if ($event.detail.type === 'error') {
            toastr.error($event.detail.message, $event.detail.title);
        } else if ($event.detail.type === 'info') {
            toastr.info($event.detail.message, $event.detail.title);
        } else if ($event.detail.type === 'warning') {
            toastr.warning($event.detail.message, $event.detail.title);
        }
    ">
    
</div>