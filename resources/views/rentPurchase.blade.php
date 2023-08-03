@extends('layouts/navbar')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <a href="{{route('sale_index')}}" class="btn btn-primary btn-sm mt-3 w-100">Sale Car</a>
            <a href="{{route('rent_index')}}" class="btn btn-primary btn-sm mt-3 w-100">Rent Car</a>
        </div>
        <div class="col-md-6"></div>
    </div>
</div>

@endsection