<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

use App\Models\Product;
use App\Models\Category;
use App\Models\Images;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreProduct;
use App\Http\Requests\Product\UpdateProduct;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        // $prod = Product::orderBy('id', 'DESC')->paginate(15);
        $prod = Product::orderBy('created_at', 'desc')->get();
        return view('admin.product.index', compact('prod'));
    }

    public function create()
    {
        $cats = Category::orderBy('name', 'ASC')->select('id', 'name')->get();
        return view('admin.product.create', compact('cats'));
    }

    public function store(StoreProduct $request)
    {
        if($request->hasFile("image")){
            $file=$request->file("image");
            $ext = $request->image->getClientOriginalExtension();
            $imageName=time().rand(100,999).'-'.'product.'.$ext;
            $file->move(\public_path("uploads/products/"),$imageName);

            $product =new Product([
                'name' => $request -> name,
                'slug' => $request -> slug,
                'price' => $request -> price,
                'sale_price' => $request -> sale_price,
                'description' => $request -> description,
                'image_list' => $request -> image_list,
                'status' => 1,
                'priority' => 0,
                'category_id' => $request -> category_id,
                'image' => $imageName,
            ]);
            $product->save();
        }
        if($request->hasFile("image_detail")){
            $files=$request->file("image_detail");
            foreach($files as $file){
                $imageName=time().rand(100,999).'-'.'product.'.$file->getClientOriginalExtension();
                $request['product_id']=$product->id;
                $request['image_details']=$imageName;
                $file->move(\public_path("uploads/product_details/"),$imageName);
                Images::create($request->all());
            }
        }
        // if(Product::create($product)){}
        return redirect()->route('product.index')->with('success', 'Thêm sản phẩm thành công thành công');
    }

    public function show(Product $product)
    {

    }

    public function edit(Product $product)
    {
        $cats = Category::orderBy('name', 'ASC')->select('id', 'name')->get();
        // dd($product->id);
        return view('admin.product.edit', compact('product', 'cats'));
    }

    public function update(UpdateProduct $request, Product $product)
    {
        if($request->hasFile("image")){
            $imagePath = public_path('uploads/products/'.$product->image);
            if(File::exists($imagePath)){
                unlink($imagePath);
            }
            $file=$request->file("image");
            $ext = $request->image->getClientOriginalExtension();
            $product->image=time().rand(100,999).'-'.'product.'.$ext;
            $file->move(\public_path("uploads/products/"),$product->image);
            $request['image']=$product->image;
        }

        $product->update([
            'name' => $request -> name,
            'slug' => $request -> slug,
            'price' => $request -> price,
            'sale_price' => $request -> sale_price,
            'description' => $request -> description,
            'image_list' => $request -> image_list,
            'status' => $request->status,
            'priority' => $request->priority,
            'category_id' => $request -> category_id,
            "image"=>$product->image,
        ]);

        if($request->hasFile("image_detail")){
            $files=$request->file("image_detail");
            foreach($files as $file){
                $imageName=time().rand(100,999).'-'.'product.'.$file->getClientOriginalExtension();
                $request['product_id']=$product->id;
                $request['image_details']=$imageName;
                $file->move(\public_path("uploads/product_details/"),$imageName);
                Images::create($request->all());
            }
        }

        return redirect()->route('product.index')->with('success', 'Cập nhật sản phẩm thành công');
    }

    public function destroy(Product $product)
    {
        // if($product->details->count() > 0){
        //     return redirect()->route('product.index')->with('error', 'Xoá Sản phẩm không thành công, đang có trong đơn hàng');
        // }
        // else{
            $imagePath = public_path('uploads/products/'.$product->image);
            if(File::exists($imagePath)){
                unlink($imagePath);
            }
            $images=Images::where("product_id",$product->id)->get();
            foreach($images as $employee){
                $currentPhoto = $employee->image_details;
                $employeePhoto = (public_path('uploads/product_details/').$currentPhoto);
                if(file_exists($employeePhoto)){
                    @unlink($employeePhoto);
                }
                $employee->delete();
            }
            $product->delete();
            return redirect()->route('product.index')->with('success', 'Xoá Sản phẩm thành công');
        // }
    }

}
