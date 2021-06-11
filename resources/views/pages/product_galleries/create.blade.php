@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Foto Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route("galleries.store") }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="" class="form-control-label">Product Name</label>
                    <select name="products_id" id="products_id" class="form-control @error('products_id') is-invalid @enderror">
                        <option disabled selected>-- Pilih Barang --</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    @error('products_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="form-control-label">Product Type</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" name="photo" id="photo" accept="image/*" onchange="readerFile()">
                        <label class="custom-file-label labels" for="inputGroupFile01">Choose file</label>
                        @error('photo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="form-control-label">Jadikan Default</label><br>
                    <label>
                        <input type="radio" name="is_default" id="default" class="@error('default') is-invalid @enderror" value="1"> Ya
                    </label>
                    &nbsp;
                    <label>
                        <input type="radio" name="is_default" id="default" class="@error('default') is-invalid @enderror" value="0"> Tidak
                    </label>
                    @error('default')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">Tambah Foto Barang</button>
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

@push('after-script')
    <script>
        function readerFile(){
            var image = document.querySelector("#photo");
            var label = document.querySelector(".labels");
            var reader = new FileReader()

            var name = image.files[0].name;
            label.innerHTML = name;
        }
    </script>
@endpush