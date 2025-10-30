<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $table = 'producto';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'precio',
        'peso',
        'ancho',
        'alto',
        'largo',
        'stock',
    ];


}
