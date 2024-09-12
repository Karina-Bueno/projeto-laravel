<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodesController
{
    public function index (Season $season) 
    {
        return view('episodes.index', ['episodes' => $season->episodes, 'mensagemSucesso' => session('mensagem.sucesso')]); //está buscando um dado da sessão que vai ser a chave que chamamos mensagem.sucesso
    }

    public function update (Request $request, Season $season)
    {
        $watchedEpisodes = $request->episodes; //episodios assistidos
        $season->episodes->each(function (Episode $episode) use ($watchedEpisodes) { //para cada um desses episodios vamos executar a função
            $episode->watched = in_array($episode->id, $watchedEpisodes); //vamos marcar como assistidos, caso o id desse episodio estiver no array de episodios assistidos (watchedEpisodes)
        });
        $season->push(); //pega todos os episodios e salva 

        return to_route('episodes.index', $season->id)->with('mensagem.sucesso', 'Episódios marcados como assistidos');
    }

}

