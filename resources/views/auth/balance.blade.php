@extends('layouts.app')

@section('title','Balance page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('message.payment') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('balance.update',$users->id) }}">
                            @csrf
                            @method('PUT')

                            <h3>{{ __('message.balance') }}: {{$users->payment}} тг</h3>
                            <div class="row mb-3">
                                <label for="payment" class="col-md-4 col-form-label text-md-end">{{ __('message.payment') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('payment') is-invalid @enderror" name="payment" value="{{ old('payment') }}" required autocomplete="payment" autofocus>

                                    @error('payment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('button.save') }}
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
