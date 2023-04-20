@extends('layouts.emp')

@section('title', 'Cosmetics page')
@section('content')

    <h1>{{__('message.cosind')}}</h1>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">{{__('message.name')}} </th>
                <th>{{__('message.description')}}</th>
                <th>{{__('button.delete')}}</th>
            </tr>
            </thead>
            <tbody>
            @for($i=0; $i<count($cosmetics); $i++)
                <tr>
                    <th scope="row">{{$i+1}}</th>
                    <td>{{$cosmetics[$i]->{'name_'.app()->getLocale()} }}</td>
                    <td>{{$cosmetics[$i]->{'composition_'.app()->getLocale()} }}</td>
                    {{--                <td>{{$opinions[$i]->count(opinion)}}</td>--}}
                    <td>
                        <form action="{{route('cosmetics.destroy', $cosmetics[$i]->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn  btn-outline-danger" >
                                {{__('button.delete')}}
                            </button>
                        </form>
                    </td>
                </tr>
            @endfor
            </tbody>
        </table>

    @endsection



