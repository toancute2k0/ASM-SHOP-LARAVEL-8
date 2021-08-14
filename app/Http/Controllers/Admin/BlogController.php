<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::orderBy('id', 'DESC')->get();
        return view('admin.blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        if($request->hasFile("image")){
            $file=$request->file("image");
            $ext = $request->image->getClientOriginalExtension();
            $imageName=time().rand(100,999).'-'.'blog.'.$ext;
            $file->move(\public_path("uploads/blog/"),$imageName);

            $blog =new Blog([
                'name' => $request -> name,
                'slug' => $request -> slug,
                'summary' => $request -> summary,
                'description' => $request -> description,
                'users_id' => $user_id,
                'image' => $imageName,
            ]);
            $blog->save();
        }
        // if(Product::create($product)){}
        return redirect()->route('blog.index')->with('success', 'Thêm bài viết thành công thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        if($request->hasFile("image")){
            $imagePath = public_path('uploads/blog/'.$blog->image);
            if(File::exists($imagePath)){
                unlink($imagePath);
            }
            $file=$request->file("image");
            $ext = $request->image->getClientOriginalExtension();
            $blog->image=time().rand(100,999).'-'.'blog.'.$ext;
            $file->move(\public_path("uploads/blog/"),$blog->image);
            $request['image']=$blog->image;
        }

        $blog->update([
            'name' => $request -> name,
            'slug' => $request -> slug,
            'summary' => $request -> summary,
            'description' => $request -> description,
            'status' => $request -> status,
            'image' => $blog->image,
        ]);

        return redirect()->route('blog.index')->with('success', 'Cập nhật bài viết thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $imagePath = public_path('uploads/blog/'.$blog->image);
        if(File::exists($imagePath)){
            unlink($imagePath);
        }
        $blog->delete();
        return redirect()->route('blog.index')->with('success', 'Xoá Bài viết thành công');
    }
}
