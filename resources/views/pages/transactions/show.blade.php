<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td>{{ $item->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $item->email }}</td>
    </tr>
    <tr>
        <th>Number</th>
        <td>{{ $item->number }}</td>
    </tr>
    <tr>
        <th>Address</th>
        <td>{{ $item->address }}</td>
    </tr>
    <tr>
        <th>Total</th>
        <td>{{ $item->transaction_total }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{{ $item->transaction_status }}</td>
    </tr>
    <tr>
        <th>Produk</th>
        <td>
            <table class="table table-bordered w-100">
                <tr>
                    <th>Nama</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                </tr>
                @foreach ($item->details as $data)
                    <tr>
                        <td>{{ $data->products->name }}</td>
                        <td>{{ $data->products->type }}</td>
                        <td>${{ $data->products->price }}</td>
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>
<div class="row">
    <div class="col-4">
        <a href="{{ route("transactions.status" , ["id" => $item->id]) }}?status=SUCCESS" class="btn btn-success btn-block">
            <i class="fa fa-check" aria-hidden="true"></i> Set Success
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route("transactions.status" , ["id" => $item->id]) }}?status=FAILED" class="btn btn-danger btn-block">
            <i class="fa fa-times" aria-hidden="true"></i> Set Failed
        </a>
    </div>
    <div class="col-4">
        
        <a href="{{ route("transactions.status" , ["id" => $item->id]) }}?status=PENDING" class="btn btn-info btn-block">
            <i class="fa fa-spinner" aria-hidden="true"></i> Set Pending
        </a>
    </div>
</div>