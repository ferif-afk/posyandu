<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penimbangan extends Model
{
    protected $primaryKey = 'id_timbang';

    protected $table = 'penimbangan';
    protected $fillable = ['nama_balita', 'tgl_lahir', 'hasil_timbang', 'tinggi_badan', 'status', 'bayi_id'];

    public $timestamps = false;
}
