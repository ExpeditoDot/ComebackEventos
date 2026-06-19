<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    // Ajustado para letras minúsculas e adicionados os novos campos (descrição e imagem)
    protected $fillable = [
        'nome',
        'local',
        'data',
        'preco_ingresso',
        'descricao',
        'image'
    ];
}