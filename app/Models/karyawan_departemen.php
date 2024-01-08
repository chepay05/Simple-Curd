<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan_departemen extends Model
{
    protected $table = 'karyawan_departemen';
    protected $primaryKey = 'Kode';
    protected $fillable = ([
        'Kode',
        'NIP',
        'Id_Departemen',
    ]);

    public function karyawan()
    {
        return $this->belongsTo(karyawan::class,'NIP');
    }
    public function departemen()
    {
        return $this->belongsTo(departemen::class,'Id_karyawan');
    }
}
