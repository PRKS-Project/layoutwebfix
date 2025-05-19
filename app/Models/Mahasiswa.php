<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    use HasFactory;

    protected $table = 'mahasiswa';

    protected $primaryKey = 'nim'; // Set NIM sebagai Primary Key
    public $incrementing = false; // Nonaktifkan auto-increment karena NIM adalah string
    protected $keyType = 'string'; // Tipe data string untuk NIM

    protected $fillable = [
        'nim',
        'nama',
        'email',
        'no_telp',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}


