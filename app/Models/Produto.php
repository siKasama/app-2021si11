<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'quantidade'];

    public function movimentacao() {
        return $this->hasMany(Movimentacao::class);
    }
}
