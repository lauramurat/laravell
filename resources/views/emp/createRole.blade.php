@extends('layouts.emp')

@section('title', 'Рөл қосу')

@section('content')
                    <form action="{{route('emp.roles.store') }}" method="post">
                        @csrf
                        <div class="form-group mt-3 col-md-6">
                            <label for="NameKZInput">{{__('message.name')}}</label>
                            <input type="text" class="form-control mt-2" @error('role_kz') is-invalid @enderror id="NameKZInput"
                                   name="role_kz" placeholder="{{__('message.rolen')}}">
                            @error('role_kz')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3 col-md-6">
                            <label for="NameRUInput">{{__('message.name')}}</label>
                            <input type="text" class="form-control mt-2" @error('role_ru') is-invalid @enderror id="NameRUInput"
                                   name="role_ru" placeholder="{{__('message.rolen')}}">
                            @error('role_ru')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3 col-md-6">
                            <label for="NameENInput">{{__('message.name')}}</label>
                            <input type="text" class="form-control mt-2" @error('role_en') is-invalid @enderror id="NameENInput"
                                   name="role_en" placeholder="{{__('message.rolen')}}">
                            @error('role_en')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <button class="btn " style="background: darksalmon" type="submit">{{__('button.save')}}</button>
                        </div>
                    </form>

@endsection

