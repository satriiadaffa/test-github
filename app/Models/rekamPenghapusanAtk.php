<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekamPenghapusanAtk extends Model
{
    use HasFactory;
    protected $table = 'rekamPenghapusanAtk';

    protected $fillable = [

        'nip',
        'namaUser',
        'namaBarang',
        'kodeBarang'


    ];
}
