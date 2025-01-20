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
        $surat_masuk = DB::table('surat_masuk')->get();

        foreach ($surat_masuk as $oldSuratMasuk) {
            DB::table('incoming_letters')->insert([
                'input_date' => $oldSuratMasuk->tanggal_diterima, // Adjust according to your old column names
                'subject' => $oldSuratMasuk->perihal, // Adjust according to your old column names
                'institution_id' => $oldSuratMasuk->asal_surat, // Adjust according to your old column names
                'letter_date' => $oldSuratMasuk->tanggal_surat, // Adjust according to your old column names
                'description' => $oldSuratMasuk->keterangan, // Adjust according to your old column names
                'file' => $oldSuratMasuk->arsip, // Adjust according to your old column names
                'sender' => null,
                'created_at' => $oldSuratMasuk->created_at ?? Carbon::now(),
                'updated_at' => $oldSuratMasuk->updated_at ?? Carbon::now(),
                // Add any other necessary fields here
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('incoming_letters')->where('created_at', '>=', now()->subMinute())->delete();  
    }
};
