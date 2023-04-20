@extends('layouts.app')

@section('title', 'Менің тапсырыстарым')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1> {{__('message.order')}} </h1>

            @if($cosmeticsInCart == null){
            <h1>Себетке салынған тауар жоқ</h1>
            @else
            <div class="col-md-10">
                @foreach($cosmeticsInCart as $cosmetic)
                <div class="col-md d-inline-flex mx-md-2">
                    <div class="card" style="width: 18rem;">
                        <img src="{{$cosmetic->img}}" class="card-img-top w-100"
                             style="height: 200px; margin-bottom: 25px">
                        <div class="card-body">
                            <h6 class=card-title"> {{__('message.name')}}: {{$cosmetic->{'name_'.app()->getLocale()} }}</h6>
                            <p class="card-text"><h6> {{__('message.number')}}: {{$cosmetic->pivot->quantity}} </h6></p>
                            <p class="card-text"><h6> {{__('message.price')}}: {{$cosmetic->price}} тг </h6></p>
                            <p class="card-text">{{$cosmetic->created_at}} </p>
                            <form action="{{route('cart.putToCart', $cosmetic->id)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-warning">
                                    {{__('message.repeat')}}
                                    <br>
                                </button>
                            </form>
                        </div>
    </div>
    </div>
                @endforeach
    </div>
        </div>
    </div>
    @endif


@endsection
