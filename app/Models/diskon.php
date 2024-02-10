<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diskon extends Model
{
    use HasFactory;
    protected $table = 'diskon';
    protected $primaryKey = 'id_diskon';
    protected $fillable = [
        'id_diskon',
        'nama_diskon',
        'kode_diskon',
        'nama_diskon',
        'total_diskon'
    ];
    
}
