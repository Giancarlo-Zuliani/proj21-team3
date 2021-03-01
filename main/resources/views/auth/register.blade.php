@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- ADDRESS --}}

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- VAT --}}

                         <div class="form-group row">
                            <label for="vat_num" class="col-md-4 col-form-label text-md-right">{{ __('Vat') }}</label>

                            <div class="col-md-6">
                                <input id="vat_num" type="text" class="form-control @error('vat_num') is-invalid @enderror" name="vat_num" value="{{ old('vat_num') }}" required autocomplete="vat_num" autofocus>

                                @error('vat_num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- PHONE --}}

                        {{-- <div class="form-group row">
                            <label for="phone_num" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone_num" type="text" class="form-control @error('phone_num') is-invalid @enderror" phone_num="phone_num" value="{{ old('phone_num') }}" required autocomplete="phone_num" autofocus>

                                @error('phone_num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  --}}


                        {{-- IMG --}}

                        {{-- <div class="form-group row">
                            <label for="img" class="col-md-4 col-form-label text-md-right">{{ __('imgUpload') }}</label>

                            <div class="col-md-6">
                                <input id="img" type="text" class="form-control @error('img') is-invalid @enderror" img="img" value="{{ old('img') }}" required autocomplete="img" autofocus>

                                @error('img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}



                        {{-- start_delivery --}}

                        {{-- <div class="form-group row">
                            <label for="start_delivery" class="col-md-4 col-form-label text-md-right">{{ __('Start_delivery') }}</label>

                            <div class="col-md-6">
                                <input id="start_delivery" type="text" class="form-control @error('start_delivery') is-invalid @enderror" start_delivery="start_delivery" value="{{ old('start_delivery') }}" required autocomplete="start_delivery" autofocus>

                                @error('start_delivery')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        {{-- end_delivery --}}

                        {{-- <div class="form-group row">
                            <label for="end_delivery" class="col-md-4 col-form-label text-md-right">{{ __('End_delivery') }}</label>

                            <div class="col-md-6">
                                <input id="end_delivery" type="text" class="form-control @error('end_delivery') is-invalid @enderror" end_delivery="end_delivery" value="{{ old('end_delivery') }}" required autocomplete="end_delivery" autofocus>

                                @error('end_delivery')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        {{-- price_delivery --}}

                        {{-- <div class="form-group row">
                            <label for="price_delivery" class="col-md-4 col-form-label text-md-right">{{ __('Price Delivery') }}</label>

                            <div class="col-md-6">
                                <input id="price_delivery" type="text" class="form-control @error('price_delivery') is-invalid @enderror" price_delivery="price_delivery" value="{{ old('price_delivery') }}" required autocomplete="price_delivery" autofocus>

                                @error('price_delivery')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
