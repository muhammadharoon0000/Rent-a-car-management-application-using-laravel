@extends('layouts/navbar')
@section('content')

<table class="table">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Reference number</th>
                    <th scope="col" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($customers as $customer)
                  <tr>
                    <th scope="row">{{$customer->name}}</th>
                    <td>{{$customer->reference}}</td>
                    <td>
                        <a href="{{url('/delete', $customer->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        <a href="{{url('/cars/edit', $customer->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{url('/customers/show_cars', $customer->id)}}" class="btn btn-primary btn-sm">Show Cars</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              @endsection