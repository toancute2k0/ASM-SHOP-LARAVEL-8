<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Cache\RateLimiting\Limit;
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
        $date_blog = Blog::where('status', 1)
            ->limit(3)
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('home', compact('sale_product', 'top_product', 'date_blog'));
    }

    public function shop (Request $request) {
        $product_shop = Product::where('status', 1);
        if($request->gia){
            $price = $request->gia;
            switch ($price) {
                case '1':
                    $product_shop->where('price', '<', 100000);
                    break;
                case '2':
                    $product_shop->whereBetween('price', [100000,300000]);
                    break;
                case '3':
                    $product_shop->whereBetween('price', [300000,500000]);
                    break;
                case '4':
                    $product_shop->whereBetween('price', [500000,700000]);
                    break;
                case '5':
                    $product_shop->whereBetween('price', [700000,1000000]);
                    break;
                case '6':
                    $product_shop->where('price', '>', '1000000');
                    break;
            }
        }
        if($request->orderby){
            $orderby = $request->orderby;
            switch ($orderby) {
                case 'gia-tang':
                    $product_shop->orderBy('price', 'ASC');
                    break;
                case 'gia-giam':
                    $product_shop->orderBy('price', 'DESC');
                    break;
                default:
                    $product_shop->orderBy('id', 'DESC');
                    break;
            }
        }
        $product_shop = $product_shop->orderBy('id', 'DESC')->paginate(9);
        return view('frontend.shop', compact('product_shop'));
    }

    public function blog() {
        $show_blog = Blog::where('status', 1)
            ->orderBy('id', 'DESC')
            ->paginate(4);
        $date_blog = Blog::where('status', 1)
            ->limit(3)
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('frontend.blog', compact('show_blog', 'date_blog'));
    }

    public function getBlog($slug) {
        $blog_detail = Blog::where('slug', $slug)->first();
        $date_blog = Blog::where('status', 1)
            ->limit(3)
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('frontend.blog-details', compact('blog_detail', 'date_blog'));
    }

    public function view(Request $request,$slug){
        $category_product = Category::where('slug', $slug)->first();
        $product_detail = Product::where('slug', $slug)->first();
        if($category_product) {
            $product_shop = Product::where('category_id', '=', $category_product->id)
                ->where('status', 1);
            if($request->gia){
                $price = $request->gia;
                switch ($price) {
                    case '1':
                        $product_shop->where('price', '<', 100000);
                        break;
                    case '2':
                        $product_shop->whereBetween('price', [100000,300000]);
                        break;
                    case '3':
                        $product_shop->whereBetween('price', [300000,500000]);
                        break;
                    case '4':
                        $product_shop->whereBetween('price', [500000,700000]);
                        break;
                    case '5':
                        $product_shop->whereBetween('price', [700000,1000000]);
                        break;
                    case '6':
                        $product_shop->where('price', '>', '1000000');
                        break;
                }
            }
            if($request->orderby){
                $orderby = $request->orderby;
                switch ($orderby) {
                    case 'gia-tang':
                        $product_shop->orderBy('price', 'ASC');
                        break;
                    case 'gia-giam':
                        $product_shop->orderBy('price', 'DESC');
                        break;
                    default:
                        $product_shop->orderBy('id', 'DESC');
                        break;
                }
            }
            $product_shop = $product_shop->orderBy('id', 'DESC')->paginate(9);

            return view('frontend.categoryShop', compact('category_product', 'product_shop'));
        } elseif($product_detail) {
            $same_product = Product::where('category_id', '=', $product_detail->category_id)
            ->where('id', '!=', $product_detail->id)
            ->where('status', 1)
            ->limit(4)
            ->orderBy('id', 'DESC')->get();
            return view('frontend.shop-details', compact('product_detail', 'same_product'));
        }else{
            return view('errors.404');
        }
    }

    public function search(){
        $key = request()->key;
        $keyProduct = Product::orderBy('id', 'DESC')
            ->where('status', 1)
            ->where('name', 'like', '%'.$key.'%')
            ->orWhere('price', $key)
            ->get();
            return view('frontend.search', compact('keyProduct'));
    }

    public function about(){
        return view('frontend.about');
    }

}
