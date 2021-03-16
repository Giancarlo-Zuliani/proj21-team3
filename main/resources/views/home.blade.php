@extends('layouts.app')
{{-- DASHBOARD (user area) --}}
@push('scriptStatistics')
    <script src="{{asset('js/statistics.js')}}" defer></script>
    <script src="{{asset('js/dashboard.js')}}" defer></script>
@endpush

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-xs-12 col-lg-5 text-center">
        <div class="text-center">
          <h1 class="title background-title font-weight-bolder text-center">
            Il tuo menù
          </h1>
        </div>
     </div>
  </div>
 </div>

 {{-- CARD ITEM --}}
 <div class="container-fluid">
   <div class="row justify-content-center">
         @if (session('status'))
             <div class="alert alert-success" role="alert" >
                 {{ session('status') }}
             </div>
         @endif
         @foreach ($items as $item)
             @if ($item -> deleted === 0)
             <div class="card-box shadow col-xs-12 col-lg-3 " >
               <h3 class="title-card text-center text-capitalize ">
                 {{$item -> name}}
               </h3>
               @if ($item -> available === 0)
                    <p class="text-danger font-weight-bolder text-center text-uppercase">
                      Non Disponibile
                    </p>
                  @endif
                 <p class="text-muted ">
                    {{$item -> description}}
                 </p>
                 <p class="text-muted ">
                   {{$item -> ingredients}}
                 </p>
                  <p class="font-weight-bold text-center">
                    <i class="fa"> &#xf153;</i>
                    {{$item -> price / 100 }}
                      Lattosio
                    @if ($item -> lactose === 1 )
                          SI
                    @endif

                    @if ($item -> lactose === 0 )
                          NO
                    @endif

                     Glutine
                    @if ($item -> gluten === 1)
                      SI
                    @endif
                    @if ($item -> gluten === 0)
                      NO
                    @endif

                  </p>

               <div class="card-icon edit-delete-container text-center" style="margin-bottom: 15px;">
                 <a style="margin-right:7px;" href="{{route('item-edit', $item -> id)}}">
                  <i class="far fa-edit text-muted">
                     <span class="text-modifica-elimina">
                       Modifica
                     </span>
                    </i>
                 </a>
                
                  <i class="far fa-trash-alt text-muted">
                    <span class="text-modifica-elimina">
                      Elimina
                    </span>
                  </i>

                  {{-- DELETE BANNER --}}                     
                  <div class="delete-banner shadow">
                      <span>Sicuro di voler eliminare questo piatto?</span>
                      <br>
                      <a class="button-alert" href="{{route('item-delete', $item -> id)}}">                            
                          <button class="btn btn-danger">Elimina</button>
                      </a>
                      <button class="annulla btn btn-outline-warning">Annulla</button>
                  </div>

               </div>
             </div>
            @endif
         @endforeach
       </div>
   </div>

  {{-- ADD NEW DISH --}}
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-md-6">
        <a href="{{route('item-create')}}" class="mx-auto">
          <button class="btn btn-primary new-dish btn-results btn-lg font-weight-bolder" style="margin: auto;">
            <i class="fas fa-plus"></i>	&#160;Aggiungi nuovo piatto
          </button>
        </a>
      </div>
    </div>
  </div>

  <hr class="hr-index dashboard-hr">

   {{-- STATISTIC --}}
   <div class="container">
     <div class="row justify-content-center">
       <div class="col-xs-12 col-lg-3 text-center">
           <div class="text-center">
             <h1 class="title background-title font-weight-bolder">
               Statistiche
             </h1>
           </div>
        </div>
     </div>
    </div>

    @php
     $user = Auth::user() -> id;
    @endphp
    <input id="vendorId" type="text" name="" value="{{$user}}" hidden>

    @endsection
    @section('charts')

    {{-- GRAFICO MESI --}}
    <div id="angelo" class="container-fluid">
      <div class="row justify-content-center">

        <div class="card-graphic shadow col-xs-12 col-md-6 col-lg-5">
          <div class="card-body">
            <h4 class="text-center font-weight-bold">Analisi vendite</h4>
            <select id="yearSelector" @change="getStatistics()">
              <option value="2021-">
                2021
              </option>
              <option value="2020-">
                2020
              </option>
            </select>
            <canvas id="myChart"  width="200" height="200"></canvas>
          </div>
        </div>

        {{-- GRAFICO A TORTA --}}
        <div class="card-graphic shadow col-xs-12 col-md-6 col-lg-5">
          <div class="card-body">
            <h5 class="title-incassi font-weight-bold text-center">
              Totale incasso: @{{totalSales}}€
            </h5>
            <canvas id="myPie" width="200" height="200"></canvas>
          </div>
        </div>

      </div>
    </div>
    @endsection
