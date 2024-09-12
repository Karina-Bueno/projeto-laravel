<?php

namespace App\Providers;

use App\Repositories\EloquentSeriesRepository;
use App\Repositories\SeriesRepository;
use Illuminate\Support\ServiceProvider;

//classe responsavel por registrar e configurar serviços na aplicação. Principal meio de configurar e responder dependencias, geralmente usado para injetar dependencias ou configurar o container de serviços

//REGISTRANDO O MAPEAMENTO ENTRE A INTERFACE SERIESREPOSITORY E A IMPLEMENTAÇÃO ELOQUENTSERIESREPOSITORY
class SeriesRepositoryProvider extends ServiceProvider
{
    public array $bindings = [  
        SeriesRepository::class => EloquentSeriesRepository::class
    ]; //sempre que a interface SeriesRepository for requisitada, o laravel deve fornecer uma instância da classe EloquentSeriesRepository
}
