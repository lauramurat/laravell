@extends('layouts.app')
@section('name', 'Өзгерту беті')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <a href="{{ route('cosmetics.create')}}" class="btn " style="background: lightblue">{{__('button.create')}}</a>

                <form action="{{ route('cosmetics.update', $cosmetic->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mt-3 col-md-6">
                        <label for="NameKZInput">{{__('message.name')}}: </label>
                        <input type="text" class="form-control mt-2" name="name_kz" value="{{$cosmetic->name_kz}}">
                    </div>

                    <div class="form-group mt-3 col-md-6">
                        <label for="NameRUInput">{{__('message.name')}}: </label>
                        <input type="text" class="form-control mt-2" name="name_ru" value="{{$cosmetic->name_ru}}">
                    </div>

                    <div class="form-group mt-3 col-md-6">
                        <label for="NameENInput">{{__('message.name')}}: </label>
                        <input type="text" class="form-control mt-2" name="name_en" value="{{$cosmetic->name_en}}">
                    </div>

                    <div class="form-group mt-3 col-md-6">
                        <label for="compositionKZInput">{{__('message.description')}}: </label>
                        <textarea class="form-control mt-2" rows="3"
                                  name="composition_kz">{{$cosmetic->composition_kz}}</textarea>
                    </div>

                    <div class="form-group mt-3 col-md-6">
                        <label for="compositionRUInput">{{__('message.description')}}: </label>
                        <textarea class="form-control mt-2" rows="3"
                                  name="composition_ru">{{$cosmetic->composition_ru}}</textarea>
                    </div>

                    <div class="form-group mt-3 col-md-6">
                        <label for="compositionENInput">{{__('message.description')}}: </label>
                        <textarea class="form-control mt-2" rows="3"
                                  name="composition_en">{{$cosmetic->composition_en}}</textarea>
                    </div>

                    <div class="form-group mt-3 col-md-6">
                        <label for="priceInput">{{__('message.price')}}: </label>
                        <input type="text" class="form-control mt-2" name="price" value="{{$cosmetic->price}}">
                    </div>

                    <div class="form-group mt-3 col-md-6">
                        <label for="categoryInput">{{__('message.category')}}</label>
                        <select class="form-control mt-2" name="category_id">
                            @foreach($categories as $cat)
                                <option @if($cat->id == $cosmetic->category_id) selected @endif
                                value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-3 col-md-6">
                        <label for="imgInput">{{__('message.Img')}} </label>
                        <input type="file" class="form-control mt-2" name="img">
                    </div>

                    <div class="form-group mt-3">
                        <button class="btn" style="background: sandybrown" type="submit">{{__('button.edit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
