<?php

namespace App\Http\Controllers\Admin;

use App\Models\product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $product=product::all();
        return view('admin.product.index',compact('product'));
    }
    public function add()
    {
        $category=Category::all();
        return view('admin.product.addProduct',compact('category'));
    }
    public function insert(Request $req)
    {
        $product= new product();
        if($req->hasFile('image'))
        {
            $file=$req->file('image');
            $ext=$file->getClientOriginalExtension();
            $fileName=time().'.'.$ext;
            $file->move('assests/upload/product',$fileName);
            $product->image=$fileName;
        }
        $product->name=$req['name'];
        $product->cate_id=$req['cate_id'];
        $product->slug=$req['slug'];
        $product->small_description=$req['small_description'];
        $product->description=$req['description'];
        $product->orignal_price=$req['orignal_price'];
        $product->selling_price=$req['selling_price'];
        $product->qty=$req['qty'];
        $product->tax=$req['tax'];
        $product->status=$req['status']==True ?'1':'0';
        $product->trending=$req['trending']==True ?'1':'0';
        $product->meta_title=$req['meta_title'];
        $product->meta_descrip=$req['meta_descrip'];
        $product->meta_keywords=$req['meta_keywords'];
        $product->save();
        return redirect('Product')->with('status','Data save succesfully');
    }
    public function edit($id)
    {
    $pro=product::find($id);
    $category=Category::all();
    return view('admin.product.updateProduct',compact('pro','category'));
    }
    public function update(Request $req,$id)
 {

    $product=product::find($id);
   if($req->hasFile('image'))
   {
    $file_name=$product->image;
            $path=public_path('/assests/upload/product'. '/' .$file_name);
    if(File::exists($path))
{
File::delete($path);
}
$file=$req->file('image');
$ext=$file->getClientOriginalExtension();
$fileName=time().'.'.$ext;
$file->move('assests/upload/product',$fileName);
$product->image=$fileName;
   }
   $product->name=$req['name'];
        $product->cate_id=$req['cate_id'];
        $product->slug=$req['slug'];
        $product->small_description=$req['small_description'];
        $product->description=$req['description'];
        $product->orignal_price=$req['orignal_price'];
        $product->selling_price=$req['selling_price'];
        $product->qty=$req['qty'];
        $product->tax=$req['tax'];
        $product->status=$req['status']==True ?'1':'0';
        $product->trending=$req['trending']==True ?'1':'0';
        $product->meta_title=$req['meta_title'];
        $product->meta_descrip=$req['meta_descrip'];
        $product->meta_keywords=$req['meta_keywords'];
   $product->update();
   return redirect('Product')->with('status','Data update succesfully');

 }
 public function delete($id)
 {
     $product=product::find($id);

     $file_name=$product->image;
     $img_path=public_path('/assests/upload/product'. '/' .$file_name);


     if(File::exists($img_path))
  {

  File::delete($img_path);
  }
  $product->delete();
  return redirect('Product')->with('status','Data delete succesfully');
 }
}
