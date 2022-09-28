@extends('partials.master')

@section('content')
    <div class="row">
        <div>
            <h2>Show Product</h2>
        </div>
        <div class="my-3">
            <a class="btn btn-dark btn-sm" href="{{ route('products.index') }}"> Back</a>
        </div>
        <div class="col-lg-8">
            <div class="form-group mb-3">
                <strong>Name:</strong>
                <p>{{ $product->name }}</p>
            </div>
            <div class="form-group mb-3">
                <strong>Details:</strong>
                <p>{!! $product->detail !!}</p>
            </div>
        </div>
        <div class="col-lg-4">
            <img src="{{ $product->image ? $product->image->url() : 'https://dummyimage.com/300x300/f2f2f2/3b3b3b.png&text=product' }}"
            width="300"
            alt="">
        </div>
    </div>
@endsection
