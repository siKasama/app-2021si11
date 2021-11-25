<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    use HasFactory;

    protected $fillable = ['quantidade', 'data', 'tipo'];

    public function produto() {
        return $this->belongsTo(Produto::class);
    }
}
