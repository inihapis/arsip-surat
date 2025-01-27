<?php  
  
namespace App\Models;  
  
use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;  

  
class Category extends Model  
{  
    use HasFactory;  
  
    protected $fillable = [  
        'name',  
        'letter_code',  
    ];
    
    // Definisikan relasi dengan OutgoingLetter  
    public function outgoingLetters(): HasMany  
    {  
        return $this->hasMany(OutgoingLetter::class, 'category_id'); // 'category_id' adalah foreign key di tabel outgoing_letters  
    }  
}  
