<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


return new class extends Migration
{
    public function up()
    {
        // Assuming your old table is named 'old_institutions'
        $oldInstitutions = DB::table('instansi')->get();

        foreach ($oldInstitutions as $oldInstitution) {
            DB::table('institutions')->insert([
                'name' => $oldInstitution->nama_instansi, // Adjust according to your old column names
                'address' => $oldInstitution->alamat,
                'phone' => null,
                'email' => null,
                'created_at' => $oldInstitution->created_at ?? Carbon::now(),
                'updated_at' => $oldInstitution->updated_at ?? Carbon::now(),
                // Add any other necessary fields here
            ]);
        }
    }

    public function down()
    {
        // Optionally, you can define how to reverse the migration
        DB::table('institutions')->truncate(); // This will delete all records in the institutions table
    }
};