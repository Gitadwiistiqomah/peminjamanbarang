<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjamans extends Model
{
    use HasFactory;
    
    // protected $table = 'peminjaman';
    protected  $fillable = [
        'name',
        'kelas',
        'items_id',
        'categories_id',
        'waktu_peminjaman',
        'status', 
     ];

     public function items()
     {
         return $this->belongsTo(Items::class, 'items_id'); // Menunjukkan relasi ke model Item
     }
 
     // Fungsi untuk relasi dengan model Category
     public function categories()
     {
         return $this->belongsTo(Categories::class, 'categories_id'); // Menunjukkan relasi ke model Category
     }


}
