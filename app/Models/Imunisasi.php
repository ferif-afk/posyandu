<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imunisasi extends Model
{
    protected $primaryKey = 'id_imunisasi';

    protected $table = 'imunisasi';
    protected $fillable = ['tgl_imunisasi', 'umur_skr', 'ket', 'jenis_id'];

    public $timestamps = false;
}
