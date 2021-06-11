@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Update Barang</strong>&nbsp;
            <small>{{ $product->name }}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{ route("products.update",["id" => $product->id]) }}" method="post">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label for="" class="form-control-label">Product Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $product->name }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="form-control-label">Product Type</label>
                    <input type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror" value="{{ old('type') ?? $product->type }}">
                    @error('type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="form-control-label">Description</label>
                    <textarea name="description" id="description" class="form-control ckeditor @error('description') is-invalid @enderror" rows="3">{{ old('description') ?? $product->description }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="form-control-label">Price</label>
                    <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') ?? $product->price }}">
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="form-control-label">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') ?? $product->quantity }}">
                    @error('quantity')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">Update Barang</button>
            </form>
        </div>
    </div>
@endsection

@push('after-style')
<style>
    textarea{
        resize: none
    }
</style>
@endpush