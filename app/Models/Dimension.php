<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    use HasFactory;

    protected $table = "dimension";
    
    protected $fillable = [
        "id",
        "largo",
        "ancho",
    ];
}
