@extends('partials.master')

@section('content')
    <div class="row">
        <div>
            <h2>Edit Product</h2>
        </div>
        <div class="my-3">
            <a class="btn btn-dark btn-sm" href="{{ route('products.index') }}"> Back</a>
        </div>
        <div class="col-lg-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    @include('products.partials.form')
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-dark btn-sm">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-4">
            <img src="{{ $product->image ? $product->image->url() : 'https://dummyimage.com/300x300/f2f2f2/3b3b3b.png&text=product' }}"
            width="300"
            alt="">
        </div>
    </div>
@endsection
