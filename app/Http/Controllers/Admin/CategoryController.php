<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Caterogy\StoreCategory;
use App\Http\Requests\Caterogy\UpdateCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::orderBy('created_at', 'ASC')->paginate(15);
        return view('admin.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request)
    {
        if($request->hasFile("image_category")){
            $file=$request->file("image_category");
            $ext = $request->image_category->getClientOriginalExtension();
            $imageName=time().rand(100,999).'-'.'category.'.$ext;
            $file->move(\public_path("uploads/category/"),$imageName);

            $category =new Category([
                'name' => $request -> name,
                'slug' => $request -> slug,
                'image_category' => $imageName,
                'status' => 1,
                'priority' => 1,
            ]);
            $category->save();
        }
        return redirect()->route('category.index')->with('success', 'Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // $category = DB::table('category')-> where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategory $request, Category $category)
    {
        if($request->hasFile("image_category")){
            $imagePath = public_path('uploads/category/'.$category->image_category);
            if(File::exists($imagePath)){
                unlink($imagePath);
            }
            $file=$request->file("image_category");
            $ext = $request->image_category->getClientOriginalExtension();
            $category->image_category=time().rand(100,999).'-'.'category.'.$ext;
            $file->move(\public_path("uploads/category/"),$category->image_category);
            $request['image_category']=$category->image_category;
        }

        $category->update([
            'name' => $request -> name,
            'slug' => $request -> slug,
            'image_category'=>$category->image_category,
            'status' => $request->status,
            'priority' => 1,
        ]);
        return redirect()->route('category.index')->with('success', 'Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->products->count() > 0){
            return redirect()->route('category.index')->with('error', 'Xoá danh mục không thành công');
        }
        else{
            $imagePath = public_path('uploads/category/'.$category->image_category);
            if(File::exists($imagePath)){
                unlink($imagePath);
            }
            $category->delete();
            return redirect()->route('category.index')->with('success', 'Xoá danh mục thành công');
        }
    }
}
