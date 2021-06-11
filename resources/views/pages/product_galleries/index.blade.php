@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Foto Barang</h4>
                        @if (Session::has("created"))
                            <div class="alert alert-success">{{ Session::get("created") }}</div>
                        @elseif(Session::has("deleted"))
                            <div class="alert alert-success">{{ Session::get("deleted") }}</div>
                        @endif
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Barang</th>
                                        <th>Photo</th>
                                        <th>Default</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->products->name ?? "" }}</td>
                                            <td>
                                                <img src="{{ url($product->photo) }}">
                                            </td>
                                            <td>{{ $product->is_default ? "Yes" : "No" }}</td>
                                            <td>
                                                <form action="{{ route("galleries.delete",["id"=>$product->id]) }}" method="post" class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-5 text-muted">
                                                Data tidak ada!
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection