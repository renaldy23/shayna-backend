<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductGallery;
use App\Models\Product;
use App\Http\Requests\ProductGalleryRequest;
use Illuminate\Support\Facades\Storage;

class ProductGalleryController extends Controller
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
        $products = ProductGallery::with('products')->get();
        return view("pages.product_galleries.index",["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view("pages.product_galleries.create",["products" => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductGalleryRequest $request)
    {
        $data = $request->all();
        $data["photo"] = $request->file("photo")->store("assets/products","public");

        ProductGallery::create($data);
        return redirect()->route("galleries.index")->with("created","Berhasil menambah gambar produk");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = ProductGallery::findOrFail($id);
        Storage::delete($gallery->photo);
        $gallery->delete();

        return redirect()->back()->with("deleted" , "Berhasil menghapus gallery product");
    }
}
