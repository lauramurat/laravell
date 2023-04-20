@extends('layouts.emp')

@section('title', 'Рөл беті')
@section('content')

    <h1>{{__('message.pagerol')}}</h1>
    @can('create', App\Models\Role::class)
    <a class="btn btn-success " href="{{route('emp.roles.create')}}">{{__('button.ctrol')}}</a>
    @endcan
    <table class="table">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">{{__('message.name')}} </th>
            <th scope="col">{{__('button.delete')}}</th>
        </tr>
        </thead>
        <tbody>
        @for($i=0; $i<count($roles); $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$roles[$i]->{'role_'.app()->getLocale()} }}</td>
                <td>
                    <form action="{{route('emp.roles.destroy', $roles[$i]->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">
                            {{__('button.delete')}}
                        </button>
                    </form>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>

@endsection
