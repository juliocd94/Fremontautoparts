<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    use HasFactory;

    public function productos() {
        return $this->belongsToMany(Producto::class)->using(Catalogo_producto::class);
    }
}
