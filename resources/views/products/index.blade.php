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

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th></th>
            <th class="w-75">Name</th>
            <th>Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>
                <img src="{{ $product->image ? $product->image->url() : 'https://dummyimage.com/300x300/f2f2f2/3b3b3b.png&text=product' }}"
                style="width: 70px; height:70px; object-fit:cover;"
                alt="">
            </td>
            <td>{{ $product->name }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure ?') }}')">
                    <a class="btn btn-dark btn-sm" href="{{ route('products.show',$product->id) }}">Show</a>
                    <a class="btn btn-dark btn-sm" href="{{ route('products.edit',$product->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-dark btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
    {{ $products->links() }}

@endsection
