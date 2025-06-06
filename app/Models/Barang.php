<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    

    protected $fillable = [
        'nama_barang',
        'harga_jual',
        'stok',
        'kategori_id',
        'user_id'
    ];

    public function user()
    {
          return $this->belongsTo(User::class);
    }
}
