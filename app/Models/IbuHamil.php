<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IbuHamil extends Model
{
    protected $primaryKey = 'id_bumil';

    protected $table = 'ibu_hamil';
    protected $fillable = ['nama_bumil', 'tgl_lahir', 'gol_darah', 'pekerjaan', 'alamat', 'no_telp', 'nama_suami', 'bayi_id'];

    public $timestamps = false;
}
