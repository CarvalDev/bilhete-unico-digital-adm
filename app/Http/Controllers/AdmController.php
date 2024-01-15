<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAdmFormRequest;
use App\Models\Adm;
use Illuminate\Http\Request;

class AdmController extends Controller
{
    public function form(){
        return view('adm.form');
    } 
    public function index(Adm $adm){
        $adms = $adm->all();
        return view('adm.index', compact('adms'));
    }

    public function store(StoreUpdateAdmFormRequest $request){
        $data = $request->all();
        $data['senhaAdm'] = bcrypt($data['senhaAdm']);
        
         if($request->fotoAdm){
            $data['fotoAdm'] = $request->fotoAdm->store('adm');
         }
         
         Adm::create($data);
         return view('adm.form');
    }
}
