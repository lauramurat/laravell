@extends('layouts.emp')

@section('title', 'Себет беті')
@section('content')

    <h1>{{__('message.cartpage')}}</h1>
    <div class="container">
        <div class="row justify-content-center">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">{{__('message.title')}}</th>
            <th scope="col">{{__('message.name')}}</th>
            <th scope="col">{{__('message.number')}}</th>
            <th scope="col">{{__('button.status')}}</th>
            <th>{{__('message.confir')}}</th>
        </tr>
        </thead>
        <tbody>
        @for($i=1; $i<=count($cosmeticsInCart); $i++)
            <tr>
                <th scope="row">{{$i}}</th>
                <td>{{$cosmeticsInCart[$i-1]->cosmetic->{'name_'.app()->getLocale()} }}</td>
                <td>{{$cosmeticsInCart[$i-1]->user->name}}</td>
                <td>{{$cosmeticsInCart[$i-1]->quantity}}</td>
                <td>{{$cosmeticsInCart[$i-1]->status}}</td>
                <td>
                    <form action="{{route('emp.cart.confirm', $cosmeticsInCart[$i-1]->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-outline-success">
                            {{__('message.confir')}}
                        </button>
                    </form>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
                </div>

@endsection
