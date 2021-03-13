@extends('layouts.app')
{{-- DASHBOARD (user area) --}}
@push('scriptStatistics')
    <script src="{{asset('js/statistics.js')}}" defer></script>
    <script src="{{asset('js/dashboard.js')}}" defer></script>
@endpush

@section('content')
    {{-- DASHBOARD USER--}}
<div class="container">
  <div class="row justify-content-center">
    <div class="col-xs-12  col-lg-3 text-center">
        <div class="background-title">
          <h1 class="title">
            Il Tuo Menù
          </h1>
        </div>
     </div>
  </div>
 </div>
{{-- BUTTON ADD ITEM --}}
 <div class="container">
   <div class="row justify-content-center">
     <div class="container-mod col-sm-12 col-md-5 col-lg-3 text-center">
         <a class="mod-a" href="{{route('item-create')}}" >
           <nav id="nav">
              <ul id="ul" >
                <li class="li">
                  Aggiungi Piatto
                  <span class="onda"></span><span class="onda"></span><span class="onda"></span><span class="onda"></span>
                </li>
              </ul>
            </nav>
         </a>
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
               <h3 class="title-card text-center text-capitalize">
                 {{$item -> name}}
               </h3>
                 <p class="text-muted text-capitalize">
                    {{$item -> description}}
                 </p>
                 <p class="text-muted text-capitalize">
                   {{$item -> ingredients}}
                 </p>
                  <p class="font-weight-bold">
                    <i class="fa"> &#xf153;</i>
                    {{$item -> price / 100 }}

                      Lattosio
                    @if ($item -> lactose === 1 )
                          SI
                    @endif

                     Glutine
                    @if ($item -> gluten === 1)
                      SI
                    @endif

                  </p>
                  @if ($item -> available === 0)
                    <p class="text-danger">
                      Non Disponibile
                    </p>
                  @endif
               <div class="card-icon text-center" style="margin-bottom: 15px;">
                 <a style="margin-right:7px;" href="{{route('item-edit', $item -> id)}}"><i class="far fa-edit text-muted">
                   <span class="text-modifica-elimina">
                     Modifica
                   </span>
                 </i>

                 </a>
                 <a  href="{{route('item-delete', $item -> id)}}" ><i class="far fa-trash-alt text-muted" >

                   <span class="text-modifica-elimina">
                     Elimina
                   </span>
                   
                 </i>

                 </a>
                 {{-- DELETE BANNER--}}

               </div>
             </div>
            @endif
         @endforeach
       </div>
   </div>

   {{-- STATISTIC --}}
   <div class="container">
     <div class="row justify-content-center">
       <div class="col-xs-12 col-lg-3 text-center">
           <div class="background-title">
             <h1 class="title">
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

    {{-- GRAPHIC --}}
    <div id="angelo" class="container-fluid">
      <div class="row justify-content-center">
        <div class="card-graphic  shadow col-xs-12 col-md-6 col-lg-5">
          <div class="card-header">
            <h4 class="title-graphic">Grafico Ordini</h4>
            <select name="" id="yearSelector" @change="getStatistics()">
              <option value="2021-">
                2021
              </option>
              <option value="2020-">
                2020
              </option>
            </select>
          </div>
          <div class="card-body">
            <canvas id="myChart"  width="200" height="200"></canvas>
            {{-- <h5 class="text-center">Totale incasso ordini : @{{totalSales}} €</h5> --}}
          </div>
        </div>
        <div class="card-graphic shadow col-xs-12 col-md-6 col-lg-5">
          <div class="card-body ">
            {{-- <canvas id="myChart"  width="200" height="200"></canvas> --}}
            <h5 class=" title-incassi text-center">
              Totale Incasso Ordini: @{{totalSales}} €
            </h5>
            <canvas id="myPie" width="200" height="200"></canvas>
          </div>
        </div>
      </div>
    </div>
    @endsection
