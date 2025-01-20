<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;  
use Illuminate\Database\Eloquent\Relations\BelongsTo;  

class OutgoingLetter extends Model
{
    use HasFactory;  
  
    protected $fillable = [  
        'letter_number',  
        'letter_date',  
        'institution_id',  
        'category_id',  
        'subject',  
        'file',  
        'description',  
    ];  
  
    protected $casts = [  
        'letter_date' => 'date',  
    ];  
  
    public function institution(): BelongsTo  
    {  
        return $this->belongsTo(Institution::class);  
    }  
  
    public function category(): BelongsTo  
    {  
        return $this->belongsTo(Category::class);  
    }
}
