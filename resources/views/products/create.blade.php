@extends('partials.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div>
            <h2>Add New Product</h2>
        </div>
        <div class="my-3">
            <a class="btn btn-dark btn-sm" href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
</div>

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

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
     <div class="row">
        @include('products.partials.form')
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-dark btn-sm">Submit</button>
        </div>
    </div>
</form>
@endsection
