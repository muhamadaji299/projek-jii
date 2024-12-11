<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Menentukan kolom mana yang bisa diisi (mass assignment)
    protected $table = 'aji_table';
    protected $fillable = [
        'nis',
        'nama',
        'alamat',
        'no_hp',
        'jenis_kelamin',
        'hobi',
    ];

    // Jika perlu, tambahkan juga protected $guarded untuk menghindari field tertentu agar tidak bisa diisi.
    // protected $guarded = ['id'];  // Misalnya 'id' tidak bisa diisi
}
