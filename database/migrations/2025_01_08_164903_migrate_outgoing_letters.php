<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $surat_keluar = DB::table('surat_keluar')->get();

        foreach ($surat_keluar as $oldSuratKeluar) {
            DB::table('outgoing_letters')->insert([
                'input_date' => $oldSuratKeluar->tanggal_register, // Adjust according to your old column names
                'subject' => $oldSuratKeluar->perihal, // Adjust according to your old column names
                'institution_id' => $oldSuratKeluar->tujuan_surat, // Adjust according to your old column names
                'letter_date' => $oldSuratKeluar->tanggal_surat, // Adjust according to your old column names
                'letter_number' => $oldSuratKeluar->nomor_surat, // Adjust according to your old column names
                'description' => $oldSuratKeluar->keterangan, // Adjust according to your old column names
                'category_id' => $oldSuratKeluar->jenis, // Adjust according to your old column names
                'file' => $oldSuratKeluar->arsip, // Adjust according to your old column names
                'recipient' => null,
                'created_at' => $oldSuratKeluar->created_at ?? Carbon::now(),
                'updated_at' => $oldSuratKeluar->updated_at ?? Carbon::now(),
                // Add any other necessary fields here
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('outgoing_letters')->where('created_at', '>=', now()->subMinute())->delete();  
    }
};
