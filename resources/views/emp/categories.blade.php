@extends('layouts.emp')

@section('title', 'Категория беті')
@section('content')


    <h1>{{__('message.categories')}}</h1>

    <a class="btn btn-success" href="{{route('emp.categories.create')}}">{{__('button.added')}}</a><br>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">{{__('message.name')}}</th>
            <th scope="col">{{__('button.delete')}}</th>
        </tr>
        </thead>
        <tbody>
        @for($i=0; $i<count($categories); $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$categories[$i]->name}}</td>
                <td>
                    <form action="{{route('emp.categories.destroy', $categories[$i]->id)}}" method="post">
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
