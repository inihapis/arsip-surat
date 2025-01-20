<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Memindahkan data dari kolom nomor_surat di tabel surat_masuk ke letter_number di tabel incoming_letters  
        DB::table('incoming_letters as target')  
            ->join('surat_masuk as source', 'target.id', '=', 'source.id_surat_masuk') // Ganti 'id' dengan kolom yang sesuai untuk join  
            ->update(['target.letter_number' => DB::raw('source.nomor_surat')]); // Memindahkan data nomor_surat ke letter_number  
    }  

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('incoming_letters')->update(['letter_number' => null]); // Atau logika lain sesuai kebutuhan  
    }
};
