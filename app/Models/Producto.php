<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'state',
        'stok',
        'image'
    ];

    public function productos() {
        return $this->belongsToMany(Catalogo::class)->using(Catalogo_producto::class);
    }
}