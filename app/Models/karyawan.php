<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use HasFactory;
    protected $fillable = [
    'nama_karyawan',
    'jk_karyawan',
    'dob_karyawan',
    'alamat_karyawan',
    ];
}
