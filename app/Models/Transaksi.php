<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected  $fillable = [
        'user_id',
        'item_id',
        'name',
        'no_hp',
        'alamat',
        'tanggal_peminjaman',
        'lama_peminjaman',
        'total',
        'status', 
     ];
     public function user()
     {
         return $this->belongsTo(User::class);
     }
     
    public function item()
    {
        return $this->belongsTo(Items::class);
    }


}
