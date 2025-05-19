<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota'; 

    protected $fillable = [
        'user_name',
        'email',
        'nama_lengkap',
        'alamat',
        'no_telpon'
    ];
}
