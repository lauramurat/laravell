@extends('layouts.emp')
@section('name', 'Рөлді өзгерту')

@section('content')
    <div class="container">
            <div class="col-md-6">
    <form action="{{ route('emp.users.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')

                    <div class="form-group mt-3 col-md-6">
                        <label for="roleInput">{{__('message.role')}} </label>
                        <select class="form-control mt-2" name="role_id">
                            @foreach($roles as $role)
                                <option @if($role->id == $user->role_id) selected @endif value="{{$role->id}}">{{$role->{'role_'.app()->getLocale()} }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <button class="btn btn-outline-warning" type="submit">{{__('button.edit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
