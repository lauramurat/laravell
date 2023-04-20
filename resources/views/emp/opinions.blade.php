@extends('layouts.emp')

@section('title', 'Пікір беті')
@section('content')

    <h1>{{__('message.opinions')}}</h1>

    <form action="{{route('emp.opinions.search')}}" method="GET">
        <div class="input-group mb-3">
{{--            <div class="input-group-prepend">--}}
{{--                <span class="input-group-text" id="basic-addon1">@</span>--}}
{{--            </div>--}}
            <input type="text" name="search" class="form-control" placeholder="{{__('message.search')}}" aria-label="Username" aria-describedby="basic-addon1">
            <button type="submit" class="btn btn-success" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">{{__('message.author')}} </th>
            <th>{{__('message.opinion')}}</th>
            <th scope="col">{{__('message.role')}}</th>
            <th>{{__('message.cos')}}</th>
{{--            <th>Count</th>--}}
            <th>{{__('button.delete')}}</th>
        </tr>
        </thead>
        <tbody>
        @for($i=0; $i<count($opinions); $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$opinions[$i]->user->name}}</td>
                <td>{{$opinions[$i]->opinion}}</td>
                <td>{{$opinions[$i]->user->role->{'role_'.app()->getLocale()} }}</td>
                <td>{{$opinions[$i]->cosmetic->{'name_'.app()->getLocale()} }}</td>
{{--                <td>{{$opinions[$i]->count(opinion)}}</td>--}}
                <td>
                    <form action="{{route('emp.opinions.destroy', $opinions[$i]->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn  btn-outline-danger" >
                            {{__('button.delete')}}
                        </button>
                    </form>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>

@endsection
