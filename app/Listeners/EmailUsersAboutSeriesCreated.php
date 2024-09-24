<?php

namespace App\Listeners;

use App\Models\User;
use App\Mail\SeriesCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailUsersAboutSeriesCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(SeriesCreatedEvent $event)
    {
        $userList = User::all(); //pegando todos os usuarios
        foreach ($userList as $index => $user) {
            $email = new SeriesCreated(
                $event->seriesName,
                $event->seriesId,
                $event->SeriesSeasonsQty,
                $event->seriesEpisodesPerSeason,
            );//criando dentro do loop, evitamos de mandar o email váras vezes para a mesma pessoa
            $when = now()->addSeconds($index * 2); //atrasa o processamento desse email
            Mail::to($user)->later($when, $email); //pegando os usarios logado e colocando em uma fila
            
        }
    }
}
