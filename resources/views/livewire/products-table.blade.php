<div>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th></th>
            <th class="w-75">Name</th>
            <th>Action</th>
        </tr>
        <tbody wire:sortable="updateProductOrder">
            @foreach ($products as $product)
            <tr wire:sortable.item="{{ $product->id }}" wire:key="product-{{ $product->id }}">
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
        </tbody>
    </table>
    {{ $products->links() }}
</div>
