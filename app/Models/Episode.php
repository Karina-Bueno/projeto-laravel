<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['number'];

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function numberOfWatchedEpisodes(): int 
    {
        return $this->episodes 
            ->filter(fn ($episode) => $episode->watched)
            ->count(); // dos episódios dessa temporada, vamos filtrar para pegar somente os assistidos e retornar a contagem
    }
}
