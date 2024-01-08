<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    protected $primaryKey = 'NIP';
    
    protected $fillable = [
        'NIP',
        'Nama',
        'Jabatan',
        'Gaji',
    ];

    public function departemen(){
        return $this->hasOne(karyawan_departemen::class,'NIP');
    }
}
