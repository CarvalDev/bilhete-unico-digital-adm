@extends('layouts.mainLayout')

@push('css')
<link rel="stylesheet" href="{{ URL::asset('css/perfilPassageiro.css') }}" type="text/css">

@endpush

@section('pageTitle', 'Perfil do Passageiro')

@section('title','Perfil do Passageiro')

@section('content')
<div class="w-100 h-100 d-flex flex-row pe-5 pt-5">
  <div class="col-3">
    <div class="row h-50">
      <div class="fotoPassageiro p-5">
        <img @if ($passageiro->fotoPassageiro == '')
        src="{{ url("images/userPadrao.png")}} "
        @else
        src="{{ url("storage/$passageiro->fotoPassageiro")}} "
        @endif  class="w-100 h-100 border border-5 border-danger"  style="border-radius: 100%; object-fit: cover;">
    </div>
    </div>
    <div class="row h-50 ">
      <span style="color:rgb(52, 49, 49);" class="text-center fs-2 fw-bold p-0 m-0 text-uppercase">
      {{ $passageiro->nomePassageiro }}
    </span>
    </div>
  </div>
  <div class="col-9">
    <nav>
      <div class="nav nav-tabs row" id="nav-tab" role="tablist">
        <button class="col nav-link text-dark active" id="nav-dados-tab" data-bs-toggle="tab" data-bs-target="#nav-dados" type="button" role="tab" aria-controls="nav-dados" aria-selected="true">Dados</button>
        <button class="col nav-link text-dark" id="nav-bilhete-tab" data-bs-toggle="tab" data-bs-target="#nav-bilhete" type="button" role="tab" aria-controls="nav-bilhete" aria-selected="false">Bilhetes</button>
        <button class="col nav-link text-dark" id="nav-historico-tab" data-bs-toggle="tab" data-bs-target="#nav-historico" type="button" role="tab" aria-controls="nav-historico" aria-selected="false">Histórico</button>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-dados" role="tabpanel" aria-labelledby="nav-dados-tab">
        <ul class="list-group pt-3">
          <li class="list-group-item d-flex flex-row justify-content-between">
            <span class="title-dados">CPF:</span>
              <span class="desc-dados">{{ $passageiro->cpfPassageiro}}</span>
          </li>
          <li class="list-group-item d-flex flex-row justify-content-between">
            <span class="title-dados">EMAIL:</span>
              <span class="desc-dados">{{ $passageiro->emailPassageiro }}</span>
          </li>
          <li class="list-group-item d-flex flex-row justify-content-between">
            <span class="title-dados">DATA NASC:</span>
              <span class="desc-dados"></span>
          </li>
          <li class="list-group-item d-flex flex-row justify-content-between">
            <span class="title-dados">ESTADO:</span>
              <span class="desc-dados">{{ $passageiro->ufPassageiro}}</span>
            </li>
          <li class="list-group-item d-flex flex-row justify-content-between">
            <span class="title-dados">CIDADE:</span>
              <span class="desc-dados"></span>
            </li>
          <li class="list-group-item d-flex flex-row justify-content-between">
            <span class="title-dados">BAIRRO:</span>
              <span class="desc-dados">{{ $passageiro->bairroPassageiro }}</span>
            </li>
          <li class="list-group-item d-flex flex-row justify-content-between"><span class="title-dados">CEP:</span>
              <span class="desc-dados">{{ $passageiro->cepPassageiro }}</span>
          </li>
          <li class="list-group-item d-flex flex-row justify-content-between">
            <span class="title-dados">LOGRADOURO:</span>
              <span class="desc-dados">{{ $passageiro->logrPassageiro }}</span>
          </li>
          <li class="list-group-item d-flex flex-row justify-content-between">
            <span class="title-dados">NUMERO:</span>
              <span class="desc-dados">{{ $passageiro->numLogrPassageiro }}</span>
            </li>
          <li class="list-group-item d-flex flex-row justify-content-between">
            <span class="title-dados">TEL:</span>
              <span class="desc-dados">{{ $passageiro->numTelPassageiro }}</span>
          </li>
        </ul>
      </div>
      <div class="tab-pane fade" id="nav-bilhete" role="tabpanel" aria-labelledby="nav-bilhete-tab">
        
          @if (count($bilhetes)>0)
          <div class="bilhetes row w-100 d-flex justify-content-center">
          @foreach ($bilhetes as $bilhete)
          
          <div class="rounded-4 mt-5 shadow " style="height: 386px; width:613px ; background-color:
            @if($bilhete->tipoBilhete == 'Comum') #808075 
            @elseif ($bilhete->tipoBilhete == 'Estudante') #4390E1 
            @elseif ($bilhete->tipoBilhete == 'Idoso') #FFDB70 
            @elseif ($bilhete->tipoBilhete == 'Pcd') #DDA0DD  
            @elseif ($bilhete->tipoBilhete == 'Gestante') #FFA500 
            @elseif ($bilhete->tipoBilhete == 'Obesa') #FFA500 
            @else #98FB98   
            @endif ">
            <header class="row w-100 d-flex flex-row justify-content-between mt-1">
                <div class="col-5 dNe h-100 d-flex align-items-center justify-content-center">
                    <img src=" {{ url('images/DNElogo.png')}} " style="width: 85%;height:80%">
                </div>
                <div class="col logos h-100 mt-3 d-flex justify-content-center align-items-center gap-3" >
                    <img src=" {{ url('images/UNElogo.png')}} " style="width: 12%;height:66%">
                    <img src=" {{ url('images/UBESlogo.png')}} " style="width: 12%;height:66%">
                    <img src=" {{ url('images/ANPGlogo.png')}} " style="width: 21%;height:44%">
                    <img src=" {{ url('images/UEElogo.png')}} " style="width: 12%;height:66%">
                    <img src=" {{ url('images/UMESlogo.jpg')}} " style="width: 12%;height:66%">
                </div>
            </header>

            <section class="corpoBilhete w-100 h-50 mt-4 ms-4 d-flex flex-row">
                    <div class="fotoDonoBilhete h-100 border border-2 border-light" style="object-fit: cover;">
                        <img  @if($bilhete->qrCodeBilhete != 'pendente') src="  {{ $bilhete->qrCodeBilhete}} " @else src="{{ url('images/userPadrao.png') }}" @endif class="h-100 w-100">
                    </div>
                    <div class="infosBilhete justify-content-start text-start gap-1 h-100 d-flex flex-column ps-4 pt-3">
                      <div class="infos">
                        <span class="infos-title">{{ $passageiro->nomePassageiro }}</span>
                      </div>
                        <div class="infos">
                          <span class="infos-title">Tipo Bilhete: </span>
                            <label class="ps-1"> {{ $bilhete->tipoBilhete }}</label>
                        </div>
                        <div class="infos">
                          <span class="infos-title">Status:</span>
                            <label class="ps-1">{{ $bilhete->statusBilhete }}</label>
                          </div>
                        <div class="infos">
                          <span class="infos-title">Gratuidade:</span>
                            <label class="ps-1">@if($bilhete->gratuidadeBilhete == 1) Sim @else Não @endif</label>
                          </div>
                        <div class="infos">
                          <span class="infos-title">Meia Passagem:</span>
                            <label class="ps-1"> @if ($bilhete->meiaPassagensBilhete == 1) Sim @else Não @endif</label>
                          </div>
                    </div>
            </section>
            
            <footer class="row rodapeBilhete w-100">
                <div class="col-9 codUsoBilhete text-end pe-5 pt-3">                   
                        <label style="font-size:15px">Código de uso/N° do Bilhete Único</label>
                        <p class="fw-bold text-end pe-5" style="font-size:20px">{{ $bilhete->numBilhete }}</p>                    
                </div>
                <div class="col-3 logo2023 d-flex justify-content-center align-items-center" >
                        <img src=" {{ url('images/anoBilhete.png')}}" style="width: 180px;">
                </div>
            </footer>
    
        </div>
        @endforeach
      </div>
        @else <p>Não Possui Bilhetes</p>
        
        @endif
     
      </div>
      <div class="tab-pane fade" id="nav-historico" role="tabpanel" aria-labelledby="nav-historico-tab">
        <div class="historico row w-100 d-flex justify-content-center">
          <div class="pt-2">
            @foreach ($acoes as $acao)
            <div class="row w-100 border-bottom border-2 border-secondary" style="height:80px">
              <div class="col-1 d-flex justify-content-center align-items-center">
                <img @if ($acao->tipoAcao == 'Consumo') src="{{ url("images/qrcode1.png")}}"
                      @else src=" {{ url("images/cart1.png")}}"
                      @endif style="width:60px;"
                  >   
              </div>
              <div class="col-9 d-flex flex-column justify-content-center align-items-start">
                <div class="row ms-3">
                  @if ($acao->tipoAcao == 'Consumo') <span class="tipoConsumo">passagem em qrcode</span>
                  @else <span class="tipoConsumo">compra de passagem</span>
                  @endif       
                </div>
                <div class="row ms-3">
                  @if ($acao->tipoAcao == 'Consumo') <span class="tipoConsumo2">Terminal usado</span>
                  @else <span class="tipoConsumo2">Quantidade</span>
                  @endif
                </div>
              </div>
              <div class="col-2 d-flex justify-content-end align-items-center">
                <span class="text-secondary">
                {{ $acao->dataAcao }}
              </span>
              </div>
          </div>
            @endforeach
        </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    // Adiciona um ouvinte de evento quando a página é carregada
    document.addEventListener('DOMContentLoaded', function () {
      // Encontrar a lista de abas
      var myTab = new bootstrap.Tab(document.getElementById('home-tab'));
  
      // Ativar a primeira aba
      myTab.show();
    });
  </script>
  
    {{-- <div class="infosPassageiro h-100" style="width:70%;"> 
     
        <div class="primeirasInfo d-flex flex-row justify-content-center align-items-end w-100 d-flex flex-row" style="height:45%">
            <div class=" h-100 d-flex flex-column justify-content-around align-items-center" style="width:150%;margin-left:9%;margin-right:9%">
            <div class="fotoPassageiro" style="height:70%;"  >
                <img @if ($passageiro->fotoPassageiro == '')
                src="{{ url("images/userPadrao.png")}} 
                @else
                src="{{ url("storage/$passageiro->fotoPassageiro")}} 
                @endif   " class="w-100 h-100" style="border-radius: 10%" alt="">
            </div>
            </div>
            <div class="maisInfo d-flex flex-column align-self-center px-3 overflow-auto h-75 gap-1 justify-content-center p-2" style="width:180%;border-left:2px solid black;">
              <div class="" style="font-size:13px;margin-top:50%"><strong>Nome</strong><label class="ps-1"> {{ $passageiro->nomePassageiro }} </label></div>
              <div class="" style="font-size:13px"><strong>Cpf</strong><label class="ps-1"> {{ $passageiro->cpfPassageiro}} </label></div>
              <div class="" style="font-size:13px"><strong>Email</strong><label class="ps-1"> {{ $passageiro->emailPassageiro }} </label></div>
              <div class="" style="font-size:13px"><strong>Estado</strong><label class="ps-1 text-uppercase"> {{ $passageiro->ufPassageiro}} </label></div>
              <div class="" style="font-size:13px"><strong>Num. Tel.</strong><label class="ps-1"> {{ $passageiro->numTelPassageiro }} </label></div>
              <div class="" style="font-size:13px"><strong>Data Nasc.</strong><label class="ps-1"> {{ $passageiro->dataNascPassageiro }} </label></div>
              <div class="" style="font-size:13px"><strong>Bairro</strong><label class="ps-1"> {{ $passageiro->bairroPassageiro }} </label></div>
              <div class="" style="font-size:13px"><strong>Logr.</strong><label class=""> {{ $passageiro->logrPassageiro }} </label></div>
              <div class="" style="font-size:13px"><strong>Cep</strong><label class="ps-1"> {{ $passageiro->cepPassageiro }} </label></div>
              <div class="" style="font-size:13px"><strong>Num Logr.</strong><label class="ps-1"> {{ $passageiro->numLogrPassageiro }} </label></div>
              <div class="" style="font-size:13px"><strong>Complemento Logr.</strong><label class="ps-1"> {{ $passageiro->complementoLogrPassageiro }} </label></div>
            </div>
            
            <div class="d-flex justify-content-end align-items-center py-1 align-end container" >    
              <a href="{{ route('passageiros.addBilhete', $passageiro->id) }}" class="border-0"><i class="fas fa-plus-circle fa-2x" aria-hidden="true"></i></a>
          </div>
        </div>
        
        <div class="bilhetes align-items-start justify-content-center d-flex flex-column" style="height: 55%;width:100%;background-color:#edf2f4">
            @if (count($bilhetes)>0)
            <div id="carouselExample" class="carousel slide w-100">
                <div class="carousel-inner w-100 h-100">
                    @foreach ($bilhetes as $bilhete)
                    <input type="hidden" value="{{ $bilhete->qtdPassagem }}" id="numero">
                  <div class="carousel-item active w-100 h-100" onclick="imprime({{$bilhete->qtdPassagem}}, {{$bilhete->id}})">
                    <a href="#" class="btn text-decoration-none w-100 h-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <div class="d-flex w-100 h-100 align-items-center justify-content-center">
                        <div class="rounded-4" style="height: 90%;width:56%;background-color:@if($bilhete->tipoBilhete == 'Comum') #808075 @elseif ($bilhete->tipoBilhete == 'Estudante') #4390E1 @elseif ($bilhete->tipoBilhete == 'Idoso') #FFDB70 @elseif ($bilhete->tipoBilhete == 'Pcd') #DDA0DD  @elseif ($bilhete->tipoBilhete == 'Gestante') #FFA500 @elseif ($bilhete->tipoBilhete == 'Obesa') #FFA500 @elseif ($bilhete->tipoBilhete == 'Obesa') #FFA500 @else #98FB98   @endif ">
                            <header class="w-100  d-flex flex-row justify-content-between" style="height:21%">
                                <div class="dNe h-100 d-flex align-items-center justify-content-center" style="width:35%">
                                    <img src=" {{ url('images/DNElogo.png')}} " style="width: 85%;height:80%">
                                </div>
                                <div class="logos h-100  d-flex justify-content-center align-items-center gap-3" style="width:65%">
                                    <img src=" {{ url('images/UNElogo.png')}} " style="width: 12%;height:66%">
                                    <img src=" {{ url('images/UBESlogo.png')}} " style="width: 12%;height:66%">
                                    <img src=" {{ url('images/ANPGlogo.png')}} " style="width: 21%;height:44%">
                                    <img src=" {{ url('images/UEElogo.png')}} " style="width: 12%;height:66%">
                                    <img src=" {{ url('images/UMESlogo.jpg')}} " style="width: 12%;height:66%">
                                </div>
                            </header>
            
                            <section class="corpoBilhete w-100  d-flex flex-row" style="height:55%">
                                    <div class="fotoDonoBilhete  h-100" style="width:30%;margin-left:3%">
                                        <img  @if($bilhete->qrCodeBilhete != 'pendente') src="  {{ $bilhete->qrCodeBilhete}} " @else src="{{ url('images/userPadrao.png') }}" @endif class="h-100 w-100">
                                    </div>
            
                                    <div class="infosBilhete justify-content-center text-start gap-1 h-100 d-flex flex-column p-2 px-3" style="width:70%">
                                      <div class="" style="font-size:13px"><strong>Tipo Bilhete</strong><label class="ps-1"> {{ $bilhete->tipoBilhete }} </label></div>
                                        <div class="" style="font-size:13px"><strong>Status</strong><label class="ps-1">{{ $bilhete->statusBilhete }}</label></div>
                                        <div class="" style="font-size:13px"><strong>Gratuidade</strong><label class="ps-1">@if($bilhete->gratuidadeBilhete == 1) Sim @else Não @endif </label></div>
                                        <div class="" style="font-size:13px"><strong>Meia Passagem</strong><label class="ps-1"> @if ($bilhete->meiaPassagensBilhete == 1) Sim @else Não @endif</label></div>
                                    </div>
                            </section>
                            
                            <footer class="rodapeBilhete w-100 d-flex flex-row" style="height: 24%">
                                <div class="QRCode  h-100 alig-items-center justify-content-center d-flex" style="width:25%;margin-left:3%">
                                 
                                </div>
                                <div class="codUsoBilhete h-100 p-2 d-flex flex-row gap-5 h-100" style="width:75%">
                                    <div class="" style="width: 70%">
                                        <label style="font-size:11px">Código de uso/N° do Bilhete Único</label>
                                        <p class="fw-bold" style="padding-left:47%;font-size:12px">{{ $bilhete->numBilhete }}</p>
                                    </div>
            
                                    <div class="logo2023 d-flex justify-content-center align-items-center h-100" style="width:30%">
                                        <img src=" {{ url('images/anoBilhete.png')}} " style="width: 110%;height:170%">
                                    </div>
                                </div>
                            </footer>
                    
                        </div>
                    </div>
                  </a>
                  </div>
                  @endforeach
                </div>
                <button class="carousel-control-prev " type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                  <span class="text-dark fs-3" aria-hidden="true"><i class="fa-solid fa-left-long"></i></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                  <span class=" text-dark fs-3" aria-hidden="true"><i class="fa-solid fa-right-long"></i></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div> 
            @else 
            <p class="text-danger text-center">Você ainda não possui bilhetes</p>
            @endif
        </div>
    </div>

    <div class="historicoRecarga h-100 py-5 overflow-y-auto" style="background-color: red;width:30%;border-top-left-radius: 80px 80px;" >
      <div class="todasInfo w-100 h-100 d-flex align-items-center flex-column text-white">
        <div class="titulo d-flex justify-content-center w-100 flex-row">   
            <h5 class="fw-bold text-white p-3 text-center">HISTÓRICO DE AÇÕES</h5>
        </div>
        <table style="width: 90%">
            <tr class="" style="border-bottom:1.5px solid white">
                <th class="text-center" style="width:15%">ID</th>
                <th class="text-center py-3" style="width:40%">Tipo de Ação</th>
                <th class="text-center" style="width:50%">Data da Ação</th>
            </tr>
            @foreach ($acoes as $acao)
            <tr>
                <td class="text-center py-3" style="width:15%">{{ $acao->id }}</td>
                <td class="text-center py-3" style="width:40%">{{ $acao->tipoAcao }}</td>
                <td class="text-center" style="width:50%">{{ $acao->dataAcao }}</td>
                
            </tr>
            @endforeach
           
        </table>
      </div>
    </div>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content" id="primeira">
        <div class="modal-header" style="border-bottom:1px solid gray">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Quantidade Total de Passagens</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center align-items-center justify-content-center d-flex mt-2">
          <p class="fw-bold fs-5" id="numPassagem"></p>
          <input type="hidden" class="btn" id="idBilhete" name="idBilhete">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" id="removeBtn" onclick="remover()">Remover Passagem</button>
          <button type="button" class="btn btn-primary" id="adicionaBtn" onclick="adicionar()">Adicionar Passagem</button>
        </div>
      </div>

      <form class="modal-content" action=" {{ route('passageiro.passagens.store') }} " method="POST" style="display:none" id="adiciona">
        @csrf
        <div class="modal-header" style="border-bottom:1px solid gray">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Passagens</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center align-items-center justify-content-center d-flex flex-row gap-3 mt-2">
          <p class="fw-bold fs-5 ms-5" id="numPassagemA" style="margin-top: 2.8%;"></p>
          <span class="rounded-circle p-1 px-2 border border-dark " style="background-color: bisque;width:7.5%" onclick="plusNumero()"><i class="fa-solid fa-plus"></i></span>
          <input type="hidden" class="btn" name="qtdPassagemAdiciona" id="inputAdiciona">
          <input type="hidden" class="btn" name="qtdPassagemAnterior" id="qtdPassagemAnterior">
          <input type="hidden" class="btn" id="idBilheteAdd" name="idBilhete">
        </div>
        <div class="modal-footer"> 
          <button type="button" class="btn btn-danger" onclick="voltar()">Voltar</button>
          <button type="submit" class="btn btn-primary">Adicionar</button>
        </div>
      </form>

      <form class="modal-content" action=" {{ route('passageiro.passagens.update') }} " method="POST" style="display:none" id="remove">
        @csrf
        @method('PUT')
        <div class="modal-header" style="border-bottom:1px solid gray">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Remover Passagens</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center align-items-center justify-content-center  gap-3 d-flex flex-row mt-2">
          <p class="fw-bold fs-5 ms-5" id="numPassagemR" style="margin-top: 2.8%"></p>
          <span class="rounded-circle p-1 px-2 border border-dark " style="background-color: bisque; width:7.5%" onclick="minusNumero()"><i class="fa-solid fa-minus"></i></span>
          <input type="hidden" class="btn" name="qtdPassagemRemove" id="inputRemove">
          <input type="hidden" class="btn" name="qtdPassagemAnterior" id="qtdPassagemAnterior2">
          <input type="hidden" class="btn" id="idBilheteRemove" name="idBilhete">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" onclick="voltar()">Voltar</button>
          <button type="submit" class="btn btn-primary">Remover</button>
        </div>
      </form>
    </div> --}}
  </div>
<script src=" {{ URL::asset('js/verificaPassagem.js')}} "></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

@endsection
