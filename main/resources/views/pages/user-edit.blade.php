@extends('layouts.main-layout')
{{-- FORM TO EDIT USER INFO --}}
@section('content')

  <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header text-center font-weight-bolder">{{ __('Aggiorna informazioni') }}</div>

                  <div class="card-body">
                      <form  action="{{route('user-update', $user -> id)}}"  method="POST" enctype='multipart/form-data'>
                          @csrf
                          @method('post')

                          {{-- ORARIO INIZIO --}}

                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Orario Inizio') }}</label>

                              <div class="col-md-6">
                                <select name="start_delivery" id="">
                                    <option value="" disabled>Seleziona un orario</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                </select>
                              </div>
                          </div>

                          {{-- ORARIO FINE  --}}

                          <div class="form-group row">
                              <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Orario Fine') }}</label>

                              <div class="col-md-6">
                                <select name="end_delivery" id="">
                                    <option value="" disabled>Seleziona un orario</option>
                                    <option value="19:00">19:00</option>
                                    <option value="20:00">20:00</option>
                                    <option value="21:00">21:00</option>
                                    <option value="22:00">22:00</option>
                                    <option value="23:00">23:00</option>
                                    <option value="00:00">00:00</option>
                                </select>
                              </div>
                          </div>

                          {{-- PREZZO DI CONSEGNA --}}

                           <div class="form-group row">
                              <label for="vat_num" class="col-md-4 col-form-label text-md-right" style="content: \20AC;">{{ __('Prezzo di consegna') }}</label>

                              <div class="col-md-6">
                                <input type="number" min="0" max="20" step="0.50"
                                       value="{{$user -> price_delivery / 100}}"
                                       name="price_delivery" placeholder="price"
                                >
                              </div>
                          </div>

                          {{-- IMMAGINE --}}
                          
                          <div class="form-group row">
                              <label for="phone_num" class="col-md-4 col-form-label text-md-right">{{ __('Immagine') }}</label>

                              <div class="col-md-6">
                                <input type="file" name="img">

                                <a href="{{route('clear-user-img')}}">
                                    <button class="btn btn-danger" style="margin-top: 20px;" type="button" name="button">  Elimina immagine</button>
                                </a>
                              </div>

                           </div>

                           <div class="form-group row">
                             @error('typologies')
                               <span style="color:red;margin:12px auto;" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                                  <label for="typologies[]" class="col-md-4 col-form-label text-md-right">Scegli una o più tipologie:</label>
                                  <div class="col-md-6" style="display: flex; flex-wrap: wrap; text-transform: capitalize;">

                                      @foreach ($typos as $typo)
                                      <div class="input-container" style=" width: calc(100% / 4 + 30px);">

                                            <input type="checkbox"  @error('typologies') is-invalid @enderror value="{{$typo -> id }}" name="typologies[]"
                                            @if($user -> typologies -> contains($typo -> id))
                                                checked
                                            @endif
                                        >
                                          {{$typo -> typology}}
                                      </div>
                                      @endforeach
                                   </div>
                            </div>

                          <div class="form-group row">
                            <div class="col-md-12 text-center" >
                              <input class="btn btn-outline-warning" type="submit" value="Salva informazioni">
                            </div>
                          </div>

                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
