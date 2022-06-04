<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'harga',
        'jumlah',
        'foto',
        'kategori_id'
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function transaction(){
        return $this->hasOne(Transaction::class,'barang_id');
    }
}
