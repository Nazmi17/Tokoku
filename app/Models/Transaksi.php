<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = [

        'user_id',
        'total_harga',
        'dibayar',
        'kembalian',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaksi_detail()
    {
        return $this->hasMany(Transaksi_detail::class, 'transaksi_id', 'id_transaksi');
    }
}
