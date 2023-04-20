@extends('layouts.app')

@section('title', 'Менің тапсырыстарым')
@section('content')

    <h1>Себет беті</h1>
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
                </tr>
                </thead>
                <tbody>
                @for($i=1; $i<count($cosmeticsInOrdered); $i++)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$cosmeticsInOrdered[$i-1]->cosmetic->{'name_'.app()->getLocale()} }}</td>
                        <td>{{$cosmeticsInOrdered[$i-1]->user->name}}</td>
                        <td>{{$cosmeticsInOrdered[$i-1]->quantity}}</td>
                        <td>{{$cosmeticsInOrdered[$i-1]->status}}</td>
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>

@endsection
