<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePassageiroFormRequest;
use App\Models\Bilhete;
use App\Models\Passageiro;
use App\Models\Passagem;
use Illuminate\Http\Request;

class PassageiroController extends Controller
{
    public function passageiroIndex(Passageiro $passageiro) {
        $passageiros = $passageiro->all();
        
        return view('passageiros.index', compact('passageiros'));
    }

    public function form(){
        return view('passageiros.form');
    }

    public function addBilhete($id) {
        $idUsuario['id'] = $id;
        return view('passageiros.addBilhete', compact('idUsuario'));
        
    }
    public function bilheteStore($id, Passageiro $passageiro, Request $request) {
        $passageiro = $passageiro->find($id);
        $gratuidadeBilhete = null;
        $meiaPassagemBilhete = null;
        switch($request->tipoBilhete){
                case "Estudante":
                $gratuidadeBilhete = true;
                $meiaPassagemBilhete = true;
            break;
                case "Idoso":
                $gratuidadeBilhete = true;
                $meiaPassagemBilhete = true;
            break;
                case "Professor":
                $gratuidadeBilhete = false;
                $meiaPassagemBilhete = true;
            break;
                case "Comum":
                $gratuidadeBilhete = false;
                $meiaPassagemBilhete = false;
            break;
                case "Pcd":
                $gratuidadeBilhete = true;
                $meiaPassagemBilhete = true;
            break;
                case "Obesa":
                $gratuidadeBilhete = false;
                $meiaPassagemBilhete = true;
            break;
                case "Gestante":
                $gratuidadeBilhete = true;
                $meiaPassagemBilhete = true;
            break; 
                case "Corporativo":
                $gratuidadeBilhete = false;
                $meiaPassagemBilhete = false;
        }

        $passageiro->bilhetes()->create([
            'qrCodeBilhete'=>'pendente',
            'numBilhete' => fake()->numerify('### ### ###'),
            'tipoBilhete' => $request->tipoBilhete,
            'gratuidadeBilhete' => $gratuidadeBilhete,
            'meiaPassagensBilhete' => $meiaPassagemBilhete,
            'statusBilhete' => 'Ativo',
        ]);
        return redirect()->route('perfilPassageiro.index', $id);
    }

    public function store(StoreUpdatePassageiroFormRequest $request){
        $data = $request->all();
        $data['senhaPassageiro'] = bcrypt($data['senhaPassageiro']);
        if($request->fotoPassageiro){
            $data['fotoPassageiro'] = $request->fotoPassageiro->store('passageiros');
        }
        $passageiro = Passageiro::create($data);
        
        return redirect()->route('passageiros.index');
    }
    public function perfilPassageiro($id, Bilhete $bilhete, Passagem $passagens) {
        $passageiro = Passageiro::find($id);
        
        $bilhetes = $bilhete
                    ->where('passageiro_id', "$passageiro->id")
                    ->get();

        $passagens = $bilhete
                    ->select('bilhetes.id')
                    ->selectRaw('COUNT(passagems.id) as passagens')
                    ->join('passagems', 'bilhetes.id', 'passagems.bilhete_id')
                    ->groupBy('bilhetes.id')
                    ->where('passageiro_id', "$passageiro->id")
                    ->get();
        $acoes = $passageiro->acaos()->get();

        $dataNasc = explode("-",$passageiro->dataNascPassageiro);
        $linhaNasc = $dataNasc[2]."/".$dataNasc[1]."/".$dataNasc[0];

        for($i=0;$i<count($acoes);$i++) {
            $data[$i] = $acoes[$i]->dataAcao;
            $separa = explode(" ", $data[$i]);
            $linha = explode("-", $separa[0]);
            $acoes[$i]->dataAcao = $linha[2]."/".$linha[1]."/".$linha[0];
        }

        return view('passageiros.perfil', compact('passageiro', 'bilhetes', 'acoes', 'passagens', 'linhaNasc'));
    }
}


