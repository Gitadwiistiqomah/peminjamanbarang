<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjamans extends Model
{
    use HasFactory;
    
    protected $table = 'peminjaman';
    protected  $fillable = [
        'items_id',
        'categories_id',
        'name',
        'kelas',
        'waktu_peminjaman',
        'waktu_kembali',
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


}
