@extends('layouts.emp')

@section('title', 'Категория қосу')

@section('content')
    <form action="{{route('emp.categories.store') }}" method="post">
        @csrf
        <div class="form-group mt-3 col-md-6">
            <label for="NameInput">{{__('button.catname')}}: </label>
            <input type="text" class="form-control mt-2" @error('name') is-invalid @enderror id="NameInput"
                   name="name" placeholder="{{__('button.iname')}}">
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>



        <div class="form-group mt-3">
            <button class="btn btn-outline-success" type="submit">{{__('button.save')}}</button>
        </div>
    </form>

@endsection

