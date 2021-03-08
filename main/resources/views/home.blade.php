@extends('layouts.app')
{{-- DASHBOARD (user area) --}}
@push('scriptStatistics')
    <script src="{{asset('js/statistics.js')}}" defer></script>
    <script src="{{asset('js/dashboard.js')}}" defer></script>
@endpush

@section('content')
    {{-- USER'S MENU CONTAINER --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>Il tuo menù</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @foreach ($items as $item)
                        @if ($item -> deleted === 0)

                        <div class="">
                            {{$item -> name}}
                            <a href="{{route('item-edit', $item -> id)}}"><i class="far fa-edit"></i></a>
                            <a href="#"><i class="far fa-trash-alt"></i></a>
                        </div>

                        {{-- DELETE BANNER --}}
                        <div class="delete-banner">
                            <span>Vuoi cancellare?</span>
                            <a class="button-alert"  href="{{route('item-delete', $item -> id)}}">
                                <button class="btn btn-danger">Sì</button>
                            </a>
                            <button class="btn btn-danger">No</button>
                        </div>

                        @endif
                    @endforeach

                    <a href="{{route('item-create')}}"><h6>Aggiungi un nuovo piatto</h6></a>
                </div>
                </div>
            </div>
        </div>
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
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>

                    <div class="card-body">
                        <canvas id="myPie" width="400" height="400"></canvas>
                    </div>

                    </div>
                </div>
        </div>
    </div>
@endsection


{{-- Ciao principesse --}}
