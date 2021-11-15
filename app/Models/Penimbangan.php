<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penimbangan extends Model
{
    protected $primaryKey = 'id_timbang';

    protected $table = 'penimbangan';
    protected $fillable = ['tgl_lahir', 'hasil_timbang', 'tinggi_badan', 'status', ];

    public $timestamps = false;
}
