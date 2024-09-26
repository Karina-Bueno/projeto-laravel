<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Episode extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['number'];
    protected $casts = [
        'watched' => 'boolean'
    ]; //podemos informar aqui ao invés de fazer a função abaixo

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    // protected function watched(): Attribute //será chamado sempre que tentar acessar o atributo watched
    // {
    //     return new Attribute( //e sempre que eu acessar pra ler, essa função será chamada, passando o watched como parametro
    //         fn ($watched) => (bool) $watched,
    //     );
    // }
}
