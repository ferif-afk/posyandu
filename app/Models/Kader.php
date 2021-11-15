<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kader extends Model
{
    protected $primaryKey = 'id_kader';

    protected $table = 'kader';
    protected $fillable = ['nama_kader', 'jabatan', 'jenis_kelamin', 'tgl_lahir', 'alamat', 'no_telp'];

    public $timestamps = false;
}
