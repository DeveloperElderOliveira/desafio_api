<?php
namespace App\Services;

use App\Models\Movimentacao;
use App\Models\Loja;
use App\Models\Dono;
use Illuminate\Support\Facades\Storage;

class MovimentacaoService {

    private $repository;

    public function __construct(Movimentacao $movimentacao)
    {
        $this->repository = $movimentacao;
    }

    public function storeFile($content){      
        $lines_file = $this->storeLocalFile($content);
        $this->save($lines_file);           
    }

    public function storeLocalFile($content){
        Storage::putFileAs('files', $content, $content->getClientOriginalName());
        $lines_file = Storage::get('files/' . $content->getClientOriginalName());
        return explode("\r\n",$lines_file);
    }

    public function getMovimentacoes(){
        return Dono::with(['lojas.movimentacoes'])->get();
    }

    public function save($lines){
        
        foreach($lines as $line){

            if(!$dono = Dono::where("nome",getDonoLoja($line))->first()){
                $dono_novo = $this->saveDono($line);
            }

            if(!$loja = Loja::where("nome_loja",getNomeLoja($line))->first()){
                $loja_nova = $this->saveLoja($line,(!$dono ? $dono_novo->id : $dono->id));
            }

            $this->saveMovimentacoes($line,(!$loja ? $loja_nova->id : $loja->id));
        }
    }

    public function saveDono($line){

        $dono_novo = new Dono();
        $dono_novo->nome = getDonoLoja($line);
        $dono_novo->save();
        return $dono_novo;

    }

    public function saveLoja($line,$dono_id){

        $loja_nova = new Loja();
        $loja_nova->nome_loja = getNomeLoja($line);
        $loja_nova->dono_id = $dono_id; 
        $loja_nova->save();
        return $loja_nova;

    }

    public function saveMovimentacoes($line,$loja_id){

        $this->repository->create(["tipo" => getTipo($line), "data" => getData($line),
                "valor" => getValor($line), "cpf" => getCpf($line), "cartao" => getCartao($line),
                "hora" => getHora($line),"loja_id" => $loja_id]);           
        
    }


}
