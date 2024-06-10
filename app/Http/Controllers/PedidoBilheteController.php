<?php

namespace App\Http\Controllers;

use App\Models\Passageiro;
use App\Models\PedidoBilhete;
use App\Repositories\Contracts\PedidoBilheteRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\PassageiroRepositoryInterface;

class PedidoBilheteController extends Controller
{
    protected $model;
    public function __construct(PedidoBilheteRepositoryInterface $pedidoBilheteRepositoryInterface)
    {
        $this -> model = $pedidoBilheteRepositoryInterface;
    }
        
    public function index(Request $request){
        $pedidoBilhetes = $this->model->getAllpedidos();
        $user = Auth::guard('adm')->user();
        return view("pedidoBilhete.index",compact('pedidoBilhetes','user'));
    }
  
    public function search(Request $request){
        $search = $request->input('search');
        $pedidoBilhetes = $this->model->search($search);
        $user = Auth::guard('adm')->user();

        if ($pedidoBilhetes->count() >= 1) {
            $view = view('pedidoBilhete.partials.pedidobilhetes_result', compact('pedidoBilhetes', 'user'))->render();
            return response()->json(['html' => $view]);
        } else {
            $view = view('components.no_results')->with('palavra', $request->search)->render();
           return response()->json(['html' => $view]);
        }
    }

    public function show($id) {
        $user = Auth::guard('adm')->user();
        $passageiro = Passageiro::find($id);
        $trataData = explode("-",$passageiro->dataNascPassageiro);
        $trataData = $trataData[2]."/".$trataData[1]."/".$trataData[0];
        $passageiro->dataNascPassageiro = $trataData;
        return view('pedidoBilhete.show', compact('user', 'passageiro'));
    }
}
