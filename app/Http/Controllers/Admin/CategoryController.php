<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $category=Category::all();
        return view('admin.category.index',compact('category'));
    }
    public function add()
    {
        return view('admin.category.addCategory');
    }

    public function edit($id)
    {
    $cus=Category::find($id);
    return view('admin.category.update',compact('cus'));
    }
    public function insert(Request $req)
    {
        $category= new Category();
        if($req->hasFile('image'))
        {
            $file=$req->file('image');
            $ext=$file->getClientOriginalExtension();
            $fileName=time().'.'.$ext;
            $file->move('assests/upload/category',$fileName);
            $category->image=$fileName;
        }
        $category->name=$req['name'];
        $category->slug=$req['slug'];
        $category->description=$req['description'];
        $category->status=$req['status']==True ?'1':'0';
        $category->popular=$req['popular']==True ?'1':'0';
        $category->meta_title=$req['meta_title'];
        $category->meta_descrip=$req['meta_descrip'];
        $category->meta_keywords=$req['meta_keywords'];
        $category->save();
        return redirect('add-category')->with('status','Data save succesfully');
    }


    public function update(Request $req,$id)
    {

    $category=Category::find($id);
   if($req->hasFile('image'))
   {
    $file_name=$category->image;
            $path=public_path('/assests/upload/category'. '/' .$file_name);

    if(File::exists($path))
{
File::delete($path);
}
$file=$req->file('image');
$ext=$file->getClientOriginalExtension();
$fileName=time().'.'.$ext;
$file->move('assests/upload/category',$fileName);
$category->image=$fileName;
   }
   $category->name=$req['name'];
   $category->slug=$req['slug'];
   $category->description=$req['description'];
   $category->status=$req['status']==true ? '1':'0';
   $category->popular=$req['popular']==true ? '1':'0';
   $category->meta_title=$req['meta_title'];
   $category->meta_keywords=$req['meta_keywords'];
   $category->meta_descrip=$req['meta_descrip'];
   $category->update();
   return redirect('add-category')->with('status','Data update succesfully');

    }
    public function delete($id)
        {
            $category=Category::find($id);

            $file_name=$category->image;
            $img_path=public_path('/assests/upload/category'. '/' .$file_name);


            if(File::exists($img_path))
         {

         File::delete($img_path);
         }
         $category->delete();
         return redirect('add-category')->with('status','Data delete succesfully');
        }

}
