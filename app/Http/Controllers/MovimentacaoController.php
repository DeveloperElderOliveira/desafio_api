<?php
namespace App\Http\Controllers;

use Exception;
use App\Http\Requests\MovimentacaoRequest;
use App\Models\Loja;
use App\Services\MovimentacaoService;

class MovimentacaoController extends Controller
{
    private $service;

    public function __construct(MovimentacaoService $movimentacaoService)
    {
        $this->middleware('auth:api');
        $this->service = $movimentacaoService;
    }

    public function storeFile(MovimentacaoRequest $request)
    {   
        try{
            $contents_file = $request->file('file');
            $this->service->storeFile($contents_file);
            return response()->json(["success" => true]);
        }catch(Exception $e){
            return response()->json(["error" => $e->getMessage()], 401);
        }
        
    }

    public function getMovimentacoes()
    {
        try{
            $movimentacoes = $this->service->getMovimentacoes();
            return response()->json(['movimentacoes' => $movimentacoes]);
        }catch(Exception){

        }
        
    }
}
