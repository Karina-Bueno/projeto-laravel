<?php 

namespace App\Http\Controllers\Api;

use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Controllers\Controller;
use App\Repositories\SeriesRepository;
use App\Http\Requests\SeriesFormRequest;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $seriesRepository)
    {

    }
    public function index(Request $request)
    {
        $query = Series::query();
        if ($request->has('nome')) {
            $query->where('nome', $request->nome);
        }
        return $query->paginate(5);
    }

    public function store(SeriesFormRequest $request)
    {
        return response()
        ->json($this->seriesRepository->add($request), 201);
    }

    public function show(int $series)
    {
        // $series = Series::whereId($series) //buscamos todas as series com o id $series 
        // ->with('seasons.episodes')->first(); //e trazemos as temporadas e episodios
        $seriesModel = Series::with('seasons.episodes')->find($series); //buscando a model
        if ($seriesModel === null) {
            return response()->json(['message' => 'Series not found'], 404);
        }
         return $seriesModel; //criando uma nova quere 
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return $series;
    }

    public function destroy(int $series): JsonResponse
    {
        $user = auth()->user();
        
        if (!$user || !$user->tokenCan('series:delete')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        Series::destroy($series);

        return response()->noContent();
        // $user->tokenCan('series:delete');
        // Series::destroy($series);
        // return response()->noContent();
    }
}
