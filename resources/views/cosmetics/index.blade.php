@extends('layouts.app')
@section('title', 'Нұсқаулық беті')

@section('content')

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://www.beautyindependent.com/wp-content/uploads/2019/01/Elate-8.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://theretropenguin.com/wp-content/uploads/2018/12/BKellerO115-24.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://st3.depositphotos.com/4278641/14215/i/1600/depositphotos_142155078-stock-photo-different-makeup-cosmetics.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @can('create', App\Models\Cosmetic::class)
                    <a class="btn  mb-4" style="background: lightblue" href="{{ route('cosmetics.create') }}">{{__('button.create')}}</a><br>
                @endcan
                @foreach($cosmetics as $cosmetic)
                    <div class="col-md d-inline-flex mx-md-2 mt-2">
                        <div class="card" style="width: 18rem;">
                            <img src="{{$cosmetic->img}}" class="card-img-top w-100"
                                 style="height: 200px; margin-bottom: 25px">
                            <div class="card-body">
{{--                                {{ $cat->{'name_'.app()->getLocale()} }}--}}

                                <h5 class=card-title">{{$cosmetic->{'name_'.app()->getLocale()} }}</h5>
                                <p class="price-final-price">{{__('message.price')}}: {{$cosmetic->price}} тг</p>
                                <a href="{{route('cosmetics.show', $cosmetic->id)}}" class="btn"
                                   style="background: palevioletred">{{__('button.show')}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection










