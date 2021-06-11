<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\ResponseFormatter;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function get(Request $request,$id)
    {
        $product = Transaction::with("details.products")->find($id);

        if ($product) {
            return ResponseFormatter::success($product,"Data transaksi berhasil diambil");
        }
        else{
            return ResponseFormatter::error(null,"Data transaksi tidak ada",404);
        }
    }
}
