<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Empreendimentos extends Model
{
    use HasFactory;

    protected $table = 'empreendimentos';

    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable = [
        'url_img', 'ordem', 'nome_img', 'page_url', 'localizacao', 'titulo', 'dormitorio', 'id_categoria', 'url_empreendimento'
    ];


    function categoria()
    {
        return $this->hasOne(Categoria::class, 'id', 'id_categoria');
    }
}