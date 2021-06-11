<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\ResponseFormatter;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Http\Requests\API\CheckoutRequest;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequest $request)
    {
        $data = $request->except("transaction_details");
        $data['uuid'] = 'TRX'. mt_rand(10000,20000).mt_rand(100,999);

        $transactions = Transaction::create($data);

        foreach ($request->transaction_details as $id) {
            TransactionDetail::create([
                "transactions_id" => $transactions->id,
                "products_id" => $id
            ]);

        }

        return ResponseFormatter::success($transactions);
    }
}
