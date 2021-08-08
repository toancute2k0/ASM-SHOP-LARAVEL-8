<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Images;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function destroy($id){
        $images=Images::where('id', $id)->first();
        $imagePath = public_path('uploads/product_details/'.$images->image_details);
        if(File::exists($imagePath)){
            unlink($imagePath);
        }
        Images::find($id)->delete();
        return back();

    }
}
