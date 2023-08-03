@extends('layouts/navbar')
@section('content')
            <div class="container">
                    <h3 class="p-3 text-center">Car Update</h3>
                    <form action="{{url('cars/edit', ['id' => $car->id])}}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                          <label for="" class="form-label">Enter Car Code</label>
                          <input name="code" value="{{$car->code}}" type="text" class="form-control" id="" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Enter Car Name</label>
                          <input name="name" value="{{$car->name}}" type="text" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Enter Car Stock</label>
                            <input name="stock" value="{{$car->stock}}" type="text" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Enter Car Purchase Price</label>
                            <input name="purchase_price" value="{{$car->purchase_price}}" type="text" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Enter Car Rent</label>
                            <input name="rent" value="{{$car->rent}}" type="text" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Availbility</label>
                          <select name="avail" id="select">
                            <option value="1" default>Available</option>
                            <option value="0" default>Not Available</option>
                          </select>
                      </div>
                        <button class="btn btn-secondary">Update Car</button>
                      </form>
                </div>
@endsection