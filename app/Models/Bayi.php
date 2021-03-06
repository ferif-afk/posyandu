<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bayi extends Model
{
    protected $primaryKey = 'id_bayi';

    protected $table = 'tb_bayi';
    protected $fillable = ['nama_bayi', 'tgl_lahir', 'jenis_kelamin', 'berat_lahir', 'panjang_lahir', 'lingkar_kepala', 'anak_ke'];

    public $timestamps = false;
}
