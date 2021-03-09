@extends('layouts.main-layout')
{{-- FORM TO EDIT ITEM --}}
@section('content')

  <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">{{ __('Edit item:') }}</div>

                  <div class="card-body">
                      <form method="POST" action="{{route('item-update', $item -> id)}}">
                          @csrf
                          @method('post')

                          {{-- NOME --}}

                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                              <div class="col-md-6">
                                <input type="text" name="name" value="{{$item -> name}}" class=" @error('name') is-invalid @enderror">
                                @error('name')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                          </div>

                          {{-- DESCRIZIONE --}}

                          <div class="form-group row">
                              <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Descrizione') }}</label>

                              <div class="col-md-6">
                                <input type="text" name="description" value="{{$item -> description}}" class=" @error('description') is-invalid @enderror"> @error('description')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                          </div>

                          {{-- INGREDIENTI --}}

                           <div class="form-group row">
                              <label for="vat_num" class="col-md-4 col-form-label text-md-right">{{ __('Ingredienti') }}</label>

                              <div class="col-md-6">
                                <input type="text" name="ingredients" value="{{$item -> ingredients}}" class=" @error('ingredients') is-invalid @enderror">
                                  @error('ingredients')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                              </div>
                          </div>

                          {{-- PREZZO --}}

                          <div class="form-group row">
                              <label for="phone_num" class="col-md-4 col-form-label text-md-right">{{ __('Prezzo') }}</label>

                              <div class="col-md-6">
                                <input type="text" name="price" value="{{$item -> price / 100}}" class=" @error('price') is-invalid @enderror">
                                @error('price')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                          </div>

                          {{-- SEZIONE LATTOSIO, GLUTINE, DISPONIBILITA'  --}}


                          <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">{{ __('Lattosio') }}</label>


                              <input type="radio" id="lactose" name="lactose" value="1"
                              @if ($item -> lactose === 1)
                                  checked
                              @endif
                              >
                              <label for="lactose">Si</label>
                              <input type="radio" id="nolactose" name="lactose" value="0"
                              @if ($item -> lactose === 0)
                                  checked
                              @endif
                              >
                              <label for="nolactose">No</label>

                          </div>

                          <div class="form-group row">

                            <label  class="col-md-4 col-form-label text-md-right">{{ __('Glutine') }}</label>

                            <span>Glutine</span>
                            <input type="radio" id="gluten" name="gluten" value="1"
                            @if ($item -> gluten === 1)
                                checked
                            @endif
                            >
                            <label for="gluten">Si</label>
                            <input type="radio" id="nogluten" name="gluten" value="0"
                            @if ($item -> gluten === 0)
                                checked
                            @endif
                            >
                            <label for="nogluten">No</label>
                            <br><br>

                          </div>

                          <div class="form-group row">

                            {{-- available --}}
                            <span>Disponibile</span>
                            <input type="radio" id="available" name="available" value="1"
                            @if ($item -> available === 1)
                                checked
                            @endif
                            >
                            <label for="available">Si</label>
                            <input type="radio" id="notavailable" name="available" value="0"
                            @if ($item -> available === 0)
                                checked
                            @endif
                            >
                            <label for="notavailable">No</label>

                            {{-- deleted --}}
                            <input type="hidden" name="deleted" value="0">
                            {{-- user id --}}
                            <input type="hidden" name="user_id" value="{{Auth::user() -> id}}">
                            {{-- submit --}}
                            <input type="submit" value="UPDATE"> <br><br>

                          </div>




                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
