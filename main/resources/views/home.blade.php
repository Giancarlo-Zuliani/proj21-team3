@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profilo utente') }}</div>

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
                                <button class="">Si</button>
                            </a>
                            <button>No</button>
                        </div>

                        @endif
                    @endforeach

                    <a href="{{route('item-create')}}">Nuovo item</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


{{-- Ciao principesse --}}