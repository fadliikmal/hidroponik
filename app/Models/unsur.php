<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class unsur extends Model
{
    use HasFactory;
    protected $table = 'unsur';

    protected $fillable = [
        'record_date',
        'pH',
        'TDS',
        'suhu',
    ];
}
