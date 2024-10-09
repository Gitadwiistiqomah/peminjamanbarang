<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $table = "items";
    protected  $fillable = [
        'members_id',
        'namebarang',
        'harga',
        'foto',
    ];

    public function members()
    {
        return $this->belongsTo(Members::class);
    }
}
