@extends('layouts.mainLayout')


@push('css')
    <link rel="stylesheet" href="{{ URL::asset('css/linhasShow.css') }}">
@endpush

@section('title')
Linha {{$linha->nomeLinha}} 
@endsection

@section('content')
<div class="w-100 h-100 d-flex flex-row justify-content-center align-items-center">
    <div id="" class=" w-50 h-100 d-flex flex-column justify-content-center align-items-center">
        <div class=" w-100" style="height:10%">
            
        </div>
        <div id="areaInfos" class="p-5 w-100  d-flex flex-column-reverse justify-content-center align-items-center" style="height:90%">
           
            <table class="table justify-content-center mt-3 w-75 d-flex flex-column">
                <tbody class="d-flex flex-column gap-3 w-100">
                  <tr class="w-100 d-flex flex-row justify-content-between" style="border-bottom:1.5px solid rgb(161, 161, 161)"><th class="w-50">Consumos</th> <td class="w-50 d-flex justify-content-end">{{$linha->totalConsumos}}</td></tr>
                  <tr class="w-100 d-flex flex-row justify-content-between" style="border-bottom:1.5px solid rgb(161, 161, 161)"><th class="w-50">Carros</th> <td class="w-50 d-flex justify-content-end">{{$carros->count()}}</td></tr>          
                </tbody>
              </table>
            
            
            {{-- <table class="table w-75 text-strong p-2  shadow">
                <tr class="text-center gap-2" style="border-bottom: 1px solid #edf2f4">
                    <th>Id</th>
                    <th>Total Consumos</th>
                    <th>Total Carros</th>
                </tr>
                <tr class="text-center" style="">
                    <td>{{$linha->id}}</td>
                    <td>{{$linha->totalConsumos}}</td>
                    <td>{{$carros->count()}}</td>
                </tr>
            </table> --}}
            <form id="formUpdate" action="{{ route('linhas.update', $linha->id) }}" method="post" style="height: 80%" class="w-75 row mb-4 shadow d-flex flex-column justify-content-center align-items-center">
                @csrf
                @method('PUT')
                <div style="height: 15%" class=" w-100 p-2 d-flex flex-row justify-content-center align-items-center">
                    <span class="fs-4">Informações da Linha</span>
                </div>
                <div style="height:65%" class="corpoForm w-100 row m-0 d-flex flex-row justify-content-center align-items-center">
                    
                        <div class="input-g w-100">
                            <label class="user-label2">Nome da Linha</label>
                            <input required="" type="text" name="nomeLinha" value="{{$linha->nomeLinha}}" autocomplete="off" class="input w-100"> 
                        </div>
                        <div class="input-g w-100">
                            <label class="user-label2">Numero Linha</label>
                            <input required="" type="text" name="numLinha" value="{{$linha->numLinha}}" autocomplete="off" class="input w-100"> 
                        </div>
                  
                </div>
                <div style="height:20%" class="corpoForm w-100 d-flex flex-row justify-content-center align-items-center">
                    <button type="submit" class="accept mb-3">Atualizar</button>
                </div>

            </form>
        </div>
       

    </div>
    <div class="w-50 h-100 d-flex flex-column justify-content-center align-items-center">
        <div class=" w-100 d-flex justify-content-start align-items-center" style="height:10%">
          <div class=" w-50 d-flex justify-content-start align-items-center">

            <span id="pageTitle" class="ms-3 fs-3 text-capitalize">Carros da linha:</span>
          </div>
          <div class=" w-50 d-flex justify-content-end align-items-center">
            <a href="" class="border-0 me-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus-circle fa-2x text-dark" aria-hidden="true"></i></a>
          </div>

             
          
        </div>
        <div class=" w-100 overflow-auto"  style="height:90%">
            <table class="w-100 mt-3">
                <tr class="" style="border-bottom:1.5px solid rgb(161, 161, 161)">
                    <th class="p-2 text-center" style="width: 20%;">ID</th>
                    <th class="px-2 text-center" style="width: 20%">Num do Carro</th>
                    <th class="px-2 text-center" style="width: 20%">ID catraca</th>
                    <th class="px-2 text-center" style="width: 20%">Qtd Consumos</th>
                    <th class="px-2   text-center" style="width: 10%"><label>Excluir</label></th>
                    
                </tr>
                @foreach ($carros as $carro)
                
                <tr style="border-bottom:1.5px solid rgb(161, 161, 161)">
                    <td class="px-2 text-center fw-semibold">{{$carro->id}}</td>
                    <td class="px-2 text-center fw-semibold">{{$carro->numCarro}}</td>
                    <td class="px-2 text-center fw-semibold">{{$carro->catraca_id}}</td>
                    <td id="consumo" class="px-2 text-center fw-bold">
                     {{$carro->qtdConsumos}}
                    </td>
                    @if ($carro->statusCarro == "Ativo")
                    @section('tituloModal')
                        Desativar carro?
                    @endsection
                    
                    @section('obs')
                        Ao desativar carro todas as catracas relacionadas serão desativadas
                    @endsection
                    <td onclick="pegaStatus('Inativo', {{$carro->id}})" data-bs-toggle="modal" data-bs-target="#visibilidade" class=" px-2 text-center fw-bold" id="alterar"><a id=""  class="btn" ><i class="fa-solid fa-trash"></i></a></td>
                    @else
                    @section('tituloModal')
                        Reativar carro?
                    @endsection
                    @section('obs')
                        Ao reativar carro todas as catracas relacionadas serão reativadas
                    @endsection
                    <td onclick="pegaStatus('Ativo', {{$carro->id}})" data-bs-toggle="modal" data-bs-target="#visibilidade" class=" px-2 text-center fw-bold" id="alterar"><a id="" class="btn" ><i class="fa-solid fa-check"></i></a></td>
                    @endif
                    
                  
                    
                </tr>
                @endforeach
                @include('components.modalCarro')
                @include('components.modalDesativarLinha')
                @include('components.modalAtivarLinha')
                @include('components.modalCarroVisibilidade')
                
                
        
            </table>
        </div>
      

    </div>
</div>
<script src="{{ URL::asset('js/showLinhas.js') }}"></script>
@endsection
@section('pageTitle')
Linha {{$linha->nomeLinha." ".$linha->numLinha}} 

@endsection

