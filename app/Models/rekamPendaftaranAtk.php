<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekamPendaftaranAtk extends Model
{
    use HasFactory;

    protected $table = 'rekamPendaftaranAtk';

    protected $fillable = [

        'nip',
        'namaUser',
        'namaBarang',
        'kodeBarang',
        'debet'


    ];
}
