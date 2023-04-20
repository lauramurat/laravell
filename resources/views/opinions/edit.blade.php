@extends('layouts.app')
@section('title', 'Edit page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <a href="{{ route('cosmetics.index')}}" class="btn" style="background: lightblue">{{__('button.index')}}</a>
                <form action="{{ route('opinions.update', $opinions->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group col-md-6">
                        <label for="commentInput">{{__('message.opinion')}}:</label>
                        <textarea class="form-control" id="commentInput" name="opinion" cols="6" rows="3">{{$opinions->opinion}}</textarea>
                    </div>

                    <div class="form-group mt-3 col-md-6">
                        <label for="imgInput">{{__('message.Img')}} </label>
                        <input type="file" class="form-control mt-2" id="imgInput" name="img" value="{{$opinions->img}}">
                    </div>

                    <div class="form-group mt-3">
                        <button class="btn" style="background: sandybrown" type="submit">{{__('button.edit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
