<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductCategories;
use App\Models\Brands;
use App\Models\Variations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    
    public function index()
    {
        $products = Products::with(['category', 'brand', 'variation'])->get();
        return view('products.index', ['products' => $products]);
    }

    
    public function create()
    {
        $categories = ProductCategories::get();
        $brands = Brands::get();
        $variations = Variations::get();
        return view('products.create', ['categories' => $categories, 'brands' => $brands, 'variations' => $variations]);
    }

    
    public function store(Request $request)
    {
        $folder = 'public/images';
        $coverImage = 0;
        $extensionCover = 0;
        if($request->file('coverImage') !== null){
            $coverImage = str_random(10);
            $extensionCover = $request->file('coverImage')->getClientOriginalName();
            $file = $request->file('coverImage')->storeAs($folder, $coverImage.'.'.$extensionCover);
        }

        $imageOne = 0;
        $extensionOne = 0;
        if($request->file('imageOne') !== null){
            $imageOne = str_random(10);
            $extensionOne = $request->file('imageOne')->getClientOriginalName();
            $file = $request->file('imageOne')->storeAs($folder, $imageOne.'.'.$extensionOne);
        }

        $imageTwo = 0;
        $extensionTwo = 0;
        if($request->file('imageTwo') !== null){
            $imageTwo = str_random(10);
            $extensionTwo = $request->file('imageTwo')->getClientOriginalName();
            $file = $request->file('imageTwo')->storeAs($folder, $imageTwo.'.'.$extensionTwo);
        }

        $imageThree = 0;
        $extensionThree = 0;
        if($request->file('imageThree') !== null){
            $imageThree = str_random(10);
            $extensionThree = $request->file('imageThree')->getClientOriginalName();
            $file = $request->file('imageThree')->storeAs($folder, $imageThree.'.'.$extensionThree);
        }    

        $product = [
            'name' => $request->name,
            'purchase_price' => $request->purchase_price,
            'sale_price' => $request->sale_price,
            'purchase_vat' => $request->purchase_vat,
            'sale_vat' => $request->sale_vat,
            'brand_id' => $request->brand,
            'category_id' => $request->category,
            'variation_id' => $request->variation,
            'image_url' => $coverImage.'.'.$extensionCover,
            'gallery_image_one' => $imageOne.'.'.$extensionOne,
            'gallery_image_two' => $imageTwo.'.'.$extensionTwo,
            'gallery_image_three' => $imageThree.'.'.$extensionThree,
            'description' => $request->description,
            'product_code' => $request->productCode,
            'on_hand_quantity' => $request->quantity
        ];
        Products::create($product);
        return redirect()->route('products.index')->withStatus(__('Product Added Successfuly'));
    }

    
    public function show(Products $products)
    {
        //
    }

    public function addVariation(Request $request){
        $data = [
            'name' => $request->name,
            'value' => $request->value
        ];
        Variations::create($data);
        return redirect()->route('products.create')->withStatus(__('Product Variation added successfuly!'));
    }

    
    public function edit(Products $products)
    {
        
    }

    public function update(Request $request, Products $products)
    {
        //
    }

   
    public function destroy(Products $products)
    {
        //
    }
}
