<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banjir extends Model
{
    use HasFactory;

    protected $table = 'banjir';
    protected $guarded = ['id_banjir'];
}
