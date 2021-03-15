@extends('layouts.main-layout')
{{-- FORM NUOVO piatto --}}
@section('content')

  <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header text-center font-weight-bolder">{{ __('Aggiungi un nuovo piatto') }}</div>

                  <div class="card-body">
                      <form method="POST" action="{{route('item-store')}}">
                          @csrf
                          @method('post')

                          {{-- NOME --}}

                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                              <div class="col-md-6">
                                <input type="text" name="name" value="" class=" @error('name') is-invalid @enderror">
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
                                <input type="text" name="description" value="" class=" @error('description') is-invalid @enderror">
                                  @error('description')
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
                                <input type="text" name="ingredients" value="" class=" @error('ingredients') is-invalid @enderror">
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
                                <input type="text" name="price" value="" class=" @error('price') is-invalid @enderror">
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                          </div>

                          {{-- SEZIONE LATTOSIO E GLUTINE --}}


                          <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">
                              {{ __('Lattosio') }}
                            </label>

                            <div class="text-center" style="margin:8px 16px">
                              <label  for="lactose">SI</label>
                              <input type="radio" id="lactose" name="lactose" value="1" @error('lactose') is-invalid @enderror>
                              <label  for="nolactose">NO</label>
                              <input type="radio" id="nolactose" name="lactose" value="0" @error('lactose') is-invalid @enderror>
                              @error('lactose')
                              <br>
                               <span style="color:red;" role="alert">
                                    <strong>{{ $message }}</strong>
                               </span>
                              @enderror
                            </div>
                            
                          </div>

                          <div class="form-group row">

                            <label  class="col-md-4 col-form-label text-md-right">
                              {{ __('Glutine') }}
                            </label>
                            <div class="text-center" style="margin:8px 16px">

                              <label for="gluten">SI</label>
                              <input type="radio" id="gluten"   name="gluten" value="1" @error('gluten') is-invalid @enderror>

                              <label  for="nogluten">NO</label>
                              <input type="radio" id="nogluten"  name="gluten" value="0" @error('gluten') is-invalid @enderror>
                              @error('gluten')
                                <br>
                                <span style="color:red;"role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <div class="col-md-12 text-center" >
                              <input type="hidden" name="user_id" value="{{Auth::user() -> id}}">
                              <input type="hidden" name="available" value="1">
                              <input type="hidden" name="deleted" value="0">
                              <input type="submit" class="btn btn-outline-warning" value="Crea piatto">
                            </div>
                          </div>




                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
