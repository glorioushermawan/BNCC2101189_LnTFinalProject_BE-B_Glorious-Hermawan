<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_id',
        'quantity',
        'alamat',
        'pos',
        'invoice',
        'status'
    ];

    public function barang(){
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
