<?php  
  
use Illuminate\Database\Migrations\Migration;  
use Illuminate\Database\Schema\Blueprint;  
use Illuminate\Support\Facades\Schema;  
  
return new class extends Migration  
{  
    public function up(): void  
    {  
        Schema::table('outgoing_letters', function (Blueprint $table) {  
            $table->text('description')->nullable()->after('subject');  
            $table->string('subject')->nullable()->change(); // Mengubah subject menjadi nullable  
            $table->dropColumn('status');  
        });  
    }  
  
    public function down(): void  
    {  
        Schema::table('outgoing_letters', function (Blueprint $table) {  
            $table->string('status')->nullable()->after('file');  
            $table->string('subject')->nullable(false)->change(); // Mengembalikan subject ke not nullable  
            $table->dropColumn('description');  
        });  
    }  
};  
