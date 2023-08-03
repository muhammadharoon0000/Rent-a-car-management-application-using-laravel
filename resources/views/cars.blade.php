@extends('layouts/navbar')
@section('content')
    <div class="fluid-container">
        <div class="row">
          <div class="col-md-6">
            <canvas class="m-5" id="chartContainer">
            </canvas>
          </div>
          <div class="col-md-6">
            
          </div>
          
        </div>
        <div class="row">
          <div class="col-md-6" id="listing_div">
            <h3 class="text-center p-4">Cars List</h3>
            <form class="text-center" action="{{route('search_car')}}" method="get" id="search-form">
                <input class="w-90" id="search_input" type="text" name="query" placeholder="Search Car...">
            </form>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Availability</th>
                    <th scope="col">Code</th>
                    <th scope="col">Name</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Purchase Price</th>
                    <th scope="col">Rent Price</th>
                    <th scope="col" class="text-center">Action</th>

                  </tr>
                </thead>
                <tbody>
                @foreach ($car as $cars)
                  <tr>
                    <th scope="row">
                      @if($cars->avail == '1')
                        <span class="bg-primary p-2 text-white">Yes</span>
                      @elseif($cars->avail == '0')
                        <span class="bg-danger p-2 text-white">No</span>
                      @endif
                    </th>
                    <td>{{$cars->code}}</td>
                    <td>{{$cars->name}}</td>
                    <td>{{$cars->stock}}</td>
                    <td>{{$cars->purchase_price}}</td>
                    <td>{{$cars->rent}}</td>
                    <td>
                        <a href="{{url('/delete', $cars->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        <a href="{{url('/cars/edit', $cars->id)}}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              <div class="row">
                {{$car->links()}}
              </div>
              <h3 class="text-center m-5">Search Results  <span id="total_cars"></span> </h3>
              <button class="btn btn-secondary btn-sm m-3" id="show_avail_cars">Show Available Cars</button>
              <div class="container" id="ajax_list">
                
              </div>
            </div>

            <div class="col-md-6" id="cars_form">
                <div class="container">
                    <h3 class="p-3 text-center">Enter Car Details</h3>
                    <form action="{{route('add_new_car')}}" method="post">
                        @csrf
                        <div class="mb-3">
                          <label for="" class="form-label">Enter Car Code</label>
                          <input name="code" type="text" class="form-control" id="" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Enter Car Name</label>
                          <input name="name" type="text" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Enter Car Stock</label>
                            <input name="stock" type="text" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Enter Car Purchase Price</label>
                            <input name="purchase_price" type="text" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Enter Car Rent</label>
                            <input name="rent" type="text" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Avaiability</label>
                          <select name="avail" id="select">
                            <option value="1" default>Available</option>
                            <option value="0" default>Not Available</option>
                          </select>
                      </div>
                        <button class="btn btn-secondary">Save Car</button>
                      </form>
                </div>
            </div>

        </div>
    </div>
@endsection

<a href=""></a>
