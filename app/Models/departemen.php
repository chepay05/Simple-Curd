<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departemen extends Model
{
    use HasFactory;

    protected $table = 'departemen';

    protected $primaryKey = 'Id_Departemen';
    
    protected $fillable = [
        'Id_Departemen',
        'Nama_departemen',
    ];

    public function karyawan(){
        return $this->hasOne(karyawan_departemen::class, 'Id_Departemen');
    }
}
