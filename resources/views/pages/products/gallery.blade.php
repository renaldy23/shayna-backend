@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Foto Barang {{ $product->name }}</h4>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($product->galleries as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>
                                                <img src="{{ url($item->photo) }}">
                                            </td>
                                            <td>{{ $item->is_default ? "Yes" : "No" }}</td>
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