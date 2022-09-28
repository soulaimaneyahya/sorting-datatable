<div class="form-group mb-3">
    <strong>Name:</strong>
    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name', $product->name ?? '') }}">
</div>
<div class="form-group mb-3">
    <strong>Detail:</strong>
    <textarea class="form-control" style="min-height:150px; max-height: 200px" name="detail" id="textarea-desc" placeholder="Detail" maxlength="500">{{ old('detail', $product->detail ?? '') }}</textarea>
</div>
<div class="form-group mb-3">
    <label for="image" class="form-label"><strong>Product Image:</strong></label>
    <input class="form-control" type="file" id="image" name="image"/>
</div>
@section('scripts')
<script>
    ClassicEditor
        .create( document.querySelector( '#textarea-desc' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection