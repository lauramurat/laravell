@extends('layouts.app')

@section('title', 'Cart page')

@section('content')
    <form action="{{route('cosmetics.index')}}"> </form>
    <div class="container">
        <div class="row justify-content-center">
            <h1>{{__('message.tovar')}}</h1>
            <table class="table">
                <thead>
        <tr>
            <th scope="col">№</th>
            <th>IMG</th>
            <th scope="col">{{__('message.name')}} </th>
            <th scope="col">{{__('message.number')}}</th>
            <th>{{__('button.status')}}</th>
            <th>{{__('message.price')}}</th>
            <th>{{__('button.delete')}}</th>
        </tr>
        </thead>
        @foreach($cosmeticsInCart as $cosmetic)
            <tr>
                <td scope="row">{{$cosmetic->id}}</td>
                <td><img src="{{$cosmetic->img}}" class="card-img-top w-50"
                         style="height: 100px"></td>
                <td>{{$cosmetic->{'name_'.app()->getLocale()} }}</td>
                <td>{{$cosmetic->pivot->quantity}}</td>
                <td>{{$cosmetic->pivot->status}}</td>
                <td>{{$cosmetic->price}}</td>
                <td>
                    <form action="{{route('cart.deletefromcart', $cosmetic->id)}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">
                            {{__('button.delete')}}
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <form action="{{route('cart.buy')}}" method="post">
        @csrf
        <button type="submit" class="btn" style="background: #f5b7b1">
            {{__('button.buy')}}
        </button>
    </form>
    </div>
            </div>
        </div>
    </div>

@endsection
