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
        <div class="col-xs-12 col-md-6 col-lg-4 text-center">
            <div class="background-title">
              <h1 class="title">Il tuo menù</h1>
            </div>
         </div>
      </div>
     </div>

     <div class="container">
       <div class="row justify-content-center">
         <div class="col-xs-12 col-md-6 col-lg-4 text-center">
           <a href="{{route('item-create')}}">
             <button type="button" class="btn btn-outline-warning">
               <h4>
                  <i class='add fas fa-plus'>
                    Aggiungi piatto
                  </i>
               </h4>
             </button>
           </a>
         </div>
       </div>
     </div>

     {{-- CARD ITEM --}}
     <div class="container">
       <div class="row justify-content-center">

             @if (session('status'))
                 <div class="alert alert-success" role="alert" >
                     {{ session('status') }}
                 </div>
             @endif

             @foreach ($items as $item)
                 @if ($item -> deleted === 0)

                 <div class="card bg-info col-xs-12 col-lg-3 ">

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
                        {{$item -> price /100 }}
                        {{ $item -> lactose }}
                        {{ $item -> gluten }}
                      </p>

                   <div class="card-icon text-center" style="margin-bottom: 15px;">
                     <a style="margin-right:7px;" href="{{route('item-edit', $item -> id)}}"><i class="far fa-edit text-muted">
                         Modifica
                     </i>
                     </a>
                     <a href="#" ><i class="far fa-trash-alt text-muted" >
                       Elimina
                     </i>
                     </a>

                     {{-- DELETE BANNER--}}
                     <div class="delete-banner" >
                         {{-- <span>Eliminare</span> --}}
                         <a class="button-alert"  href="{{route('item-delete', $item -> id)}}">
                             <button class="btn btn-danger">
                               Sì
                             </button>
                         </a>
                         {{-- <button class="btn btn-danger">
                           No
                         </button> --}}
                      </div>
                   </div>


                 </div>
                @endif
             @endforeach
           </div>
       </div>



       {{-- STATISTICHE --}}

       <div class="container">
         <div class="row justify-content-center">
           <div class="col-xs-12 col-md-6 col-lg-4 text-center">
               <div class="background-title">
                 <h1 class="title">Statistiche</h1>
               </div>
            </div>
         </div>
        </div>

        <div class="button-up">
            <a href="#"><i class="fas fa-arrow-up"></i></a>
        </div>











    @php
     $user = Auth::user() -> id;
    @endphp
    <input id="vendorId" type="text" name="" value="{{$user}}" hidden>

    {{-- CHART.JS --}}
    <div id="angelo">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>Chart</h4>
                        <select name="" id="yearSelector" @change="getStatistics()">
                            <option value="2021-">2021</option>
                            <option value="2020-">2020</option>
                        </select>
                    </div>

                    <div class="card-body">
                        <canvas id="myChart"  width="200" height="200"></canvas>

                        <h5 class="text-center">Totale incasso ordini : @{{totalSales}} €</h5>

                        <canvas id="myPie" width="200" height="200"></canvas>
                    </div>

                    </div>
                </div>
        </div>
    </div>
@endsection


{{-- Ciao principesse --}}
