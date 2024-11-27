<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Banners extends Model
{
    use HasFactory;

    protected $table = 'banners';

    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable = [
        'url_img', 'ordem'
    ];


}