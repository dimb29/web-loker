<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'per_nama',
        'per_type',
        'per_alamat',
        'per_prov',
        'per_kota',
        'owner_id',
    ];
}
