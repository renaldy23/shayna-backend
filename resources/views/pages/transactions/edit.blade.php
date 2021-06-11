@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Update Transaksi</strong>&nbsp;
            <small>{{ $item->uuid }}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{ route("transactions.update",["id" => $item->id]) }}" method="post">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label for="" class="form-control-label">Customer Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $item->name }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="form-control-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? $item->email }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="form-control-label">Phone Number</label>
                    <input type="number" name="number" id="number" class="form-control @error('number') is-invalid @enderror" value="{{ old('number') ?? $item->number }}">
                    @error('number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="form-control-label">Address</label>
                    <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') ?? $item->address }}">
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">Update Transaction</button>
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