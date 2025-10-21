<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posyandu extends Model
{
    protected $table = 'posyandu';
    protected $primaryKey = 'posyandu_id';
    protected $fillable = [
        'nama',
        'alamat',
        'rt',
        'rw',
        'kontak',
    ];

}
