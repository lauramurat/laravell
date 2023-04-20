@extends('layouts.emp')

@section('title', 'Пайдаланушылар беті')
@section('content')

    <h1>{{__('message.user')}}</h1>

    <form action="{{route('emp.users.search')}}" method="GET">
        <div class="input-group mb-3">
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
            <th scope="col">{{__('message.name')}} </th>
            <th scope="col">{{__('message.poc')}}</th>
            <th scope="col">{{__('message.role')}}</th>
            <th>{{__('message.bel')}}</th>
            <th>{{__('button.edit')}}</th>
        </tr>
        </thead>
        <tbody>
        @for($i=0; $i<count($users); $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$users[$i]->name}}</td>
                <td>{{$users[$i]->email}}</td>
                <td>{{$users[$i]->role->{'role_'.app()->getLocale()} }}</td>
                <td>
                    <form action="
                    @if($users[$i]->is_active)
                           {{route('emp.users.ban', $users[$i]->id)}}
                    @else
                          {{route('emp.users.unban', $users[$i]->id)}}
                    @endif
                    " method="post">
                        @csrf
                        @method('PUT')
                        <button class="btn {{$users[$i]->is_active ? 'btn-outline-danger' : 'btn-success'}}" type="submit">
                            @if($users[$i]->is_active)
                                {{__('button.ban')}}
                            @else
                                {{__('button.unban')}}
                            @endif
                        </button>
                    </form>
                </td>
                <td><a href="{{route('emp.users.edit', $users[$i]->id)}}" class="btn btn-outline-success">{{__('button.edit')}}</a></td>
            </tr>
        @endfor
        </tbody>
    </table>

@endsection
