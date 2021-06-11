@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Transaksi Masuk</h4>
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
                                        <th>Email</th>
                                        <th>Number</th>
                                        <th>Total Transaction</th>
                                        <th>Status</th>
                                        <th>Status Update</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $transaction->name }}</td>
                                            <td>{{ Str::lower($transaction->email) }}</td>
                                            <td>{{ $transaction->number }}</td>
                                            <td>${{ $transaction->transaction_total }}</td>
                                            <td>
                                                @if ($transaction->transaction_status=="PENDING")
                                                    <span class="badge badge-info">
                                                        
                                                @elseif($transaction->transaction_status=="SUCCESS")
                                                    <span class="badge badge-success">

                                                @elseif($transaction->transaction_status=="FAILED")
                                                    <span class="badge badge-danger">

                                                    
                                                @endif
                                                    {{ $transaction->transaction_status }}
                                                    </span>
                                            </td>
                                            <td align="center">
                                                
                                                @if ($transaction->transaction_status=="PENDING")
                                                    <a href="{{ route("transactions.status",["id" => $transaction->id]) }}?status=SUCCESS" class="btn-sm btn btn-success">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="{{ route("transactions.status",["id" => $transaction->id]) }}?status=FAILED" class="btn-sm btn btn-warning">
                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                    </a>
                                                @else
                                                    <p class="text-muted">--</p>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#mymodal" class="btn btn-info btn-sm" data-remote="{{ route('transactions.show',["id" => $transaction->id]) }}" 
                                                    data-toggle="modal" data-target="#mymodal" data-title="Detail Transaction {{ $transaction->uuid }}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route("transactions.edit", ["id"=>$transaction->id]) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a>
                                                <form action="{{ route("transactions.delete",["id"=>$transaction->id]) }}" method="post" class="d-inline">
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
