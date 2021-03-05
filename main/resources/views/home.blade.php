@extends('layouts.app')
{{-- DASHBOARD (user area) --}}
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
                            <button class="btn btn-danger>No</button>
                        </div>

                        @endif
                    @endforeach

                    <a href="{{route('item-create')}}"><h6>Aggiungi un nuovo piatto</h6></a>
                </div>
                </div>
            </div>
        </div>
    </div>

    {{-- CHART.JS --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>Chart</h4></div>

                <div class="card-body">
                   
                    <canvas id="myChart" width="400" height="400"></canvas>
                    
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- Ciao principesse --}}