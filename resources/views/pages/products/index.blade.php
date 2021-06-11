@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Barang</h4>
                        @if (Session::has("success"))
                            <div class="alert alert-success">{{ Session::get("success") }}</div>
                        @elseif(Session::has("updated"))
                            <div class="alert alert-success">{{ Session::get("updated") }}</div>
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
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->type }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>
                                                <a href="{{ route("products.gallery",["id" => $product->id]) }}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route("products.edit", ["id"=>$product->id]) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a>
                                                <form action="{{ route("products.delete",["id"=>$product->id]) }}" method="post" class="d-inline">
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