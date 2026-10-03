<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = [
        'nome',
        'descricao',
        'user_id',
    ];

    public function gastos()
    {
        return $this->hasMany(Gasto::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}