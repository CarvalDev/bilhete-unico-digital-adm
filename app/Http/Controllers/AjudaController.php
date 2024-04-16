<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\AdmRepositoryInterface;
use App\Repositories\Contracts\AjudaRepositoryInterface;
use App\Services\AdmServices;
use Illuminate\Support\Facades\Auth;
class AjudaController extends Controller
{
    protected $model;
    protected $services;
    
    public function __construct(AjudaRepositoryInterface $ajuda, AdmServices $services)
    {
        $this->model = $ajuda;
        $this->services = $services;
    }

    public function index(){
        $ajudas = $this->model->allWithCategoria();
        $votos = $this->model->countVotosAjuda();
       
        $user = Auth::guard('adm')->user();
        return view('ajuda.index', compact('ajudas', 'votos', 'user'));
    }

    public function show() {
        $user = Auth::guard('adm')->user();
        return view('ajuda.show', compact('user'));
    }
}
