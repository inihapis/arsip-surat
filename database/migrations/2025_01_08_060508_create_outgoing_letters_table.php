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
        Schema::create('outgoing_letters', function (Blueprint $table) {  
            $table->id();  
            $table->date('letter_date');  
            $table->timestamp('input_date')->useCurrent();  
            $table->unsignedBigInteger('institution_id')->nullable();  
            $table->string('recipient');  
            $table->unsignedBigInteger('category_id');  
            $table->string('letter_number');  
            $table->string('subject');  
            $table->longText('file')->nullable();  
            $table->string('status')->nullable();  
            $table->timestamps();  
  
            $table->foreign('institution_id')->references('id')->on('institutions')->onDelete('set null');  
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');  
        });  
    }  
  
    /**  
     * Reverse the migrations.  
     */  
    public function down(): void  
    {  
        Schema::dropIfExists('outgoing_letters');  
    }  
};  
