<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';


    protected $fillable = [
        'nama_kategori',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
