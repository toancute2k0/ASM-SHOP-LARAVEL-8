<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index () {
        if(isset(request()->key)){
            $product_shop = Product::where('status', 1)
            ->orderBy('id', 'DESC')
            ->paginate(9);
            return view('frontend.shop', compact('product_shop'));
        }
        $sale_product = Product::where('sale_price', '>', 0)
            ->where('status', 1)
            ->orderBy('id', 'DESC')->get();
            // if where(['a'=>'a1',...])
        $top_product = Product::where(['status' => 1, 'priority' => 1])
            ->limit(8)
            ->orderBy('id', 'DESC')->get();
        return view('home', compact('sale_product', 'top_product'));
    }

    public function shop () {
        $product_shop = Product::where('status', 1)
            ->orderBy('id', 'DESC')
            ->paginate(9);
        // $date_product = Product::where('status', 1)
        //     ->limit(3)
        //     ->orderBy('created_at', 'DESC')
        //     ->get();
        return view('frontend.shop', compact('product_shop'));
    }

    public function view($slug){
        $category_product = Category::where('slug', $slug)->first();
        $product_detail = Product::where('slug', $slug)->first();
        if($category_product) {
            return view('frontend.categoryShop', compact('category_product'));
        } elseif($product_detail) {
            return view('frontend.shop-details', compact('product_detail'));
        }else{
            return view('errors.404');
        }
    }

    public function search(){
        $key = request()->key;
        $keyProduct = Product::orderBy('id', 'DESC')
            ->where('name', 'like', '%'.$key.'%')
            ->orWhere('price', $key)
            ->get();
            return view('frontend.search', compact('keyProduct'));
    }

}
