<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view("pages.transactions.index",[
            "transactions" => $transactions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Transaction::with("details.products")->findOrFail($id);

        return view("pages.transactions.show",["item" => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Transaction::findOrFail($id);
        return view("pages.transactions.edit",[
            "item" => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($request->all());
        $data = $request->all();

        $item = Transaction::findOrFail($id);
        $item->update($data);

        return redirect()->route("transactions.index")->with("updated","Berhasil mengupdate transaksi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Transaction::findOrFail($id);
        $item->delete();

        return redirect()->back()->with("deleted","Berhasil menghapus transaksi");
    }

    public function status(Request $request,$id)
    {
        $request->validate([
            "status" => "required|in:PENDING,SUCCESS,FAILED"
        ]);

        $item = Transaction::with("details.products")->findOrFail($id);
        if ($request->status=="SUCCESS") {
            foreach ($item->details as $detail) {
                Product::find($detail->products_id)->decrement('quantity');
            }
        }
        elseif($request->status=="PENDING"){
            if ($item->transaction_status=="SUCCESS") {
                foreach ($item->details as $detail) {
                    Product::find($detail->products_id)->increment('quantity');
                }
            }
        }
        $item->transaction_status = $request->status;
        $item->save();

        return redirect()->back()->with("success" , "Berhasil mengupdate status transaksi");
    }
}
