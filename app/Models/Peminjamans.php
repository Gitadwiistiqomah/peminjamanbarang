<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjamans extends Model
{
    use HasFactory;
    
    protected $table = 'peminjaman';
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
         return $this->belongsTo(Items::class);
     }
 
     public function categories()
     {
         return $this->belongsTo(Categories::class);
     }
     
 
    //  public function items()
    //  {
    //      return $this->hasMany(Items::class);
    //  }

    //  public function categories()
    //  {
    //      return $this->belongsTo(Categories::class);
    //  }
}




