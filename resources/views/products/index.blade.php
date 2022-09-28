@extends('partials.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div>
                <h2>CRUD Products</h2>
            </div>
            <div class="my-3">
                <a class="btn btn-dark btn-sm" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success p-2">
            <p class="p-0 m-0">{{ $message }}</p>
        </div>
    @endif

    @livewire('products-table')

@endsection
