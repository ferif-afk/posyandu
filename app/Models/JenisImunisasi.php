<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisImunisasi extends Model
{
    protected $primaryKey = 'id_jenis';

    protected $table = 'jenis_imunisasi';
    protected $fillable = ['nama_balita','nama_imunisasi', 'ket',];

    public $timestamps = false;
}
