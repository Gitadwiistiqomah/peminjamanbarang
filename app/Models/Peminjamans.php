<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjamans extends Model
{
    use HasFactory;
    
    protected $table = 'peminjaman';
    protected  $fillable = [
        'item_id',
        'name',
        'kelas',
        'waktu_peminjaman',
        'waktu_kembali',
        'total_pinjam',
        'status', 
     ];

    public function item()
    {
        return $this->belongsTo(Items::class);
    }


}
