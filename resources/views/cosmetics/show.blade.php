@extends('layouts.app')
@section('title', 'Көрсету беті')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="col-sm-6">
                    <a class="btn" style="background: lightblue" href="{{ route('cosmetics.index') }}">{{__('button.index')}}</a></div><br>
                        <img src="{{asset($cosmetic->img)}}" width="500px">
                        <div class="card-body">
                            <h3 class="card-title">{{ $cosmetic->{'name_'.app()->getLocale()} }}</h3>
                            <p class="card-text">{{$cosmetic->{'composition_'.app()->getLocale()} }}</p>
                            <p class="card-text"><h6>{{__('message.price')}}: {{$cosmetic->price}} tg </h6></p>
                            <p class="card-text">
                                @can('edit', $cosmetic)
                                    <a href="{{route('cosmetics.edit', $cosmetic->id)}}" class="btn"
                                       style="background: darkseagreen">{{__('button.edit')}}</a>
                                @endcan
                                @can('delete', $cosmetic)
                                    <button type="submit" class="btn  form-group" data-bs-toggle="modal" data-bs-target="#exampleStatic" style="background: lightcoral">
                                        {{__('button.delete')}}
                                    </button>
                            <div class="modal fade" id="exampleStatic" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleStaticLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{__('message.cosdel')}}
                                        </div>
                                        <div class="modal-footer" >
                                            <form action="{{route('cosmetics.destroy', $cosmetic->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn" style="background: darkseagreen">{{__('button.yes')}}</button>
                                            </form>
                                            <a href="{{route('cosmetics.show', $cosmetic->id)}}" class="btn"
                                               style="background: lightsalmon">{{__('button.no')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endcan
                            @if($avgRating!=0)
                                <h6>{{__('message.rated')}}: {{$avgRating}}</h6></p>
                            @endif
                            @auth
                            <button type="submit" class="btn  form-group mt-2" style="background: lightsalmon" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                {{__('button.rated')}}
                            </button>
                            @endauth
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h4>{{$cosmetic->{'name_'.app()->getLocale()} }} {{__('message.priced')}}</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('cosmetics.rate', $cosmetic->id)}}" method="post">
                                                @csrf
                                                <select name="rating">
                                                    @for($i=0; $i<=5; $i++)
                                                        <option {{$myRating== $i ? 'selected': ''}} value="{{$i}}">
                                                            {{$i=0 ? 'Not rated': $i}}
                                                        </option>
                                                    @endfor
                                                </select>
                                                <button type="submit" class="btn" style="background: darkseagreen">{{__('button.rate')}}</button>
                                            </form>
                                            <form action="{{route('cosmetics.unrate', $cosmetic->id)}}" method="post">
                                                @csrf
                                                <button type="submit" class="btn" style="background: lightcoral">{{__('button.unrate')}}</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @auth
                                <form action="{{route('cart.putToCart', $cosmetic->id)}}" method="POST">
                                    @csrf
                                    <br>
                                    {{__('message.number')}}: <input type="number" name="quantity">
                                    <button type="submit" class="btn btn-outline-warning">
                                        {{__('button.add')}}
                                        <br>
                                    </button>
                                </form>
                            @endauth
                        </div>
                    </div>


            <div class="col-md-10">
                <div class="col-sm-6">
                    <form action="{{ route('opinions.store',[$cosmetic->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-12">
                            <label for="commentInput"><h4>{{__('message.opinion')}}: </h4></label>
                            <textarea class="form-control" id="commentInput" name="opinion" cols="8" rows="4"></textarea>
                            <div class="mb-3">
                            <input class="form-control" type="file" name="img" value="{{$cosmetic->id}}">
                                <input type="hidden" name="cosmetic_id" value="{{$cosmetic->id}}" >
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <button class="btn " style="background: lavender" type="submit">{{__('button.save')}}</button>
                        </div>
                        <br>
                    </form>

                    <div class="form-group col-md-6">
                        <label for="contentInput"><h4>{{__('message.opinions')}}:</h4></label>
                    </div>
                    @foreach($cosmetic->opinions as $opinion)
                        {{--                        @if($opinion->cosmetic_id == $cosmetic->id)--}}
                        <div class="card" style="width: 18rem">
                            <div class="card-body">
                                <img src="{{asset($opinion->img)}}" width="250px">
                                <h6>{{$opinion->opinion}}</h6>

                                <small>{{$opinion->created_at}} | автор: {{$opinion->user->name}}</small><br>

                                    @can('edit', $opinion)
                                    <a href="{{route('opinions.edit', $opinion->id)}}" class="btn"
                                       style="background: darkseagreen">{{__('button.edit')}}</a>
                                @endcan
                                @can('delete', $opinion)
                                        <button type="submit" class="btn  form-group " data-bs-toggle="modal" data-bs-target="#exampleModal" style="background: lightcoral">
                                            {{__('button.delete')}}
                                        </button>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{__('message.cosdel')}}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{route('opinions.destroy', $opinion->id)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                        <button type="submit" class="btn" style="background: darkseagreen">{{__('button.yes')}}</button>
                                                        </form>
                                                        <a href="{{route('cosmetics.show', $cosmetic->id)}}" class="btn"
                                                           style="background: lightsalmon">{{__('button.no')}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                @endcan
                            </div>
                            {{--                        @endif--}}
                            @endforeach
                        </div>
                </div>
            </div>
                </div>
            </div>
        </div>
@endsection
