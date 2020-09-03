<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request) {
        config(['site.page' => 'product']);
        $mod = new Product();

        $data = $mod->get();
        return view('backend.product', compact('data'));
    }

    public function create(Request $request) {
        $item = new Product();
        $item->name = $request->get('name');
        $item->price = $request->get('price');
        // $item->quantity = $request->get('quantity');
        $item->description = $request->get('description');

        if($request->has("image")){
            $picture = $request->file('image');
            $imageName = "product_".time().'.'.$picture->getClientOriginalExtension();
            $picture->move(public_path("images/uploaded/product_images"), $imageName);
            $imageName = "images/uploaded/product_images/".$imageName;
            $img = Image::make($imageName)->resize(600, 600);
            $img->save($imageName);
            $item->image = $imageName;
        }

        if($request->has("image2")){
            $picture = $request->file('image2');
            $imageName = "product_".time().'.'.$picture->getClientOriginalExtension();
            $picture->move(public_path("images/uploaded/product_images"), $imageName);
            $imageName = "images/uploaded/product_images/".$imageName;
            $img = Image::make($imageName)->resize(460, 600);
            $img->save($imageName);
            $item->image2 = $imageName;
        }
        $item->save();
        return back()->with('success', 'Created Successfully');
    }

    public function edit(Request $request) {
        $item = Product::find($request->get('id'));
        $item->name = $request->get('name');
        $item->price = $request->get('price');
        // $item->quantity = $request->get('quantity');
        $item->description = $request->get('description');

        if($request->has("image")){
            $picture = $request->file('image');
            $imageName = "product_".time().'.'.$picture->getClientOriginalExtension();
            $picture->move(public_path("images/uploaded/product_images"), $imageName);
            $imageName = "images/uploaded/product_images/".$imageName;
            $img = Image::make($imageName)->resize(600, 600);
            $img->save($imageName);
            $item->image = $imageName;
        }

        if($request->has("image2")){
            $picture = $request->file('image2');
            $imageName = "product_".time().'.'.$picture->getClientOriginalExtension();
            $picture->move(public_path("images/uploaded/product_images"), $imageName);
            $imageName = "images/uploaded/product_images/".$imageName;
            $img = Image::make($imageName)->resize(460, 600);
            $img->save($imageName);
            $item->image2 = $imageName;
        }

        $item->save();
        return back()->with('success', 'Updated Successfully');
    }

    public function delete($id) {
        Product::destroy($id);
        return back()->with('success', 'Deleted Successfully');
    }
}
