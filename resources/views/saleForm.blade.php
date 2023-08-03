@extends('layouts/navbar')
@section('content')

                <div class="container">
                    <h3 class="p-3 text-center">Select Car and Customer Name</h3>
                    <form action="{{route('sold_out')}}" method="post">
                        @csrf
                        <div class="mb-3">
                          <label for="" class="form-label">Select Customer:Only registered customers</label><br>
                          <select name="customer_id" class="w-50">
                          @foreach ($customers_names as $name)
                                <option value="{{ $name->id }}">
                                  <p>{{$name->name}} </p>
                                  <p> (Reference ID: {{$name->reference}}) </p>
                                </option>
                                @endforeach
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Select Car</label><br>
                          <select name="car_id" class="w-50">
                          @foreach ($cars_names as $name)
                                <option value="{{ $name->id }}">{{ $name->name }} (Code/Registration No: {{ $name->code }})</option>
                                @endforeach
                          </select>
                        </div>

                        
                        <button class="btn btn-secondary">Save</button>
                      </form>
                      <p class="pt-5">
                        Car will be removed automatically,  you sold out from database.
                      </p>
                </div>

@endsection