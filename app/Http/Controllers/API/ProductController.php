<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Helper\ResponseFormatter;

class ProductController extends Controller
{
    public function products(Request $request)
    {
        $limit = $request->input("limit",6);
        $id = $request->id;
        $slug = $request->slug;
        $name = $request->name;
        $type = $request->type;
        $price_from = $request->price_from;
        $price_to = $request->price_to;

        $product = Product::with("galleries");

        if ($id) {
            $product = $product->find($id);
            if ($product) {
                return ResponseFormatter::success($product,"Data produk berhasil diambil");
            }
            else{
                return ResponseFormatter::success(null,"Data produk tidak ada",404);
            }
        }

        if($slug){
            $product = $product->where("slug",$slug)->first();
            if ($product) {
                return ResponseFormatter::success($product,"Data produk berhasil diambil");
            }
            else{
                return ResponseFormatter::success(null,"Data produk tidak ada",404);
            }
        }

        if($name){
            $product = $product->where("name","LIKE",'%'. $name .'%')->paginate($limit);
            if (count($product)) {
                return ResponseFormatter::success($product,"Data produk berhasil diambil");
            } else {
                return ResponseFormatter::success(null,"Data produk tidak ada",404);
            }
            
        }

        if ($type) {
            $product = $product->where("type",$type)->paginate($limit);
            if (count($product)) {
                return ResponseFormatter::success($product,"Data produk berhasil diambil");
            }
            else{
                return ResponseFormatter::success(null,"Data produk tidak ada",404);
            }
        }

        if ($price_from) {
            $product = $product->where("price",">=",$price_from)->paginate($limit);
            if (count($product)) {
                return ResponseFormatter::success($product,"Data produk berhasil diambil");
            }
            else{
                return ResponseFormatter::success(null,"Data produk tidak ada",404);
            }
        }

        if ($price_to) {
            $product = $product->where("price","<=",$price_to)->paginate($limit);
            if (count($product)) {
                return ResponseFormatter::success($product,"Data produk berhasil diambil");
            }
            else{
                return ResponseFormatter::success(null,"Data produk tidak ada",404);
            }
        }

        else{
            $product = Product::with("galleries")->paginate($limit);
            if ($product) {
                return ResponseFormatter::success($product,"Data produk berhasil diambil");
            } else {
               
                return ResponseFormatter::success(null,"Data produk tidak ada",404);
            }
        }
    }
}

