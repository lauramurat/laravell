@extends('layouts.emp')

@section('title', 'Opinion Count page')
@section('content')

    <h1>Opinion Count Page</h1>
    <a class="btn btn-success" href="{{route('emp.categories.create')}}">Create Category</a>
    @for($i=0; $i<count($opinions); $i++)
    <div class="card" style="width: 18rem;">
        <div class="card-header">
            {{$opinions[$i]->user->name}}
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">{{$opinions[$i]->user->category}}</li>
            <li class="list-group-item">{{$opinions[$i]->opinion}}</li>
        </ul>
    </div>
    @endfor
@endsection
