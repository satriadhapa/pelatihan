<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $fillable= [
        'nim',
        'nama',
        'alasan',
        'category_id'
    ];
    // diarahkan sesuai denan nama field _id
    public function category()
    {
        return $this-> belongsTo(Category::class); //method ini dimiliki kelas Category
                                        // jika field _id berbeda, tulis pada parameter ke dua setelah :: class
                                        
    }
}
