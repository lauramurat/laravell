@extends('layouts.app')
@section('title', 'Көрсету беті')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="col-sm-6">
    <form class="row g-3">
        <div class="col-md-6">
            <label for="inputName" class="form-label">Recipient name</label>
            <input type="text" class="form-control" id="inputName">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail4">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Бауыржан Момышұлы">
        </div>
        <div class="col-12">
            <label for="inputCard" class="form-label">Card Number: </label>
            <input type="number" class="form-control" id="inputCard" placeholder="0125 6780 4567 9909">
        </div>
        <div class="col-md-6">
            <label for="inputDate" class="form-label">Expiry date</label>
            <input type="date" class="form-control" id="inputDate">
        </div>
        <div class="col-md-4">
            <label for="inputCvv" class="form-label">CVV</label>
                <input type="number" class="form-control" id="inputCvv">
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">City</label>
            <input type="text" class="form-control" id="inputCity">
        </div>
        <div class="col-md-4">
            <label for="inputApartment" class="form-label">Apartment</label>
            <input type="number" class="form-control" id="inputApartment">
        </div>
        <form action="{{route('cart.buy')}}" method="post">
            @csrf
            <button type="submit" class="btn" style="background: #f5b7b1">
                {{__('button.buy')}}
            </button>
        </form>
    </form>
@endsection
