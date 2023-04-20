@extends('layouts.app')
@section('title', 'Көрсету беті')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="col-sm-6">
                    <div class="container"><br>
                        <img src="{{asset($cosmetic->img)}}" width="500px">
                        <div class="card-body">
                            <h3 class="card-title">{{ $cosmetic->{'name_'.app()->getLocale()} }}</h3>
                            <p class="card-text">{{$cosmetic->{'composition_'.app()->getLocale()} }}</p>
                            <p class="card-text"><h6>{{__('message.price')}}: {{$cosmetic->price}} tg </h6></p>
                                <form action="{{route('cart.putToCart', $cosmetic->id)}}" method="POST">
                                    @csrf
                                    <br>
                                    {{__('message.number')}}: <input type="number" name="quantity">
                                    <button type="submit" class="btn btn-outline-warning">
                                        {{__('button.add')}}
                                        <br>
                                    </button>
                                </form>
                </div>
            </div>
        </div>
@endsection
