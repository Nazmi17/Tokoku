<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Restock_log extends Model
{
    use HasFactory;
    protected $table = 'restock_log';
    protected $primaryKey = 'id_restock';
    public $timestamps = false;

    protected $fillable = [
        'barang_id',
        'jumlah',
        'harga_beli',
        'total',
        'catatan',
        'user_id',
    ];

    protected $dates = ['created_at'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id_barang');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
