<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;


class MigrateJenisSuratToCategories extends Migration  
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $jenis = DB::table('jenis')->get();

        foreach ($jenis as $oldCategories) {
            DB::table('categories')->insert([
                'name' => $oldCategories->nama_jenis, // Adjust according to your old column names
                'letter_code' => null,
                'created_at' => $oldCategories->created_at ?? Carbon::now(),
                'updated_at' => $oldCategories->updated_at ?? Carbon::now(),
                // Add any other necessary fields here
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('categories')->where('created_at', '>=', now()->subMinute())->delete();  
    }
};
