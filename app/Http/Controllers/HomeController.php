<?php

namespace App\Http\Controllers;

use App\Http\Requests\VerificarPlacaRequest;
use App\Services\HomeService;
use Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(HomeService $homeService){
        $this->homeService = $homeService;
    }

    
    public function validarPlaca(VerificarPlacaRequest $request){
        try{
            $fecha = $request->get("fecha");
            $placa = $request->get("placa");
            return response()->json($this->homeService->comprobarPicoPlaca($fecha, $placa));
        }catch(\Exception $exception){
            return $exception;
        }
    }
}
