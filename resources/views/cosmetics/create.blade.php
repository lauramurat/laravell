@extends('layouts.app')

@section('title', 'Қосу беті')

@section('content')
{{--    <div class="form-group mt-3">--}}
{{--        <label for="imgInput">{{__('messages.image')}}</label>--}}
{{--        <input type="file" name="img" id="imgInput" class="form-control" placeholder="Please select a photo">--}}
{{--        @error('img')--}}
{{--        <div class="alert alert-danger">{{$message}}</div>--}}
{{--        @enderror--}}
{{--    </div>--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <a href="{{ route('cosmetics.index')}}" class="btn" style="background: lightblue">{{__('button.index')}}</a>

{{--                @can('store', App\Models\Cosmetic::class)--}}
                    <form action="{{ route('cosmetics.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-3 col-md-6">
                            <label for="nameKZInput">{{__('message.name')}}</label>
                            <input type="text" class="form-control @error('name_kz') is-invalid @enderror" id="nameKZInput" name="name_kz" placeholder="Тақырыбын енгізіңіз">
                            @error('name_kz')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3 col-md-6">
                            <label for="nameRUInput">{{__('message.name')}}</label>
                            <input type="text" class="form-control @error('name_ru') is-invalid @enderror" id="nameRUInput" name="name_ru" placeholder="Введите название ">
                            @error('name_ru')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3 col-md-6">
                            <label for="nameENInput">{{__('message.name')}}</label>
                            <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="nameENInput" name="name_en" placeholder="Enter title">
                            @error('name_en')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3 col-md-6">
                            <label for="compositionKZInput">{{__('message.description')}}: </label>
                            <textarea class="form-control mt-2 @error('composition_kz') is-invalid @enderror" id="compositionKZInput" rows="3" name="composition_kz" placeholder="Толық ақпарат жазыңыз"></textarea>
                            @error('composition')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3 col-md-6">
                            <label for="compositionRUInput">{{__('message.description')}}: </label>
                            <textarea class="form-control mt-2 @error('composition_ru') is-invalid @enderror" id="compositionRUInput" rows="3" name="composition_ru" placeholder="Введите данные"></textarea>
                            @error('composition_ru')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3 col-md-6">
                            <label for="compositionENInput">{{__('message.description')}}: </label>
                            <textarea class="form-control mt-2 @error('composition_en') is-invalid @enderror" id="compositionENInput" rows="3" name="composition_en" placeholder="Enter the details"></textarea>
                            @error('composition_en')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="form-group mt-3 col-md-6">
                            <label for="priceInput">{{__('message.price')}}:</label>
                            <input type="number" class="form-control mt-2 @error('price') is-invalid @enderror" id="priceInput" name="price" placeholder="{{__('message.pr')}}">
                            @error('price')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3 col-md-6">
                            <label for="imgInput">{{__('message.Img')}} </label>
                            <input type="file" class="form-control mt-2" @error('img') is-invalid @enderror id="imgInput"
                                   name="img">
                            @error('img')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3 col-md-6">
                            <label for="categoryInput">{{__('message.category')}}: </label>
                            <select class="form-control mt-2" @error('category_id') is-invalid @enderror id="categoryInput"
                                    name="category_id">
                                @foreach($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror

                        </div>
                        <div class="form-group mt-3">
                            <button class="btn " style="background: darksalmon" type="submit">{{__('button.save')}}</button>
                        </div>
                    </form>
{{--                @endcan--}}
            </div>
        </div>
    </div>
@endsection

